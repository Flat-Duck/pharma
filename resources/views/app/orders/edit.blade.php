@extends('layouts.app', ['page' => 'orders'])

@section('content')
<form method="POST" action="{{ route('orders.update', $order) }}" class="card">
    @csrf @method('PUT')
    <div class="card-header">
        <a href="{{ route('orders.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.orders.edit_title')</h3>
    </div>
    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        @include('app.orders.form-inputs')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <div class="d-flex">
            <a
                href="{{ route('orders.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >
            @can('create', App\Models\Order::class)
            <a href="{{ route('orders.create') }}" class="btn btn-link">
                @lang('crud.common.create')
            </a>
            @endcan
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-device-floppy"></i> @lang('crud.common.update')
            </button>
        </div>
    </div>
</form>

@can('view-any', App\Models\order_product::class)
<div class="card mt-4">
    <div class="card-header">
        <h3 class="card-title">منتجات الطلبية</h3>
    </div>
    <div class="card-body">
        <livewire:order-products-detail :order="$order" />
    </div>
</div>
@endcan @endsection
