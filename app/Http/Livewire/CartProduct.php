<?php

namespace App\Http\Livewire;

use Livewire\Component;

use \App\Models\Product as ProductModel;

class CartProduct extends Component
{
    public ProductModel $product;
    protected $masterCart;
    private $productTotal;
    public $productQuantity;

    public function mount()
    {
        $this->masterCart = $this->getCart();
        $this->productQuantity = $this->masterCart->products->where('id',$this->product->id)->first()->carted->quantity;
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->productTotal = $this->productQuantity * $this->product->price;
        $this->emitTo('cart-area','reloadProducts');
    }


    public function getTotalProperty()
    {
        return $this->productTotal;// * $this->product->price;
    }
    public function increment()
    {
        $this->productQuantity ++;
        $this->updateCart();
    }
    public function decrement()
    {
        if($this->productQuantity > 1)
        {
            $this->productQuantity--;
        }
        $this->updateCart();
    }

    public function remove()
    {
        $this->masterCart = $this->getCart();
        $this->masterCart->products()->detach([$this->product->id]);
        $this->masterCart = $this->getCart();
        $this->emitTo('cart-area','reloadProducts');
    }

    private function updateCart()
    {
        $this->masterCart = $this->getCart();
        $this->masterCart->products()->updateExistingPivot($this->product->id, ['quantity' => $this->productQuantity]);
        $this->calculateTotal();
        
    }

    public function getCartProperty()
    {
        return $this->masterCart;
    }

    public function getCart()
    {
        $this->masterCart = auth()->user()->cart()->firstOrCreate([]);
        return $this->masterCart;
    }

    public function render()
    {
        return view('livewire.cart-product',
        [
            'product' => $this->product,
            'total' => $this->productTotal
        ]);
    }
}
