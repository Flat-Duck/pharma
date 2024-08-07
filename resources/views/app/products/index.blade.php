@extends('layouts.app', ['page' => 'products'])
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
            <div class="col-auto ms-auto d-print-none">
                @can('create', App\Models\Product::class)
                <a
                    data-bs-original-title="إنشاء"
                    data-bs-placement="top"
                    data-bs-toggle="tooltip"
                    class="pull-right btn btn-primary"
                    href="{{ route('products.create') }}"
                >
                    <i class="ti ti-plus"></i>
                    @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable">
            <thead>
                <tr>
                    <th class="text-left">
                        @lang('crud.products.inputs.name')
                    </th>
                    <th class="text-left">
                        @lang('crud.products.inputs.description')
                    </th>
                    <th class="text-right">
                        @lang('crud.products.inputs.quantity')
                    </th>
                    <th class="text-right">
                        @lang('crud.products.inputs.price')
                    </th>
                    <th class="text-left">
                        @lang('crud.products.inputs.image')
                    </th>
                    <th class="text-left">
                        @lang('crud.products.inputs.brand_id')
                    </th>
                    <th class="text-left">
                        @lang('crud.products.inputs.category_id')
                    </th>
                    <th class="text-center">@lang('crud.common.actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{ $product->name ?? '-' }}</td>
                    <td>{{ $product->description ?? '-' }}</td>
                    <td>{{ $product->quantity ?? '-' }}</td>
                    <td>{{ $product->price ?? '-' }}</td>
                    <td>
                        <x-partials.thumbnail
                            src="{{ $product->image ? asset($product->image) : '' }}"
                        />
                    </td>
                    <td>{{ optional($product->brand)->name ?? '-' }}</td>
                    <td>{{ optional($product->category)->name ?? '-' }}</td>
                    <td class="text-center" style="width: 134px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="btn-group"
                        >
                            @can('update', $product)
                            <a
                                href="{{ route('products.edit', $product) }}"
                                class="btn btn-icon btn-outline-warinig ms-1"
                            >
                                <i class="ti ti-edit"></i>
                            </a>
                            @endcan @can('view', $product)
                            <a
                                href="{{ route('products.show', $product) }}"
                                class="btn btn-icon btn-outline-info ms-1"
                            >
                                <i class="ti ti-eye"></i>
                            </a>
                            @endcan @can('delete', $product)
                            <form
                                action="{{ route('products.destroy', $product) }}"
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
                    <td colspan="8">@lang('crud.common.no_items_found')</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer d-flex align-items-left">
        {!! $products->render() !!}
    </div>
</div>
@endsection
