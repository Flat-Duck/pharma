@extends('layouts.shop.app', ['page' => 'cart'])

@section('content')
    <div class="hero-banner-2 bg-lightest-gray p-3">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-block">
                        <h1 class="mb-12 text-center">طلبات الزبون</h1>
                        <p class="dark-gray"> من هنا يمكنك عرض جميع طلبياتك السابقة والحالية</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section>
            <div class="container">
                <section class="weekly-deals p-40">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-1"></div>
                            <div class="col-xl-10">
                                @isset($order)                                
                                <div class="row">
                                    <div class="col-lg-3 col-md-3">
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="p-16 mb-24 bg-lightest-gray box-shadow br-20">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{route('shop.orders.show',$order)}}" >
                                                        <img src="{{asset('assets/media/cart.jpg')}}" class="book-img br-20" alt="" />
                                                    </a>
                                                </div>
                                                <div class="col-6 m-auto">
                                                    <h5>
                                                        <a href="{{route('shop.orders.show',$order)}}" >طلبية رقم : {{$order->number}}</a>
                                                    </h5>
                                                    <h6 class="dark-gray">{{$order->created_at->format('y/m/d')}}</h6>
                                                    <div class="book-price mt-32 mb-32">
                                                        <h5>{{$order->total}}</h5>
                                                        <span class="dark-gray">د.ل</span>
                                                    </div>

                                                    <h6 class="dark-gray">{{$order->status}}</h6>
                                                    <div class="progress">
                                                        <progressbar class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{$order->percent()}}">
                                                            <span class="sr-only">{{$order->percent()}} Complete</span>
                                                        </progressbar>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                    </div>
                                </div>
                                <br><hr>
                                @endisset
                                <br>
                                <div class="row">
                                @forelse ($orders as $order )
                                
                                    <div class="col-lg-6 col-md-6">
                                        <div class="p-16 mb-24 bg-lightest-gray box-shadow br-20">
                                            <div class="row">
                                                <div class="col-6">
                                                    <a href="{{route('shop.orders.show',$order)}}" >
                                                        <img src="{{asset('assets/media/cart.jpg')}}" class="book-img br-20" alt="" />
                                                    </a>
                                                </div>
                                                <div class="col-6 m-auto">
                                                    <h5>
                                                        <a href="{{route('shop.orders.show',$order)}}" >طلبية رقم : {{$order->number}}</a>
                                                    </h5>
                                                    <h6 class="dark-gray">{{$order->created_at->format('y/m/d')}}</h6>
                                                    <div class="book-price mt-32 mb-32">
                                                        <h5>{{$order->total}}</h5>
                                                        <span class="dark-gray">د.ل</span>
                                                    </div>

                                                    <h6 class="dark-gray">{{$order->status}}</h6>
                                                    <div class="progress">
                                                        <progressbar class="progress-bar" role="progressbar" aria-valuenow="60"
                                                        aria-valuemin="0" aria-valuemax="100" style="width: {{$order->percent()}}">
                                                            <span class="sr-only">{{$order->percent()}} Complete</span>
                                                        </progressbar>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                    @empty
                                    
                                    @endforelse
                                </div>
                            </div>
                            <div class="col-xl-1"></div>
                        </div>
                    </div>
                </section>
                <!-- Deal of This Weeks End-->
            </div>
    </div>
    </section>
    </div>
@endsection
