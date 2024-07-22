@extends('layouts.shop-chat', ['page' => 'ads'])
@section('content')
@livewire('chat',['is_admin' => false])
@endsection

