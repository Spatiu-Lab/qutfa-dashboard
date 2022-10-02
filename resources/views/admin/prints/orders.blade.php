@extends('layouts.admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">
@endpush

@section('content')
    <div class="card-header">
        <div class="row text-center">
            <div class="col-md-4 col-print-4 print-area  text-center">
                <img style="width: 25%" src="{{ asset('front/assets/img/logo12.png') }}" alt="">
                <h3>قطفة</h3>
                <p>052145214 - الرياض</p>
            </div>
            <div class="col-md-4 col-print-4 print-area">
                <div class="py-4">
                    <p>قائمة الطلبات</p>
                </div>
            </div>
            <div class="col-md-4 col-print-4 print-area">
                {{-- <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $order->project->name }}" width="90" /> --}}
            </div>
        </div>
    </div>
    <div class="col-12 p-3" >
        <div class="col-12 p-0" >
            <table class="table table-bordered  table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>العميل</th>
                        <th>عدد المنتجات </th>
                        <th>الاجمالي</th>
                        <th>وقت الطلب</th>
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->products->count() }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</td>
                            <td>@lang('status.' . $order->status)</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            window.print()
        })
    </script>
@endpush
