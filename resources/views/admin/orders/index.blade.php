@extends('layouts.admin')
@section('content')
    <div class="filter my-3">
        <div class="row">
            <div class="col-md-12">
                <x-filter-component :status="$status" date="true"></x-filter-component>
            </div>
        </div>
    </div>
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">
            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-catyegories"></span> الطلبات
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                    </div>
                    <div class="col-12 col-lg-4 p-2 text-lg-end">
                        <a href="{{ route('admin.orders.print') }}?{{ request()->getQueryString() }}">
                            <span class="btn btn-secondary"><span class="fas fa-print"></span> طباعة</span>
                        </a>
                        <a target="_blanck" href="{{ route('admin.orders.exports') }}?{{ request()->getQueryString() }}">
                            <span class="btn btn-success"><span class="fas fa-file-excel"></span> تصدير اكسل</span>
                        </a>
                    </div>
                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>
            <div class="col-12 p-3" style="overflow:auto">
                <div class="col-12 p-0" style="min-width:1100px;">


                    <table class="table table-bordered  table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>العميل</th>
                                <th>عدد المنتجات </th>
                                <th>الاجمالي</th>
                                <th>وقت الطلب</th>
                                <th>الحالة</th>
                                <th>خيارات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $index => $order)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->products->count() }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</td>
                                    <td>@lang('status.' . $order->status)</td>
                                    <td>
                                        @if ($order->status != "delivered")
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
                                        @endif
                                        @can('view', $order)
                                            <a href="{{ route('admin.orders.show', $order) }}">
                                                <span class="btn  btn-outline-info btn-sm font-1 mx-1">
                                                    <span class="fas fa-eye "></span> عرض
                                                </span>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 p-3">
                {{ $orders->appends(request()->query())->render() }}
            </div>
        </div>
    </div>
@endsection
