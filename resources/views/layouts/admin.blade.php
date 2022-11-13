<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/cust-fonts.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/responsive-font.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('/css/font-fileuploader.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jquery.fileuploader.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/jquery.fileuploader-theme-dragdrop.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/flag-icons.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @php
    $page_title="لوحة التحكم";
    @endphp
    @include('seo.index')
    @livewireStyles
    @yield('styles')
    @if(auth()->check())
        @php
        if(session('seen_notifications')==null)
            session(['seen_notifications'=>0]);
        $notifications=auth()->user()->notifications()->orderBy('created_at','DESC')->limit(50)->get();
        $unreadNotifications=auth()->user()->unreadNotifications()->count();
        @endphp
    @endif
    <style type="text/css">
        *:not([class^="fa"]){
            font-family: 'Noto Kufi Arabic', sans-serif;
        }
        .fa, .fas {
            font-family: "Font Awesome 5 Pro"!important; 
            font-weight: 900;
        }
        ol,ul{
            padding: 5px 20px;
        }
        ol{
            list-style: auto;
        }
        ul{
            list-style: disc;
        }
        .select2-selection__arrow{
            margin-top: 2px;
        }
        .select2-selection{
            width: 100%!important;
            height: 38px!important;
            border-radius: 0px!important;
        }
        .select2{
            width: 100%!important;
        }
        pre{
            direction: ltr;
        }
        .pace-activity{
            width: 54px!important;
            height: 54px!important;
            border-radius: 50%!important;
            top: 1px!important;
            right: 1px!important;
            border-width: 5px!important;

        }
        #toast-container>div {
            padding: 18px 8px 20px 50px;
            width: 18em;
            box-shadow: 0 1px 10px 0 rgb(0 0 0 / 10%), 0 2px 15px 0 rgb(0 0 0 / 5%)!important;
            opacity: 1;
        }

        .phpdebugbar , .phpdebugbar-panel, .phpdebugbar-body {
            direction: ltr !important;
        }
    </style>

    @stack('styles')
</head>

<body style="background: #f7f7f7" class="dash">
    <style type="text/css">
        #toast-container>div {
            opacity: 1;
        }
    </style>
    @yield('after-body')
    {{-- @if(flash()->message)
        <div style="position: absolute;z-index: 4444444444444;left: 35px;top: 80px;max-width: calc(100% - 70px);padding: 16px 22px;border-radius: 7px;overflow: hidden;width: 273px;border-right: 8px solid #374b52;background: #2196f3;color: #fff;cursor: pointer;"  onclick="$(this).slideUp();">
            <span class="fas fa-info-circle"></span> {{ flash()->message }} 
        </div>
    @endif  --}}
    <div class="col-12 justify-content-end d-flex">
        @if($errors->any())
        <div class="col-12" style="position: absolute;top: 80px;left: 10px;">
            {!! implode('', $errors->all('<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;" onclick="$(this).fadeOut();">:message</div>')) !!}
        </div>
        @endif
    </div>

    {{--<div class="modal fade" data-bs-backdrop="static" id="open-image-selector-modal" data-bs-keyboard="false" tabindex="-1"  aria-hidden="true">
        <div class="modal-dialog modal-xl  modal-fullscreen-sm-down ">
            <div class="modal-content overflow-hidden">
            <div class="col-12 px-0 d-flex row">

                <div class="col-10 px-3 py-3">
                    <span class="fal fa-info-circle"></span>    إختر من الملفات
                </div>
                <div class="col-2 px-3 align-items-center d-flex justify-content-end">
                    <span class="far fa-times font-2 cursor-pointer mx-2" data-bs-dismiss="modal"></span>
                </div>

                <div class="col-12 divider" style="min-height: 2px;"></div>

            </div>
            <div class="modal-body p-0">
                <div class="col-12">
                    <livewire:files-viewer />
                </div>
            </div>
            
            </div>
        </div>
        </div>
    --}}
    @include('layouts.sidebar')
    <input type="hidden" id="current_selected_editor">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('/js/jquery.fileuploader.min.js')}}"></script>
    <script src="{{asset('/js/validatorjs.min.js')}}"></script>
    <script src="{{asset('/js/favicon_notification.js')}}"></script>
    <script src="{{asset('/js/main.js')}}"></script>
    <script type="text/javascript">
        $('input[required],select[required],textarea[required]').parent().parent().find('>div:nth-of-type(1)').append('<span style="color:red;font-size:16px">*</span>');
        $("[name='title'],[name='slug'],[name='meta_description']").on('keypress',function(){
            $(this).parent().find('.last_appended_counter').remove();
            $(this).parent().append('<div class="col-12 p-2 last_appended_counter"><span class="d-inline-block" style="font-size:13px">عدد الحروف <span style="font-weight:bolder;color:#007469;font-size:15px">'+$(this).val().length+'</span> حرفاً</span></div>');
        });

        $("[name='title'],[name='slug'],[name='description_ar'],[name='description_en'],[name='meta_description']").append(function(){
            $(this).parent().find('.last_appended_counter').remove();
            $(this).parent().append('<div class="col-12 p-2 last_appended_counter"><span class="d-inline-block" style="font-size:13px">عدد الحروف <span style="font-weight:bolder;color:#007469;font-size:15px">'+$(this).val().length+'</span> حرفاً</span></div>');
        }); 
        $(document).ready(function() {
              $('.select2-select').select2();
          });
    </script>
    @livewireScripts
    @include('layouts.scripts')
    @yield('scripts')
    @stack('scripts')
</body>
</html>