@extends('layouts.app', ['page' => 'dashboard'])
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row">
                        <img src="/pharma_logo.png" style="display: block; width:140px; margin-top:-65px; margin-left: auto; margin-right: auto;" alt="logo">
                        {{-- <h1 class="d-flex justify-content-center">صيدلية طوبى</h1> --}}
                        
                        <h4 class="d-flex justify-content-center">فاتورة مبدئية</h4>
                    </div>
                    <div class="d-flex">
                        <div class="row g-2">
                            <div class="col">
                                {{now()->format('Y/d/m')}}
                            </div>
                        </div>
                    </div>
                    <div class="divide-y-2 mt-4">
                        <div class="table-responsive">
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('crud.products.inputs.name')</th>
                                        <th>@lang('crud.products.inputs.quantity')</th>
                                        <th>@lang('crud.products.inputs.price')</th>
                                        <th>المجموع</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($order->products as $k => $product )
                                    <tr>
                                        {{-- {{dd($product)}} --}}
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $product->name ?? '-' }}</td>
                                        <td>{{ $product->ordered->quantity ?? '-' }}</td>
                                        <td>{{ $product->ordered->price ?? '-' }}</td>
                                        <td>{{ $product->ordered->total ?? '-' }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">
                                            @lang('crud.common.no_items_found')
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="table-responsive">
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>عدد المنتجات</th>
                                        <th>قيمة الفاتورة</th>
                                        <th>توقيع الزبون</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $order->products->sum('ordered.quantity')}}</td>
                                        <td>{{ $order->products->sum('ordered.total')}} د.ل</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>معد الفاتورة</th>
                                    </tr>
                                    <tr>
                                        <td >{{auth()->user()->name}}</td>
                                        
                                    </tr>
                                </tfoot>

                            </table>
                        </div>

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