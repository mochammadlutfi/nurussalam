<!doctype html>
<html lang="en" class="no-focus">
    <head>
        @include('umum.layouts.meta')
        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins/whatsapp/whatsapp-chat-support.css') }}">

        @yield('styles')
    </head>
    <body>

        <div id="page-container" class="side-scroll page-header-fixed main-content-boxed">
            <!-- Header -->
            @include('umum.layouts.sidebar')
            <!-- END Header -->

            <!-- Header -->
            @include('umum.layouts.header')
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                @yield('content')
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
            
            @include('umum.layouts.footer')
            <div class="whatsapp_chat_support wcs_fixed_right" id="example">
                <div class="wcs_button_label">
                    Punya Pertanyaan? Mari berbincang
                </div>  
                <div class="wcs_button wcs_button_circle">
                    <span class="fab fa-whatsapp"></span>
                </div>  
             
                <div class="wcs_popup">
                    <div class="wcs_popup_close">
                        <span class="fa fa-close"></span>
                    </div>
                    <div class="wcs_popup_header">
                        <strong>Punya pertanyaan? Hubungi kami sekarang</strong>
                        <br>
                        <div class="wcs_popup_header_description">Klik salah satu perwakilan kami di bawah ini</div>
                    </div>  
                    <div class="wcs_popup_person_container">
                        <div 
                            class="wcs_popup_person" 
                            data-number="6289656466525">
                            <div class="wcs_popup_person_img"><img src="http://www.castlecodeweb.com/whatsapp-chat-support/example/img/person_5.jpg" alt=""></div>
                            <div class="wcs_popup_person_content">
                                <div class="wcs_popup_person_name">Mia Smith</div>
                                <div class="wcs_popup_person_description">Sales Support</div>
                                <div class="wcs_popup_person_status">I'm Online</div>
                            </div>  
                        </div>
             
                        <div 
                            class="wcs_popup_person" 
                            data-number="6287888156923">
                            <div class="wcs_popup_person_img"><img src="http://www.castlecodeweb.com/whatsapp-chat-support/example/img/person_6.jpg" alt=""></div>
                            <div class="wcs_popup_person_content">
                                <div class="wcs_popup_person_name">James Brown</div>
                                <div class="wcs_popup_person_description">Customer Support</div>
                                <div class="wcs_popup_person_status">I'm Online</div>
                            </div>
                        </div>
             
                        <div 
                            class="wcs_popup_person" 
                            data-number="528123861273"
                            data-availability='{ "monday":"08:30-18:30", "tuesday":"08:30-18:30", "wednesday":"08:30-18:30", "thursday":"08:30-18:30", "friday":"08:30-18:30" }'
                        >
                            <div class="wcs_popup_person_img"><img src="http://www.castlecodeweb.com/whatsapp-chat-support/example/img/person_7.jpg" alt=""></div>
                            <div class="wcs_popup_person_content">
                                <div class="wcs_popup_person_name">Robert Miller</div>
                                <div class="wcs_popup_person_description">Techincal Support</div>
                                <div class="wcs_popup_person_status">I'm Online</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/laravel.app.js') }}"></script>
        <script src="{{ asset('js/laroute.js') }}"></script>
        <script src="{{ asset('js/plugins/whatsapp/moment.min.js') }}"></script>
        <script src="{{ asset('js/plugins/whatsapp/moment-timezone-with-data.min.js') }}"></script>
        <script src="{{ asset('js/plugins/whatsapp/whatsapp-chat-support.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#example').whatsappChatSupport({
                timezone                    :   'Asia/Jakarta', // When using the date and time from the user browser you can transform it to your current timezone (in case your user is in a different timezone)
                notAvailableMsg             :   'Saya sedang offline saat ini!', // message when its not an available day or once the available hours have passed
                almostAvailableMsg          :   'Saya akan segera online', // if today is an available day and before the time starts
                dialogNotAvailableMsg       :   'Saya sedang offline saat ini!', // message when its not an available day or once the available hours have passed
                dialogAlmostAvailableMsg    :   'Saya akan segera online', // if today is an available day and before the time starts
                defaultMsg                  :   'Hi, Saya punya pertanyaan pada halaman ini!',
            });
        </script>
        @stack('scripts')
    </body>
</html>
