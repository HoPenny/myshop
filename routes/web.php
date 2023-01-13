<?php

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::namespace ('App\Http\Controllers')->group(function () {
    Route::get('/', 'SiteController@index');
    Route::get('/shop', 'SiteController@shop');
    Route::get('/about', 'SiteController@about');

    //Penny 2022/11/27 add
    Route::get('/login', 'SiteController@login');
    Route::get('/checkout', 'SiteController@checkout');
    Route::get('/confirmation', 'SiteController@confirmation');

    Route::get('/elements', 'SiteController@elements');
    //product
    Route::get('/items/{item}', 'SiteController@productDetail');
    Route::get('/pro_details', 'SiteController@product_details');
    //contact
    Route::get('/contact', 'SiteController@contact');
    Route::post('/contacts', 'SiteController@storeContact');
    //blog
    Route::post('/blogs', 'SiteController@storeBlog');
    Route::get('/blog', 'SiteController@blog');
    Route::get('/blog-details/{article}', 'SiteController@blog_details');
    Route::post('/search', 'SiteController@selectBlog');
    Route::get('/blog', 'SiteController@blog');
    Route::get('/blog_serch', 'SiteController@blog_serch');

    //cart
    // Route::get('/cart', 'SiteController@cart');
    Route::get('/addcart/{item}/{quantity}', 'SiteController@addCart');
    Route::get('/clearcart', 'SiteController@clearCart');

    Route::get('/cart', 'SiteController@cartPage');
    Route::get('checkout', 'SiteController@checkout');
});
// Route::get('/contacts/{contact}', function (Contact $contact) {
//     dd($contact);
// });

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/picsarr', function () {
    $item = Item::find(3);
    dd($item->picsarray);
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//動態設定語系
Route::get("welcome", function () {
    // App::setLocale('en');
    return App::getLocale();
});

Route::get("getpwd", function () {
    // App::setLocale('en');
    return App::getLocale();
});
Route::get("getkey", function () {
    App::setLocale('zh_TW');
    return __('Your password has been reset!');
});
Route::view('testing', 'test');
//加入購物車
Route::get("additem", function () {
    $item = Item::find(1);
    \Cart::Session(1)->add([
        'id' => 2,
        'title' => $item->title,
        'price' => $item->price_new,
        'quantity' => 1,
        'attributes' => [],
        'associatedModel' => $item,
    ]);
    return "已加入購物車";
});
//更新購物車
Route::get("clearCart", function () {
    $item = Item::find(1);
    if (!\Cart::sesstion(1)->ismepty()) {
        \Cart::Session(1)->update(1, [
            'quantity' => -2,
            'attributes' => [],
            'associatedModel' => $item,
        ]);
        return "已加入購物車";
    } else {
        return "購物車已清空";
    }
});
//移除購物車
Route::get('removeitem', function () {
    $item = \Cart::Session(1)->remove(2);
    return "已移除購物車";

});
//取得購物車內容
Route::get('getcart', function () {
    $item = \Cart::Session(1)->getContent();
    dd($item);
});
//取得購物車總數
Route::get('gettotalquantity', function () {
    $cartTotalQuantity = \Cart::session(1)->getTotalQuantity();
    dd($cartTotalQuantity);
});
//取得總計
Route::get('gettotal', function () {
    $total = \Cart::Session(1)->getTotal();
    dd($total);
});
//取得小計
Route::get('getsubtotal', function () {
    $subtotal = \Cart::Session(1)->getSubTotal();
    dd($subtotal);
});
//用計算屬性在Model運算後傳出
Route::get('taxPrice', function () {
    $item = Item::find(1);
    dd($item->taxPrice);

});
Route::get('/storesession', function (Request $request) {
    // session(['name' => 'Zack']);
    // $request->session()->put('name', 'Zack');
    // $request->session()->put('msg', 'good');
    // $request->session()->put('price', 1000);
    // $request->session()->put('data', ['name' => 'Zack', 'msg' => 'good']);
    $request->session()->flash('status', 'GG');

    return 'stroe session';
});
Route::get('/getsession', function (Request $request) {
    // $data = session('name', 'Doll');
    // $data = session('msg', 'dd');
    // $data = session()->all();
    $data = $request->session()->get('status', 'YY');
    $request->session()->keep(['status']);
    // $request->session()->reflash();

    return $data;
});
Route::get('/forgetsession', function (Request $request) {
    // $request->session()->forget(['name', 'msg']);
    $request->session()->flush();
    return 'already kill it!';
});

// Route::get('/seecounts', 'App\Http\Controllers\SiteController@seecount');
Route::get('/seecounts', \App\Http\Livewire\Counter::class);