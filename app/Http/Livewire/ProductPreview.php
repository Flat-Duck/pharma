<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \App\Models\Product as ProductModel;

class ProductPreview extends Component
{
    public ProductModel $product;
    public int $qty = 1;

    public function addToCart() {
        $cart = auth()->user()->cart()->firstOrCreate([]);
        $cartProduct = $cart->products()->where('product_id', $this->product->id)->first();
        
        if ($cartProduct){

            $cart->products()->updateExistingPivot($this->product->id, ['quantity' => $cartProduct->carted->quantity + $this->qty]);

        }else{

            $cart->products()->attach($this->product->id, ['quantity' => $this->qty]);
        }
    }
    public function increment()
    {
        $this->qty ++;
    }
    public function decrement()
    {
        if($this->qty > 1)
        {
            $this->qty--;
        }
    }
    public function render()
    {
        return view('livewire.product-preview');
    }
}
