@extends('layouts.shop.app', ['page' => 'cart'])
@section('content')
    <x-random-ad />
    @livewire('cart-area')
@endsection
