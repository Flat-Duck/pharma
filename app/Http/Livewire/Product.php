<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;
use \App\Models\Product as ProductModel;

class Product extends Component
{
    public ProductModel $product;

    public function render()
    {
        return view('livewire.product');
    }

    public function addToCart() {
        $cart = auth()->user()->cart()->firstOrCreate([]);
        $cartProduct = $cart->products()->where('product_id', $this->product->id)->first();
        
        if ($cartProduct){

            $cart->products()->updateExistingPivot($this->product->id, ['quantity' => $cartProduct->carted->quantity + 1]);

        }else{

            $cart->products()->attach($this->product->id, ['quantity' => 1]);
        }
    }
}
