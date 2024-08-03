@extends('layouts.app', ['page' => 'stats'])
@section('content')
<div class="container">
    <div class="row justify-content-center d-print-none">
        {{-- <x-state color="bg-yellow" title="عدد الطلبيات بحاجة الي صرف" subtitle="{{ \App\Models\Order::NotIssuedCount() }}" /> --}}
        <x-state color="bg-pink" link="{{ route('stock') }}" title="عددالمنتجات الموجودة" subtitle="{{ \App\Models\Product::count() }}" />
        <x-state color="bg-red" title="عددالطلبيات" subtitle="{{ \App\Models\Order::where('status','تم إستلام طلبك')->count() }}" />
        <x-state color="bg-orange" title="عددالطلبيات قيد التجهيز" subtitle="{{ \App\Models\Order::where('status','طلبك قيد الاعداد')->count() }}" />
        <x-state color="bg-yellow" title="عددالطلبيات قيد التوصيل " subtitle="{{ \App\Models\Order::where('status','طلبك قيد التوصيل')->count() }}" />
        <x-state color="bg-green" link="{{ route('sales') }}"  title="عددالطلبيات التي تم تسليمها" subtitle="{{ \App\Models\Order::where('status','تم التسليم')->count() }}" />

    </div>
</div>
@endsection
