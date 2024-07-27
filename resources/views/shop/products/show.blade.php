@extends('layouts.shop.app', ['page' => 'home'])
@section('content')
    <@livewire('product-preview', ['product' => $product], key($product->id))
@endsection
