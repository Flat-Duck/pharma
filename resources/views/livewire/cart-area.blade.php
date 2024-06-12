<div>
    <section class="cart">
        <div class="container">
            <div class="d-md-block d-none">
                <div class="row">
                    <div class="col-lg-12 d-md-none">
                    </div>
                </div>
                <table class="cart-table mb-24">
                    <thead>
                        <tr>
                            <th>PRODUCT</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <livewire:cart-product product="{{$product}}" wire:key= " {{ $product->id }}"/>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <h6>
                <a href="checkout.html" class="cus-btn mt-24">
                    <span class="icon">
                        <img src="assets/media/icons/orange-cart.png" alt="">
                    </span>
                    Continue Shopping
                </a>
            </h6>
        </div>
    </section>
    <section class="shipping mb-40">
        <div class="container">
            <div class="choose-shipping-mode">
                <div class="row">
                    <div class="col-xl-1">
                        <div class="shipping-details">
                            <div class="filter-block">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="amounts">
                            <div class="sub-total mb-24">
                                <h6>SUBTOTAL</h6>
                                <h6 wire:model="total">{{$total}}</h6>
                            </div>
                            <div class="shipping-charges mb-24">
                                <h6>SHIPPING</h6>
                                <h6>FREE</h6>
                            </div>
                            <div class="grand-total mb-24">
                                <h5>TOTAL</h5>
                                <h5 wire:model="total">{{$total}}</h5>
                            </div>
                            <h6><a href="checkout.html" class="cus-btn"><span class="icon"><img
                                            src="assets/media/icons/orange-cart.png" alt=""></span>Proceed to
                                    Checkout</a></h6>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="shipping-details">
                            <div class="filter-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
