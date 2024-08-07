@extends('layouts.app', ['page' => 'ads'])
@section('content')
<div class="card">
    <div class="card-header">
        <a href="{{ route('ads.index') }}" class="mr-4"
            ><i class="ti ti-arrow-back"></i
        ></a>
        <h3 class="card-title">@lang('crud.ads.show_title')</h3>
    </div>

    <div class="card-body">
        <div class="row g-5">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-md-6 col-xl-12">
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.ads.inputs.title')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $ad->title ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.ads.inputs.body')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $ad->body ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.ads.inputs.offer')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ $ad->offer ?? '-' }}"
                                disabled=""
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.ads.inputs.image')</label
                            >
                            <x-partials.thumbnail
                                src="{{ $ad->image ? asset($ad->image) : '' }}"
                                size="150"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label"
                                >@lang('crud.ads.inputs.product_id')</label
                            >
                            <input
                                type="text"
                                class="form-control"
                                value="{{ optional($ad->product)->name ?? '-' }}"
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
            <a href="{{ route('ads.index') }}" class="btn btn-outline-secondary"
                >@lang('crud.common.back')</a
            >

            @can('create', App\Models\Ad::class)
            <a href="{{ route('ads.create') }}" class="btn btn-primary">
                @lang('crud.common.create')
            </a>
            @endcan
        </div>
    </div>
</div>

@endsection
