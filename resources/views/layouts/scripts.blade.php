<script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="/js/tinymce/ar.js"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>

    function getNotification() {
        $.ajax({url:"{{ url('notifications') }}", dataType : 'JSON'})
            .done((response) => {
                
                // if(response.data.length) {
                //     $('.read-all-notifications').removeClass('d-none')
                // }

                response.data.length < 100 ? $('.notification-count').text(response.data.length) : $('.notification-count').text("+99");

                $('.notification-list').html('');
                
                response.data.map(notification => {
                    var link = notification.link;
                    var li = `
                        <div class="col-12">
                            <a style="text-align:right" class="d-block hover-bg-200 p-2 rounded-3  text-decoration-none mb-3 text-right" href="${link}${link.search('\\?') > 0 ? `&notification=${notification.id}` : `?notification=${notification.id}` }" >
                                <p class="mb-0 text-black text-truncate fs--4 mt-1 pt-1 text-right">${notification.user.full_name} <span class="noti-title"> ${notification.action} </p>
                                <p class="noti-time text-black"><span class="notification-time text-right">${notification.created_at}</span></p>
                            </a>
                        </div>
                    `;
                    $('.notification-list').append(li)
                });
        })
    }

    function puchNotificationWeb(title,url)   
    {
    
        if (Notification.permission !== "granted")  
        {  
            Notification.requestPermission();  
        }  
        else  
        {  
            var notification = new Notification(title, {  
                icon:"{{ asset('front/assets/img/logo.png') }}",  
            });  
            
            /* Remove the notification from Notification Center when clicked.*/  
            notification.onclick = function () {  
                window.open(url);
            };  
            
            /* Callback function when the notification is closed. */  
            notification.onclose = function () {  
                //  
            }; 
        }  
    }

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('26df05660b92785b99b9', {
    cluster: 'ap2'
    });

    var order = pusher.subscribe('new-order');
        order.bind('OrderEvent', function(data) {
            alert("Sdfsdf");
            var audio = new Audio("https://soundbible.com/mp3/Store_Door_Chime-Mike_Koenig-570742973.mp3");
            // notify('info','طلب جديد ' , '');
            puchNotificationWeb("طلب جديد", "{{ url('/admin/orders') }}")
        });
</script>
<script>
@if(auth()->check())
    tinymce.init({
        selector: '.editor,#editor',
        plugins: ' advlist image media autolink code codesample directionality table wordcount quickbars link lists numlist bullist',


        images_upload_url:"{{route('admin.upload.image',['_token' => csrf_token() ])}}",
        file_picker_types: 'file image media',
        image_caption: true,
        image_dimensions:true,
        directionality : 'rtl',
        language:'ar',
        quickbars_selection_toolbar: 'bold italic |h1 h2 h3 h4 h5 h6| formatselect | quicklink blockquote | numlist bullist',
        entity_encoding : "raw",
        verify_html : false ,
        object_resizing : 'img',
    });
    function get_website_title(){
        return $('meta[name="title"]').attr('content');
    }
    var notificationDropdown = document.getElementById('notificationDropdown')
    notificationDropdown.addEventListener('show.bs.dropdown', function() {
        $.ajax({
            method: "POST",
            url: "{{route('admin.notifications.see')}}",
            data: { _token: "{{csrf_token()}}" }
        }).done(function(res) {
            $('#dropdown-notifications-icon').fadeOut();
            favicon.badge(0);
        });
    });
    function append_notification_notifications(msg) {
        if (msg.count_unseen_notifications > 0) {
            $('#dropdown-notifications-icon').fadeIn(0);
            $('#dropdown-notifications-icon').text(msg.count_unseen_notifications);
        } else {
            $('#dropdown-notifications-icon').fadeOut(0);
            favicon.badge(0);
        }
        $('.notifications-container').empty();
        $('.notifications-container').append(msg.response);
        $('.notifications-container a').on('click', function() { window.location.href = $(this).attr('href'); });
    } 
    function get_notifications() {
        $.ajax({
            method: "GET",
            url: "{{route('admin.notifications.ajax')}}", 
            success: function(data, textStatus, xhr) {

                favicon.badge(data.notifications.response.count_unseen_notifications);

                if (data.alert) {
                    var audio = new Audio('{{asset("/sounds/notification.wav")}}');
                    audio.play();
                }  
                append_notification_notifications(data.notifications.response); 
                if (data.notifications.response.count_unseen_notifications > 0) {
                    $('title').text('(' + parseInt(data.notifications.response.count_unseen_notifications) + ')' + " " +  
                    get_website_title());

                } else {
                    $('title').text(get_website_title());
                }
            }
        });
    } 
    window.focused = 25000;
    window.onfocus = function() {
        get_notifications(); 
        window.focused = 25000;
    };
    window.onblur = function() {
        window.focused = 60000;
    }; 
    function get_nots() {
        setTimeout(function() { 
            get_notifications();
            get_nots();
        }, window.focused);
    }
    get_nots();
    @if($unreadNotifications!=session('seen_notifications') && $unreadNotifications!=0)
        @php
        session(['seen_notifications'=>$unreadNotifications]);
        @endphp
        var audio = new Audio('{{asset("/sounds/notification.wav")}}');
        audio.play();
    @endif
@else 
/* Guest Js */


@endif
</script>
