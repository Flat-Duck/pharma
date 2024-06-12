<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Cart as CartModel;

class CartArea extends Component
{
    protected CartModel $cart;
    
    protected $products;

    protected $total;

    protected $listeners = ['reloadProducts'];
    
    public function mount() {
        $this->reloadProducts();
    }

    public function getCart()
    {
        $this->cart = auth()->user()->cart()->firstOrCreate([]);
        return $this->cart;
    }

    public function calculateTotal() {
        $total = 0;
        foreach ($this->cart->products as $product) {
            $total = $total + $product->carted->quantity * $product->price;
        }
        $this->total = $total;
    }

    public function getCartProperty()
    {
        return $this->cart;
    }

    public function getProductsProperty()
    {
        return $this->products;
    }
    public function getTotalProperty()
    {
        return $this->total;
    }

    public function render()
    {
        return view('livewire.cart-area',
        [
            'cart' => $this->cart,
            'products' => $this->products,
            'total' => $this->total
        ]);
    }

    
    public function reloadProducts()
    {
        $this->cart = $this->getCart();
        $this->products = $this->cart->products;
        $this->calculateTotal();
    }
}
