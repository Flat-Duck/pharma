@extends('layouts.shop.app', ['page' => 'cart'])

@section('content')
    <div class="hero-banner-2 bg-lightest-gray p-3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-block">
                        <h1 class="mb-12 text-center">تتبع حالة الطلبية</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section>
            <div class="container">
                <div class="product-content">
                    <section class="product-detail p-40">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="product-content">
                                        <span class="sold-books">
                                            <p class="dark-gray"> {{$order->status}}</p> &nbsp; <h6>{{$order->percent() }}</h6>
                                        </span>
                                        <div class="progress mb-40">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                                aria-valuemin="0" aria-valuemax="100" style="width:{{$order->percent()}};">
                                                <span class="sr-only">{{$order->percent()}} Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <h3 class="text-center">محتويات الطلبية</h3>
                    <hr>
                    <section class="shop-list-grid">
                        <div class="container">
                            <div class="product-grid p-40">
                                @forelse ($order->products as $product)
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4">
                                        </div>
                                        <div class="col-lg-6 col-md-4">
                                            <div class="product-list-card">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="image-block mb-32 mb-lg-0">
                                                            <a href="{{route('shop.products.show', $product)}}"><img
                                                                    src="{{ asset($product->image) }}" alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
                                                        <div class="content-block">
                                                            <h4><a href="{{route('shop.products.show', $product)}}">{{ $product->name }}</a></h4>
                                                            <h5>{{ $product->price }}</h5>
                                                            <h6>By: {{ $product->brand->name }}</h6>
                                                            {{-- <span>{{$product->ordered->quantity}}</span> X <span>{{$product->ordered->price}}</span> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4">
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
