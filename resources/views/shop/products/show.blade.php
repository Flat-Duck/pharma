@extends('layouts.shop.app', ['page' => 'home'])
@section('content')
    <!-- Banner-3 End-->
    <!-- Main Content Start -->
    <div class="page-content">
        <section class="product-detail p-40">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="product-content">
                            <div class="main-content ">
                                <h2>{{$product->name}}</h2>
                                <div class="price">
                                    <h3>{{$product->price}} د.ل</h3>
                                </div>
                                <p class="dark-gray mb-40">{{$product->description}}</p>
                            </div>
                            <div class="quantity quantity-wrap mb-32">
                                <input class="decrement" type="button" value="-">
                                <input type="text" name="quantity" value="1" maxlength="2" size="1"
                                    class="number">
                                <input class="increment" type="button" value="+">
                            </div>
                            <div class="cart-button mb-32">
                                <h6><a href="cart.html" class="cus-btn">
                                    <span class="icon"> <img src="{{ asset('assets/media/icons/orange-cart.png') }}" alt="">
                                    </span>إشتري الان</a></h6>
                                <ul class="unstyled hover-buttons">
                                    <li><a href="{{route('shop.cart.show')}}"><i class="fal fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <hr class="mb-32">
                            <div class="writer-area">
                                <span>
                                    <h5 class="dark-gray">العلامة التجارية:</h5> &nbsp;<h5>{{$product->brand->name}}</h5>
                                </span>
                                <span>
                                    <h5 class="dark-gray">التصنيف:</h5>&nbsp;<h5>{{$product->category->name}}</h5>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="product-image">
                            <img src="{{ asset($product->image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
