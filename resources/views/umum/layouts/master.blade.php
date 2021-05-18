<!doctype html>
<html lang="en" class="no-focus">
    <head>
        @include('umum.layouts.meta')
        <!-- Fonts and Codebase framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">
        <link rel="stylesheet" id="css-main" href="{{ asset('css/app.css') }}">

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
        </div>
        <script src="{{ asset('js/laravel.app.js') }}"></script>
        <script src="{{ asset('js/laroute.js') }}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @stack('scripts')
    </body>
</html>
