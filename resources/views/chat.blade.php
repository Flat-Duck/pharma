@extends('layouts.app', ['page' => 'chat'])
@section('content')
@livewire('chat',[
    'is_admin'=>true
])
@endsection

