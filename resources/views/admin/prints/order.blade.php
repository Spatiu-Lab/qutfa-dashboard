@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">
@endpush

@section('content')
        <p class="text-left" style="float: right">
            <button class="btn btn-outline-secondary btn-sm pull-left no-print font-1 mx-1 d-inline-block no-print" onclick="window.print()"><i class="fa fa-print"> طباعة </i></button>
        </p>
        <div class="card-header">
            <div class="row text-center">
                <div class="col-md-4 col-print-4 print-area  text-center">
                    <img style="width: 25%" src="{{ asset('front/assets/img/logo12.png') }}" alt="">
                    <h3>قطفة</h3>
                    <p>052145214 - الرياض</p>
                </div>
                <div class="col-md-4 col-print-4 print-area">
                    <div class="py-4">
                        <p>QATFA-{{ $order->id }}</p>
                    </div>
                </div>
                <div class="col-md-4 col-print-4 print-area">
                    {{-- <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $order->project->name }}" width="90" /> --}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-print-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>بيانات العميل</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered  table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <td>{{ $order->user->name ?? '-'}}</td>
                                    </tr>
                                    <tr>
                                        <th>رقم الهاتف</th>
                                        <td>{{ $order->user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>البريد الالكتروني</th>
                                        <td>{{ $order->user->customer->email ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>العنوان</th>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-print-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                بيانات الطلب
                                @if ($order->status != "delivered")
                                    @can('update', $order)
                                        <form method="POST" action="{{route('admin.orders.status',$order)}}" class="no-print d-inline-block float-left no-print">
                                            @csrf @method("PUT")
                                            <button class="btn  btn-outline-success btn-sm font-1 mx-1">
                                                <span class="fas fa-check "></span>
                                                @if ($order->status == 'waitting')
                                                    تاكيد الطلب
                                                @elseif ($order->status == 'accepted')
                                                    توصيل
                                                @elseif ($order->status == 'delivery')
                                                    تم التوصيل
                                                @endif
                                            </button>
                                        </form>
                                    @endcan
                                @endif
                            </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered  table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>رقم الطلب</th>
                                        <td>{{ $order->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>القيمة</th>
                                        <td>{{ $order->total }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <th>رقم الهاتف</th>
                                        <td>{{ $order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>تاريخ الطلب</th>
                                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>المنتجات</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered  table-hover text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>المنتج</th>
                                        <th>الوحدة </th>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                        <th>الاجمالى</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->products as $product)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $product->product->product->name }}</td>
                                            <td>{{ $product->product->unit->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->quantity * $product->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
<script>
    $(function () {
        window.print()
    })
</script>
@endsection