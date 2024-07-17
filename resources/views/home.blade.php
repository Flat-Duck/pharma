@extends('layouts.app', ['page' => 'dashboard'])
@section('content')
<div class="container">
    <div class="row justify-content-center d-print-none">
        <x-state link="{{ route('categories.index') }}" icon="category"  color="bg-yellow" title="التصنيفات" subtitle="{{ \App\Models\Category::count() }}"/>
        <x-state link="{{ route('products.index') }}" icon="brand-tidal"  color="bg-green" title="المنتجات" subtitle="{{ \App\Models\Product::count() }}"/>
        <x-state link="{{ route('brands.index') }}" icon="badge-tm"  color="bg-red" title="العلامات التجارية" subtitle="{{ \App\Models\Brand::count() }}"/>
        <x-state link="{{ route('orders.index') }}" icon="truck-delivery"  color="bg-blue" title="الطلبيات" subtitle="{{ \App\Models\Order::count() }}"/>
        <x-state link="{{ route('users.index') }}" icon="users"  color="bg-orange" title="المستخدمين" subtitle="{{ \App\Models\User::count() }}"/>
        <x-state link="{{ route('ads.index') }}" icon="badge-ad"  color="bg-azure" title="الإعلانات" subtitle="{{ \App\Models\Ad::count() }}"/>
        <x-state link="{{ route('chats') }}" icon="brand-hipchat"  color="bg-lime" title="المحادثات" subtitle="{{ \App\Models\Chat::count() }}"/>
    </div>
</div>
@endsection
