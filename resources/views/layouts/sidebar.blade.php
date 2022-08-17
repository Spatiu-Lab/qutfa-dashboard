<form method="POST" action="{{ route('logout') }}" id="logout-form" class="d-none">@csrf</form>
<div class="col-12 d-flex">
    <div style="width: 260px;background: #11233b;min-height: 100vh;position: fixed;z-index: 100" class="aside active">
        <div class="col-12 px-0 d-flex" style="height: 55px;background: #1a2d4d">
            <div class="col-12 p-1" style="color: #fff">
                <div class="col-12 p-0 row">
                    <div class="col-3 py-1 px-1">
                        <span class="fas fa-chart-bar font-4 d-flex justify-content-center align-items-center"
                            style="background: #0194fe;height: 40px;width: 40px;border-radius: 50%;"></span>
                    </div>
                    <div class="col-9 ">
                        <span class="d-inline-block px-2 font-3 pt-1">لوحة التحكم</span>
                        <span
                            style="width: 55px;height: 55px;position: absolute;left: 0px;top: 0px;align-items: center;justify-content: center;cursor: pointer;background: rgb(17 35 59 / 39%);"
                            class="asideToggle d-flex d-md-none rounded-0">
                            <span class="fal fa-bars font-4 "></span>
                        </span>
                    </div>
                </div>
                <div class="d-none d-md-none justify-content-center align-items-center px-0   asideToggle"
                    style="width: 40px;height: 40px;">
                    <span class="fal fa-bars font-4 cursor-pointer"></span>
                </div>
            </div>
        </div>
        <div class="col-12 px-0 py-5 text-center justify-content-center align-items-center ">
            <a href="{{ route('admin.profile.edit') }}">
                <img src="{{ auth()->user()->getUserAvatar() }}"
                    style="width: 40px;height: 40px;color: #fff;border-radius: 50%" class="d-inline-block">
            </a>
            <div class="col-12 px-0 mt-2" style="color: #fff">
                مرحباً {{ auth()->user()->name }}
            </div>
        </div>
        <div class="col-12 px-0">
            <div class="col-12 px-0 aside-menu" style="height: calc(100vh - 260px);overflow: auto;">
                <a href="{{ route('admin.index') }}" class="col-12 px-0">
                    <div class="col-12 item px-0 d-flex">
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-home font-2"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2">
                            الرئيسية
                        </div>
                    </div>
                </a>
                @can('viewAny', \App\Models\Product::class)
                    <a href="{{ route('admin.products.index') }}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex ">
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-tag font-2"> </span>
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                المنتجات
                            </div>
                        </div>
                    </a>
                @endcan
                @can('viewAny', \App\Models\Category::class)
                    <a href="{{ route('admin.categories.index') }}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex ">
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-tag font-2"> </span>
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الأقسام
                            </div>
                        </div>
                    </a>
                @endcan
                @can('viewAny', \App\Models\Unit::class)
                    <a href="{{ route('admin.units.index') }}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex ">
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-tag font-2"> </span>
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الوحدات
                            </div>
                        </div>
                    </a>
                @endcan
                @can('viewAny',\App\Models\Slider::class)
                    <a href="{{route('admin.sliders.index')}}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex " >
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-tag font-2"> </span> 
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                المعرض
                            </div> 
                        </div>
                    </a>
                @endcan
                @can('viewAny', \App\Models\User::class)
                    <a href="{{ route('admin.users.index') }}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex ">
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-users font-2"> </span>
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                العملاء
                            </div>
                        </div>
                    </a>
                @endcan
                @can('viewAny', \App\Models\User::class)
                    <a href="{{ route('admin.users.index') }}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex ">
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-users font-2"> </span>
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                المستخدمين
                            </div>
                        </div>
                    </a>
                @endcan
                
                
                @can('viewAny', \App\Models\Setting::class)
                    <a href="{{ route('admin.settings.index') }}" class="col-12 px-0">
                        <div class="col-12 item px-0 d-flex ">
                            <div style="width: 50px" class="px-3 text-center">
                                <span class="fal fa-wrench font-2"> </span>
                            </div>
                            <div style="width: calc(100% - 50px)" class="px-2">
                                الإعدادات
                            </div>
                        </div>
                    </a>
                @endcan
                <a href="#" class="col-12 px-0" onclick="document.getElementById('logout-form').submit();">
                    <div class="col-12 item px-0 d-flex ">
                        <div style="width: 50px" class="px-3 text-center">
                            <span class="fal fa-sign-out-alt font-2"> </span>
                        </div>
                        <div style="width: calc(100% - 50px)" class="px-2">
                            تسجيل خروج
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="main-content in-active" style="overflow: hidden;">
        <div class="col-12 px-0 d-flex justify-content-between top-nav"
            style="height: 55px;background: #fff;position: fixed;width: 100%;width: calc(100% - 260px);z-index: 1000;">
            <div class="col-12 px-0 d-flex justify-content-center align-items-center btn  asideToggle"
                style="width: 55px;height: 55px;">
                <span class="fal fa-bars font-4"></span>
            </div>
            <div class="col-12 px-0 d-flex justify-content-end  " style="height: 60px;">
                <div class="btn-group" id="notificationDropdown">

                    <div class="col-12 px-0 d-flex justify-content-center align-items-center btn  "
                        style="width: 55px;height: 55px;" data-bs-toggle="dropdown" aria-expanded="false"
                        id="dropdown-notifications">
                        <span class="fal fa-bell font-3 d-inline-block"
                            style="color: #333;transform: rotate(15deg)"></span>
                        <span
                            style="position: absolute;min-width: 25px;min-height: 25px;
                        @if ($unreadNotifications != 0) display: inline-block;
                        @else
                        display: none; @endif
                        right: 0px;top: 0px;border-radius: 20px;background: #c00;color:#fff;font-size: 14px;"
                            id="dropdown-notifications-icon">{{ $unreadNotifications }}</span>

                    </div>
                    <div class="dropdown-menu py-0 rounded-0 border-0 shadow "
                        style="cursor: auto!important;z-index: 20000;width: 350px;height: 450px;">
                        <div class="col-12 notifications-container" style="height:406px;overflow: auto;">
                            <x-notifications :notifications="$notifications" />
                        </div>
                        <div class="col-12 d-flex border-top">
                            <a href="{{ route('admin.notifications.index') }}" class="d-block py-2 px-3 ">
                                <div class="col-12 align-items-center">
                                    <span class="fal fa-bells"></span> عرض كل الإشعارات
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-12 px-0 d-flex justify-content-center align-items-center  dropdown"
                    style="width: 55px;height: 55px;">
                    <div style="width: 55px;height: 55px;cursor: pointer;" data-bs-toggle="dropdown"
                        aria-expanded="false" class="d-flex justify-content-center align-items-center cursor-pointer">
                        <img src="{{ auth()->user()->getUserAvatar() }}"
                            style="padding: 10px;border-radius: 50%;width: 55px;height: 55px;">
                    </div>
                    <ul class="dropdown-menu shadow border-0" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item font-1" href="/" target="_blank"><span
                                    class="fal fa-desktop font-1"></span> عرض الموقع</a></li>
                        <li><a class="dropdown-item font-1" href="{{ route('admin.profile.index') }}"><span
                                    class="fal fa-user font-1"></span> ملفي الشخصي</a></li>

                        <li><a class="dropdown-item font-1" href="{{ route('admin.profile.edit') }}"><span
                                    class="fal fa-edit font-1"></span> تعديل ملفي الشخصي</a></li>

                        @can('viewAny', \App\Models\Redirection::class)
                            <li><a class="dropdown-item font-1" href="{{ route('admin.redirections.index') }}"><span
                                        class="fal fa-directions font-1"></span> التحويلات</a></li>
                        @endcan


                        @can('viewAny', \App\Models\HubFile::class)
                            <li><a class="dropdown-item font-1" href="{{ route('admin.files.index') }}"><span
                                        class="fal fa-file font-1"></span> الملفات</a></li>
                        @endcan


                        @can('viewAny', \App\Models\RateLimit::class)
                            <li><a class="dropdown-item font-1" href="{{ route('admin.traffics.index') }}"><span
                                        class="fal fa-traffic-light font-1"></span> الترافيك</a></li>
                        @endcan

                        @can('viewAny', \App\Models\ReportError::class)
                            <li><a class="dropdown-item font-1" href="{{ route('admin.traffics.error-reports') }}"><span
                                        class="fal fa-bug font-1"></span> تقارير الأخطاء</a></li>
                        @endcan




                        <li>
                            <hr style="height: 1px;margin: 10px 0px 5px;">
                        </li>
                        <li><a class="dropdown-item font-1" href="#"
                                onclick="document.getElementById('logout-form').submit();"><span
                                    class="fal fa-sign-out-alt font-1"></span> تسجيل خروج</a></li>
                    </ul>

                </div>

                <div class="dropdown" style="width: 55px;height: 55px;background: #2381c6">
                    <span class="d-inline-block fal fa-user"></span>
                </div>

            </div>
        </div>
        <div class="col-12 px-0 py-2" style="margin-top: 60px;">
            @yield('content')
        </div>
    </div>
</div>
