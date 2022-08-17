@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
    <div class="col-12 col-lg-12 p-0 ">
        <form id="validate-form" class="row" enctype="multipart/form-data" method="POST" action="{{route('admin.sliders.store')}}">
            @csrf
            <div class="col-12 col-lg-8 p-0 main-box">
                <div class="col-12 px-0">
                    <div class="col-12 px-3 py-3">
                        <span class="fas fa-info-circle"></span> إضافة جديد
                    </div>
                    <div class="col-12 divider" style="min-height: 2px;"></div>
                </div>
                <div class="col-12 p-3 row">
                    @foreach(config('translatable.locales') as $key)
                        <div class="col-12 col-lg-6 p-2">
                            <div class="col-12">
                                العنوان {{ __('lang.' . $key) }}
                            </div>
                            <div class="col-12 pt-3">
                                <input type="text" name="title[{{ $key }}]" required maxlength="190" class="form-control" value="" >
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 p-2">
                        <div class="col-12">
                            الصورة الرئيسية
                        </div>
                        <div class="col-12 pt-3">
                            <input type="file" name="image" class="form-control" accept="image/*">
                        </div>
                        <div class="col-12 pt-3">
                        </div>
                    </div>
                    {{-- <div class="col-12 col-lg-6 p-2">
                        <div class="col-12">
                            الترتيب
                        </div>
                        <div class="col-12 pt-3">
                            <input type="number" name="rank" required  class="form-control" value="{{old('rank')}}">
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-12 p-3">
                <button class="btn btn-success" id="submitEvaluation">حفظ</button>
            </div>
        </form>
    </div>
</div>
@endsection
