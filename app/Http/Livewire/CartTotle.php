<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartTotle extends Component
{
    public $rowId;
    public $price;
    public $quantity;
    public $total;
    public $cart;

    protected $listeners = [
        'minus' => 'getCartSum',
        'plus' => 'getCartSum',
    ];

    // public function mount($item)
    // {
    //     $this->rowId = $item->id;
    //     $this->price = $item->price;
    //     $this->quantity = $item->quantity;
    //     $this->getCartSum();

    // }
    public function getCartSum()
    {
        $this->total = \Cart::Session(Auth::user()->id)->getTotal();
        $item = \Cart::Session(Auth::user()->id)->getContent();
        dd($item);

    }
    public function render()
    {
        $this->getCartSum();

        return view('livewire.cart-totle');
    }

}
