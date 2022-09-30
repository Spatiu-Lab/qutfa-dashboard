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
                    <p>قائمة المنتجات</p>
                </div>
            </div>
            <div class="col-md-4 col-print-4 print-area">
                {{-- <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ $order->project->name }}" width="90" /> --}}
            </div>
        </div>
    </div>
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">
            <div class="col-12 p-3" >
                <div class="col-12 p-0">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>الحالة</th>
                                <th>القسم </th>
                                <th>التاريخ </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td>{{ $product->category->title }}</td>
                                    <td>{{ $product->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
