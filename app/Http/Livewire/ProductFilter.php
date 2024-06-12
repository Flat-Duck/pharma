<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;

class ProductFilter extends Component
{
    public $selectedCategories = [];
    public $selectedBrands = [];
    public $searQuery = [];
    
    public function render()
    {
        $categories = Category::withCount('products')
                    ->has('products')->orderBy('products_count', 'desc')
                    ->get();
        $brands = Brand::withCount('products')
                    ->has('products')->orderBy('products_count', 'desc')
                    ->get();
        return view('livewire.product-filter',compact('categories','brands'));
    }

    public function filter()
    {
        $this->emitTo('products-area','reloadProducts',$this->selectedCategories,$this->selectedBrands,$this->searQuery);
    }
}
