@extends('layouts.admin')
@section('content')
    {{-- <div class="filter my-3">
        <div class="row">
            <div class="col-md-12">
                <x-filter-component :category="$category"></x-filter-component>
            </div>
        </div>
    </div> --}}
    <div class="col-12 p-3">
        <div class="col-12 col-lg-12 p-0 main-box">
            <div class="col-12 px-0">
                <div class="col-12 p-0 row">
                    <div class="col-12 col-lg-4 py-3 px-3">
                        <span class="fas fa-categories"></span> الخصومات
                    </div>
                    <div class="col-12 col-lg-4 p-2">
                    </div>
                    <div class="col-12 col-lg-4 p-2 text-lg-end">
                        @can('create',\App\Models\CategoryDiscount::class)
                            <a href="{{route('admin.discounts.create')}}">
                                <span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
                            </a>
                        @endcan
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
                            <th>القسم</th>
                            <th>نسبة الخصم</th>
                            <th>تحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($discounts as $discount)
                        <tr>
                            <td>{{ $loop->index  + 1}}</td>
                            <td>{{ $discount->category->title }}</td>
                            <td>{{ $discount->discount }}%</td>
                            <td style="width: 180px;">
                                @can('update',$discount)
                                    <a href="{{route('admin.discounts.edit',$discount)}}">
                                        <span class="btn  btn-outline-success btn-sm font-1 mx-1">
                                            <span class="fas fa-wrench "></span> تحكم
                                        </span>
                                    </a>
                                @endcan
                                @can('delete',$discount)
                                    <form method="POST" action="{{route('admin.discounts.destroy',$discount)}}" class="d-inline-block">@csrf @method("DELETE")
                                        <button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
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
                {{ $discounts->appends(request()->query())->render() }}
            </div>
        </div>
    </div>
@endsection
