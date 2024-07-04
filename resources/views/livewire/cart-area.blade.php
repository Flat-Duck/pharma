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
                            <th>المنتج</th>
                            <th>السعر</th>
                            <th>الكمية</th>
                            <th>المجموع</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        @livewire('cart-product', ['product'=>$product, 'key'=> $product->id ])
                        @endforeach
                    </tbody>
                </table>
            </div>
            <h6>
                <a href="checkout.html" class="cus-btn mt-24">
                    <span class="icon">
                        <img src="assets/media/icons/orange-cart.png" alt="">
                    </span>
                    الاستمرار في التبضع
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
                                <h6>المجموع</h6>
                                <h6 wire:model="total">{{$total}}</h6>
                            </div>
                            <div class="shipping-charges mb-24">
                                <h6>التوصيل </h6>
                                <h6>مجاني</h6>
                            </div>
                            <div class="grand-total mb-24">
                                <h5>المجموع</h5>
                                <h5 wire:model="total">{{$total}}</h5>
                            </div>
                            <h6><a href="checkout.html" class="cus-btn"><span class="icon"><img
                                            src="assets/media/icons/orange-cart.png" alt=""></span>
                                            تأكيد الطلبية
                                        </a></h6>
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
