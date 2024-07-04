@extends('layouts.app', ['page' => 'suppliers'])

@section('content')
<form
    method="POST"
    action="{{ route('suppliers.update', $supplier) }}"
    class="card"
>
    @csrf @method('PUT')
    <div class="card-header">
        <a href="{{ route('suppliers.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.suppliers.edit_title')</h3>
    </div>
    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        @include('app.suppliers.form-inputs')
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
            <a href="{{ route('suppliers.create') }}" class="btn btn-link">
                @lang('crud.common.create')
            </a>
            @endcan
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-device-floppy"></i> @lang('crud.common.update')
            </button>
        </div>
    </div>
</form>

@endsection
