@extends('layouts.app', ['page' => 'stats'])
@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-12">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row">
                        {{-- <img src="/pharma_logo.png" style="display: block; width:140px; margin-top:-65px; margin-left: auto; margin-right: auto;" alt="logo"> --}}
                        {{-- <h1 class="d-flex justify-content-center">صيدلية طوبى</h1> --}}
                        
                        <h4 class="d-flex justify-content-center">تقرير المبيعات</h4>
                    </div>
                    <div class="d-flex">
                        {{-- <div class="row g-2">
                            <div class="col">
                                {{now()->format('Y/d/m')}}
                            </div>
                            <div class="col">
                                رقم الفاتورة : {{$order->number}} #
                            </div>
                        </div> --}}
                    </div>
                    <div class="divide-y-2 mt-4">
                        <div class="table-responsive">
                            <table class="table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>رقم الفاتورة</th>
                                        <th>قيمة الفاتورة</th>
                                        <th>التاريخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $k => $order )
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $order->number ?? '-' }}</td>
                                        <td>{{ $order->total ?? '-' }}</td>
                                        <td>{{ $order->created_at->format('Y/d/m') ?? '-' }}</td>
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
                                        <th>عدد الفواتير</th>
                                        <th>المجموع</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $orders->count()}}</td>
                                        <td>{{ $orders->sum('total')}} د.ل</td>
                                    </tr>
                                </tbody>
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