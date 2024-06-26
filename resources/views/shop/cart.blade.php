@extends('layouts.shop.app', ['page' => 'cart'])
@section('content')
    @if ($adsAva)
        <x-random-ad />
    @endif
    @livewire('cart-area')
@endsection
