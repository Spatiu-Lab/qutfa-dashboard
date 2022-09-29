<div>
    <div class="form-group">
        <button id="filter" type="button" class="btn btn-primary btn-sm"><i class="fa fa-filter"></i></button>
    </div>
    <form action="#" method="get">
        <div id="filter-body" class="card">
            <div class="card-header">
                <h3>
                    فلتر
                    <button style="float: left" type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> بحث</button>
                </h3>
            </div>
            <div class="card-body">
                @foreach ($columns as $key => $column)
                    <input type="hidden" name="columns[{{ $key }}]" value="{{ $column }}">
                @endforeach
                <div class="row">
                    @isset($params['categories'])
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="users" class="col-sm-4 col-form-label">القسم</label>
                                    <div class="col-sm-8">
                                        <select style="width: 100%" name="category" class="custom-select">
                                            <option value="all">الكل</option>
                                            @foreach ($params['categories'] as $category)
                                                <option value="{{ $category->id }}" {{ $category->id ==  request()->category ? 'selected' : '' }} >{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                    @isset($status)
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="form-group row">
                                    <label for="users" class="col-sm-4 col-form-label">الحالة</label>
                                    <div class="col-sm-8">
                                        <select style="width: 100%" name="status" class="custom-select">
                                            <option value="all">الكل</option>
                                            @foreach ($status as $key => $stat)
                                                <option value="{{ $key }}" {{ $key ==  request()->status ? 'selected' : '' }} >{{ $stat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                    @isset($date)
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label for="date" class="col-sm-2 col-form-label">من</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="from" id="date" value="{{ request()->from }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-group row">
                                            <label for="date" class="col-sm-3 col-form-label">الى</label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control" name="to" id="date" value="{{ request()->to }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                </div>

            </div>
        </div>
    </form>
</div>



{{-- styles --}}
@section('styles')
    <style>
        #filter-body {
            display: none
        }

    </style>
@endsection


{{-- scripts --}}

@push('scripts')
    <script>
        $('#filter').click(function () {
            $('#filter-body').fadeToggle("slow", "linear");
        })

    </script>
@endpush
