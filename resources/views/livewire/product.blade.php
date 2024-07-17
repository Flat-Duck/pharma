<div class="col-lg-4 col-md-6 col-sm-6">
    <div class="book-card mb-24" style="object-fit: cover;">
        <a href="{{route('shop.products.show',$product)}}" style="width:100%;"><img  src="{{asset($product->image)}}" alt="{{$product->name}}" style="max-height: 320px; object-fit: cover;"></a>
        <div class="">
            <ul class="unstyled hover-buttons">
                <li><a href="{{route('shop.products.show', $product)}}"><i class="fal fa-eye"></i></a></li>
                <li><span wire:click.debounce="addToCart"><i class="fal fa-shopping-cart"></i></span></li>
            </ul>
        </div>
        <div class="book-content">
            <h5 class="mt-24"><a href="product-detail.html">{{$product->name}} </a></h5>
            {{-- <div class="rating-stars">
                <a href="#"><img src="assets/media/icons/fill-star.png" alt=""></a>
                <a href="#"><img src="assets/media/icons/fill-star.png" alt=""></a>
                <a href="#"><img src="assets/media/icons/fill-star.png" alt=""></a>
                <a href="#"><img src="assets/media/icons/fill-star.png" alt=""></a>
                <a href="#"><img src="assets/media/icons/empty-star.png" alt=""></a>
            </div> --}}
            <h6 class="dark-gray">{{$product->brand->name}}</h6>
            <div class="books-price">
                <h5>{{$product->price}}</h5> د.ل
                {{-- <h6 class="old-price">$80.00</h6> --}}
            </div>
        </div>
    </div>
</div>
