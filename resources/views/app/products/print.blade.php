@extends('layouts.app', ['page' => 'stats'])
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row">
                            <h4 class="d-flex justify-content-center">تقرير المنتجات الموجودة</h4>
                        </div>
                        <div class="d-flex">
                        </div>
                    </div>
                    <div class="divide-y-2 mt-4">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>
                                        <th class="text-left">
                                            #
                                        </th>
                                        <th class="text-left">
                                            @lang('crud.products.inputs.name')
                                        </th>
                                        <th class="text-right">
                                            @lang('crud.products.inputs.quantity')
                                        </th>
                                        <th class="text-right">
                                            @lang('crud.products.inputs.price')
                                        </th>
                                        <th class="text-left">
                                            @lang('crud.products.inputs.brand_id')
                                        </th>
                                        <th class="text-left">
                                            @lang('crud.products.inputs.category_id')
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $k => $product)
                                        <tr>
                                            <td>{{ $k + 1 }}</td>
                                            <td>{{ $product->name ?? '-' }}</td>
                                            <td>{{ $product->quantity ?? '-' }}</td>
                                            <td>{{ $product->price ?? '-' }}</td>
                                            <td>{{ optional($product->brand)->name ?? '-' }}</td>
                                            <td>{{ optional($product->category)->name ?? '-' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">@lang('crud.common.no_items_found')</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', () => {
            print();

        });
    </script>
@endpush
