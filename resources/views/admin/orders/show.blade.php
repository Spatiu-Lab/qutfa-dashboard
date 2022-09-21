@extends('layouts.admin')
@section('content')
@if ($order->status != "delivered")
    <div class="m-5">
        <span class="h2">حالة الطلب : </span>

        @can('update', $order)
            <form method="POST" action="{{route('admin.orders.status',$order)}}" class="d-inline-block">
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
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>بيانات العميل</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered  table-hover text-center">
                        <thead>
                            <tr>
                                <th>الاسم</th>
                                <td>{{ $order->user->name }}</td>
                            </tr>
                            <tr>
                                <th>رقم الهاتف</th>
                                <td>{{ $order->user->phone }}</td>
                            </tr>
                            <tr>
                                <th>البريد الالكتروني</th>
                                <td>{{ $order->user->customer->email ?? '-' }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>بيانات الطلب</h4>
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
                                <th>العنوان</th>
                                <td>{{ $order->address }}</td>
                            </tr>
                            <tr>
                                <th>رقم الهاتف</th>
                                <td>{{ $order->phone }}</td>
                            </tr>
                            <tr>
                                <th>تاريخ الطلب</th>
                                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            </tr>
                            <tr>
                                <th>الحالة</th>
                                <td>@lang('status.' . $order->status)</td>
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
@endsection
