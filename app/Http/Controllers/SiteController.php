<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Article;
use App\Models\Cgy;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Element;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $sliders = Element::where('page', 'index')->where('position', 'slider')->orderBy('sort', 'asc')->get();
        $arrivals = Item::where('cgy_id', 2)->where('enabled', true)->orderBy('sort', 'asc')->get();
        $images = Element::where('page', 'index')->where('position', 'images')->orderBy('sort', 'asc')->take(4)->get();
        $new_product_top = Element::where('page', 'index')->where('position', 'new_product_top')->orderBy('sort', 'asc')->first();
        $new_products = Item::where('cgy_id', 1)->where('enabled', true)->orderBy('sort', 'asc')->get();
        $video = Element::where('page', 'index')->where('position', 'video')->orderBy('sort', 'asc')->first();

        $shop = Element::where('page', 'index')->where('position', 'shop')->orderBy('sort', 'asc')->get();
        $shop_method = Element::where('page', 'index')->where('position', 'shop_method')->orderBy('sort', 'asc')->get();

        return view('index', compact('sliders', 'arrivals', 'images', 'new_product_top', 'new_products', 'video', 'shop', 'shop_method'));
    }

    public function shop()
    {
        $new_products_row1 = Item::whereBetween('cgy_id', [1, 2])->where('enabled', true)->orderBy('sort', 'asc')->get();
        $new_products_row2 = Item::whereBetween('cgy_id', [1, 2])->where('enabled', true)->orderBy('sort', 'asc')->get();
        $new_products_row3 = Item::whereBetween('cgy_id', [1, 2])->where('enabled', true)->orderBy('sort', 'asc')->get();
        return view('shop', compact('new_products_row1', 'new_products_row2', 'new_products_row3'));
    }
    public function about()
    {
        $about = Element::where('page', 'about')->where('position', 'info')->orderby('sort', 'asc')->get();
        $shop = Element::where('page', 'index')->where('position', 'shop')->orderBy('sort', 'asc')->get();
        $shop_method = Element::where('page', 'index')->where('position', 'shop_method')->orderBy('sort', 'asc')->get();
        $video = Element::where('page', 'index')->where('position', 'video')->orderBy('sort', 'asc')->first();
        $img = Element::where('page', 'about')->where('position', 'img')->orderBy('sort', 'asc')->first();

        return view('about', compact('about', 'video', 'shop_method', 'shop', 'img'));
    }

    public function cartPage()
    {
        $carts = \Cart::session(Auth::user()->id)->getContent();
        // dd($carts);
        $total = \Cart::session(Auth::user()->id)->getTotal();
        return view('cart', compact('carts', 'total'));
    }
    //加入購物車
    public function addCart(Request $request, Item $item, $quantity)
    {
        // dd($item->PicsArray[0]);
        \Cart::session(Auth::user()->id)->add([
            'id' => $item->id,
            'name' => $item->title,
            'price' => $item->price_new,
            'quantity' => $quantity,
            'attributes' => [],
            'associatedModel' => $item,
        ]);
        return redirect(url('cart'));
    }
    //清空購物車
    public function clearCart()
    {
        \Cart::clear();
        \Cart::session(Auth::user()->id)->clear();

        return redirect(url('cart'));
    }

    public function checkout()
    {
        //建立訂單明細
        $carts = \Cart::session(Auth::user()->id)->getContent();
        // dd($carts);
        // $order->owner_id = Auth::user()->id;
        // $order->subtotal = $total;
        // $order->shipCost = 0;
        // $order->status = 'Create';
        // $order->type = 'normal';
        // $comment1 = Order::create($order->only('subtotal', 'shipCost', 'status', 'type'));
        // $itemorder->order_id = $comment1->id;
        // foreach ($carts as $cart) {
        //     $itemorder->item_id = $cart->id;
        //     $itemorder->qty = $cart->quantity;
        //     $comment2 = Order::create($itemorder->only('order_id', 'item_id'));
        // }

        // if (isset($comment1) && !empty($comment1)) {
        //     // print('儲存成功');
        //     // flash('評論建立完成!!')->overlay(); //跳出視窗
        //     foreach ($carts as $cart) {
        //         $itemorder->id = $cart->item;
        //     }
        // }
        // if (isset($comment2) && !empty($comment2)) {
        //     flash('評論建立完成!!')->overlay();
        // } else {
        //     flash('評論建立失敗!!')->error(); //紅色框

        // }
        return redirect('/checkout');

        //串接金流付款

    }
    public function storeorder(Request $request)
    {

        return redirect('/');
    }
    public function confirmation()
    {
        return view('confirmation');
    }
    public function elements()
    {
        return view('elements');
    }
    public function product_details()
    {
        $item = Item::find(1);

        return view('product_details', compact('item'));
    }

    public function productDetail(ITEM $item)
    {
        // dd($item);
        return view('product-detail', compact('item'));
    }
    public function login()
    {
        return view('login');
    }
    public function contact()
    {
        return view('contact');
    }
    public function storeContact(ContactRequest $request)
    {
        $contact = Contact::create($request->only('subject', 'message', 'email', 'name'));
        if (isset($contact) || !empty($contact)) {
            print('儲存成功');
            flash('聯絡單建立完成!!')->overlay(); //跳出視窗

        } else {
            print('儲存失敗');
            flash('聯絡建立失敗!!')->error(); //紅色框
        }
        return redirect('/contact');
    }
    public function selectBlog(Request $request)
    {
        $cgy = Cgy::find(1);
        $article_news = $cgy->articles()->where('title', 'LIKE', '%' . $request->search . '%')->orwhere('content_small', 'LIKE', '%' . $request->search . '%')->orwhere('content', 'LIKE', '%' . $request->search . '%')->paginate(5);

        $cgies = Cgy::get();
        $recents = Article::orderby('created_at', 'desc')->limit(4)->get();
        if ($article_news->count() < 1) {
            $article_news = $cgy->articles()->paginate(5);
            flash('查無相關貼文!!')->overlay();
        }
        return view('blog', compact('cgy', 'article_news', 'cgies', 'recents'));

        // } else {
        //     return view('blog_serch', compact('cgy', 'article_news', 'cgies', 'recents'));
        // }

    }

    public function blog($id)
    {
        //取得最新消息的文章
        $cgy = Cgy::find($id);
        $article_news = $cgy->articles()->paginate(5);
        $cgies = Cgy::get();
        $recents = Article::orderby('created_at', 'desc')->limit(4)->get();

        // dd($recents);
        return view('blog', compact('cgy', 'article_news', 'cgies', 'recents'));
    }

    public function blog_details(Article $article)
    {

        $count = Article::get()->count();
        $getarticle = Article::where('id', $article->id)->first();

        if ($article->id > 1) {
            $prev_page = Article::where('id', '<', $article->id)->max('id');
            $prev = Article::find($prev_page);
        } else { $prev = $getarticle;
        }
        if ($article->id < $count) {
            $next_page = Article::where('id', '>', $article->id)->min('id');
            $next = Article::find($next_page);
        } else { $next = $getarticle;
        }

        $cgies = Cgy::get();
        $recents = Article::orderby('created_at', 'desc')->limit(4)->get();
        // var_dump($prev);
        // exit;
        $igs = Element::where('page', 'blog')->where('position', 'ig')->orderBy('sort', 'asc')->get();
        $comments = Comment::where('article_id', $article->id)->with('user')->orderby('sort', 'asc')->get();
        $count = $comments->count();
        // dd($count);
        return view('blog-details', compact('recents', 'cgies', 'article', 'prev', 'next', 'igs', 'comments', 'count'));

    }
    public function storeBlog(BlogRequest $request)
    {
        $comment = Comment::create($request->only('article_id', 'email', 'name', 'content', 'website'));

        if (isset($comment) && !empty($comment)) {
            print('儲存成功');
            flash('評論建立完成!!')->overlay(); //跳出視窗

        } else {
            print('儲存失敗');
            flash('評論建立失敗!!')->error(); //紅色框

        }
        return redirect('/blog-details/' . $request->article_id);

    }
    public function seecount()
    {
        return view('seecount');
    }

}