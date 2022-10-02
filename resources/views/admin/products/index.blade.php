@extends('layouts.admin')
@section('content')
    <div class="filter my-3">
        <div class="row">
            <div class="col-md-12">
                <x-filter-component :params="['categories' => $categories]" :status="$status"></x-filter-component>
            </div>
        </div>
    </div>
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">
            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-catyegories"></span> المنتجات
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                    </div>
                    <div class="col-12 col-lg-4 p-2 text-lg-end">
                        @can('create', \App\Models\Product::class)
                            <a href="{{ route('admin.products.create') }}">
                                <span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
                            </a>
                        @endcan
                        <a href="{{ route('admin.products.print') }}?{{ request()->getQueryString() }}">
                            <span class="btn btn-secondary"><span class="fas fa-print"></span> طباعة</span>
                        </a>
                        <a target="_blanck" href="{{ route('admin.products.exports') }}?{{ request()->getQueryString() }}">
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
                                <th>الاسم</th>
                                <th>الصورة</th>
                                <th>الحالة</th>
                                <th>القسم </th>
                                <th>تحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td><img src="{{ $product->image() }}" style="width:40px"></td>
                                    <td>{{ $product->status }}</td>
                                    <td>{{ $product->category->title }}</td>
                                    <td style="width: 180px;">
                                        @can('update', $product)
                                            <a href="{{ route('admin.products.edit', $product) }}">
                                                <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                                    <span class="fas fa-wrench "></span> تحكم
                                                </span>
                                            </a>
                                        @endcan
                                        @can('delete', $product)
                                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                                class="d-inline-block">@csrf @method('DELETE')
                                                <button class="btn  btn-outline-danger btn-sm font-1 mx-1"
                                                    onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
                                                    <span class="fas fa-trash "></span> حذف
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 p-3">
                {{ $products->appends(request()->query())->render() }}
            </div>
        </div>
    </div>
@endsection
