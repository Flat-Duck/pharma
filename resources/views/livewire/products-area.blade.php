<div class="col-xl-9">
    <div class="row">
        @forelse($products as $k=> $product)
            @livewire('product',['product' => $product], key($product->id))
        @empty
        @endforelse
    </div>
    {{ $products->links('components.paginations.shop') }}
</div>
