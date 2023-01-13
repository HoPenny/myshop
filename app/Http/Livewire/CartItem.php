<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartItem extends Component
{

    public $rowId;
    public $pic;
    public $title;
    public $price;
    public $quantity;
    public $total;

    public function mount($item)
    {

        $this->rowId = $item->id;
        $this->pic = $item->associatedModel->PicsArray[0];
        $this->title = $item->associatedModel->title;
        $this->price = $item->price;
        $this->quantity = $item->quantity;

        $this->init();
    }
    public function plus()
    {
        // dd('plus');

        $this->quantity++;
        $this->init();

    }
    public function minus()
    {
        // dd('minus');
        if ($this->quantity > 0) {
            $this->quantity--;
            $this->init();
        } else {
            \Cart::session(Auth::user()->id)->remove($this->rowId);
            //需要做reload要另寫程式
        }

    }

    public function init()
    {
        $this->total = $this->price * $this->quantity;
    }
    public function render()
    {
        return view('livewire.cart-item');
    }
}