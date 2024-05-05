@extends('layouts.app', ['page' => 'orders'])
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('orders.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.orders.show_title')</h3>
    </div>

    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.orders.inputs.number')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $order->number ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.orders.inputs.total')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $order->total ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.orders.inputs.is_delivered')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $order->is_delivered ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.orders.inputs.user_id')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($order->user)->name ?? '-' }}"
                                disabled=""
                            />
                        </div>
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
            <a href="{{ route('orders.create') }}" class="btn btn-primary">
                @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </div>
</div>

@endsection
