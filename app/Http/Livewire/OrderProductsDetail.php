<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderProductsDetail extends Component
{
    use AuthorizesRequests;

    public Order $order;
    public Product $product;
    public $productsForSelect = [];
    public $product_id = null;
    public $quantity;
    public $price;
    public $total;

    public $showingModal = false;
    public $modalTitle = 'New Product';

    protected $rules = [
        'product_id' => ['required', 'exists:products,id'],
        'quantity' => ['nullable', 'numeric'],
        'price' => ['nullable', 'numeric'],
        'total' => ['nullable', 'numeric'],
    ];

    public function mount(Order $order): void
    {
        $this->order = $order;
        $this->productsForSelect = Product::pluck('name', 'id');
        $this->resetProductData();
    }

    public function resetProductData(): void
    {
        $this->product = new Product();

        $this->product_id = null;
        $this->quantity = null;
        $this->price = null;
        $this->total = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newProduct(): void
    {
        $this->modalTitle = trans('crud.order_products.new_title');
        $this->resetProductData();

        $this->showModal();
    }

    public function showModal(): void
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal(): void
    {
        $this->showingModal = false;
    }

    public function save(): void
    {
        $this->validate();

        $this->authorize('create', Product::class);

        $this->order->products()->attach($this->product_id, [
            'quantity' => $this->quantity,
            'price' => $this->price,
            'total' => $this->total,
        ]);

        $this->hideModal();
    }

    public function detach($product): void
    {
        $this->authorize('delete-any', Product::class);

        $this->order->products()->detach($product);

        $this->resetProductData();
    }

    public function render(): View
    {
        return view('livewire.order-products-detail', [
            'orderProducts' => $this->order
                ->products()
                ->withPivot(['quantity', 'price', 'total'])
                ->paginate(20),
        ]);
    }
}
