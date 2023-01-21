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
    public function mount()
    {
        $this->getCartSum();
    }
    public function getCartSum()
    {
        $this->total = \Cart::Session(Auth::user()->id)->getTotal();
        // $item = \Cart::Session(Auth::user()->id)->getContent();
        // dd($this->total);

    }
    public function render()
    {
        $this->getCartSum();

        return view('livewire.cart-totle');
    }

}
