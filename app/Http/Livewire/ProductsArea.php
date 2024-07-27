<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product as ProductModel;

class ProductsArea extends Component
{
    use WithPagination;

    protected $products;

    protected $listeners = ['reloadProducts'];

    public function mount() {
        $this->products = ProductModel::latest()->where('is_private', false)->paginate(9)->withQueryString();
    }

    public function render()
    {
        return view('livewire.products-area', [ 'products' => $this->products, ]);
    }

    public function getProductsProperty()
    {
        return $this->products;
    }

    public function reloadProducts($selectedCategories,$selectedBrands, $searQuery)
    {
        $productsQuery = ProductModel::query();
        
        if($selectedCategories){
            $productsQuery = $productsQuery->when(count($selectedCategories) > 0, function  ($query) use($selectedCategories) {
                $query->whereIn('category_id', $selectedCategories);
            });
        }
        
        if($selectedBrands){
            $productsQuery = $productsQuery->when(count($selectedBrands) > 0, function  ($query) use($selectedBrands) {
                $query->whereIn('brand_id', $selectedBrands);
            });
        }
        
        if($searQuery){
            $productsQuery = $productsQuery->where('name','like','%' . $searQuery . '%');
        }
        
        $this->products = $productsQuery->paginate(9)->withQueryString();
    }
}
