@extends('layouts.admin')
@section('content')
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">
            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-catyegories"></span> الطلبات
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                    </div>

                </div>
                <div class="col-12 divider" style="min-height: 2px;"></div>
            </div>
            <div class="col-12 py-2 px-2 row">
                <div class="col-12 col-lg-4 p-2">
                    <form method="GET">
                        <input type="text" name="q" class="form-control" placeholder="بحث ... ">
                    </form>
                </div>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->email }}</td>
                                    <td>{{ $order->products_count }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 p-3">
                {{-- {{ $orders->appends(request()->query())->render() }} --}}
            </div>
        </div>
    </div>
@endsection
