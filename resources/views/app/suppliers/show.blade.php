@extends('layouts.app', ['page' => 'suppliers'])
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('suppliers.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.suppliers.show_title')</h3>
    </div>

    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.suppliers.inputs.name')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $supplier->name ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.suppliers.inputs.phone')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $supplier->phone ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.suppliers.inputs.address')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $supplier->address ?? '-' }}"
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
                href="{{ route('suppliers.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >

            @can('create', App\Models\Supplier::class)
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary">
                @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </div>
</div>

@endsection
