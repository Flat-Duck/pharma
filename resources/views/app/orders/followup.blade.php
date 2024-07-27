@extends('layouts.app', ['page' => 'orders'])
@section('content')
<div class="card">
    <div class="card-body border-bottom py-3">
        <div class="d-flex">
            <form>
                <div class="row g-2">
                    <div class="input-icon col">
                        <span class="input-icon-addon">
                            <i class="ti ti-search"></i>
                        </span>
                        <input
                            id="indexSearch"
                            name="search"
                            type="text"
                            value=""
                            class="form-control"
                            placeholder="Search…"
                            aria-label="Search..."
                            spellcheck="false"
                            data-ms-editor="true"
                            autocomplete="off"
                        />
                    </div>
                    <div class="col-auto">
                        <button
                            class="btn btn-icon btn-primary"
                            aria-label="Button"
                        >
                            <i class="ti ti-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            {{-- <div class="col-auto ms-auto d-print-none">
                @can('create', App\Models\Order::class)
                <a
                    data-bs-original-title="إنشاء"
                    data-bs-placement="top"
                    data-bs-toggle="tooltip"
                    class="pull-right btn btn-primary"
                    href="{{ route('orders.create') }}"
                >
                    <i class="ti ti-plus"></i>
                    @lang('crud.common.create')
                </a>
                @endcan

            </div> --}}
        </div>
    </div>

    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
                <tr>
                    <th class="text-right">
                        @lang('crud.orders.inputs.number')
                    </th>
                    <th class="text-right">
                        @lang('crud.orders.inputs.total')
                    </th>
                    <th class="text-left">
                        @lang('crud.orders.inputs.user_id')
                    </th>
                    <th class="text-center">@lang('crud.orders.inputs.status')</th>
                    <th class="text-center">@lang('crud.orders.inputs.status')</th>
                    <th class="text-center">@lang('crud.common.actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td>{{ $order->number ?? '-' }}</td>
                    <td>{{ $order->total ?? '-' }}</td>
                    <td>{{ optional($order->user)->name ?? '-' }}</td>
                    <td>
                        <span class="dropdown">
                            <button class="btn dropdown-toggle align-text-top" data-bs-boundary="viewport" data-bs-toggle="dropdown" aria-expanded="false">تغيير حالة الطلبية</button>
                            <div class="dropdown-menu" style="">
                                <a href="{{route('update_order_status_one',$order)}}" type="submit" class="dropdown-item" >طلبك قيد الاعداد</a>
                                <a href="{{route('update_order_status_two',$order)}}" type="submit" class="dropdown-item" >طلبك قيد التوصيل</a>
                                <a href="{{route('update_order_status_three',$order)}}" type="submit" class="dropdown-item" >تم التسليم</a>
                                    
                                
                            </div>
                        </span>
                    </td>
                    <td>
                        <span> {{ $order->status ?? '-' }} </span>
                    </td>
                    <td class="text-center" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="btn-group"
                        >
                            @can('update', $order)
                            <a
                                href="{{ route('orders.edit', $order) }}"
                                class="btn btn-icon btn-outline-warinig ms-1"
                            >
                                <i class="ti ti-edit"></i>
                            </a>
                            @endcan @can('view', $order)
                            <a
                                href="{{ route('orders.show', $order) }}"
                                class="btn btn-icon btn-outline-info ms-1"
                            >
                                <i class="ti ti-eye"></i>
                            </a>
                            @endcan @can('delete', $order)
                            <form
                                action="{{ route('orders.destroy', $order) }}"
                                method="POST"
                                class="inline pointer ms-1"
                                onsubmit="return confirm('{{ __('crud.common.are_you_sure') }}')"
                            >
                                @csrf @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-icon btn-outline-danger"
                                >
                                    <i class="ti ti-trash-x"></i>
                                </button>
                            </form>
                            @endcan
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">@lang('crud.common.no_items_found')</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex align-items-left">
        {!! $orders->render() !!}
    </div>
</div>
@endsection
