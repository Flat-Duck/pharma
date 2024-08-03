@extends('layouts.app', ['page' => 'products'])
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('products.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.products.show_title')</h3>
    </div>

    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.products.inputs.name')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $product->name ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.products.inputs.description')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $product->description ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.products.inputs.quantity')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $product->quantity ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.products.inputs.price')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $product->price ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.products.inputs.image')</label
                            >
                            <x-partials.thumbnail
                                src="{{ $product->image ? asset($product->image) : '' }}"
                                size="150"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.products.inputs.brand_id')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($product->brand)->name ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.products.inputs.category_id')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($product->category)->name ?? '-' }}"
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
                href="{{ route('products.index') }}"
                class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >

            @can('create', App\Models\Product::class)
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </div>
</div>

@endsection
