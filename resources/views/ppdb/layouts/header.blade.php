<header id="page-header">
    <!-- Header Content -->
    <div class="content-header height-75 py-0">
        <!-- Left Section -->
        <div class="content-header-section">
            <!-- Logo -->
            <div class="content-header-item height-50">
                <a href="{{ url('/ppdb') }}">
                    <img src="{{ asset('img/logo/ppdb_logo.png') }}" class="img-fluid h-100"/>
                </a>
            </div>
            <!-- END Logo -->
        </div>
        <!-- END Left Section -->

        <!-- Middle Section -->
        
        <!-- END Middle Section -->

        <!-- Right Section -->
        <div class="content-header-section d-flex">
            <ul class="nav-main-header">
                <li>
                    <a href="{{ route('ppdb.biaya') }}"><i class="si si-wallet"></i> BIAYA</a>
                </li>
                @if(Auth::guard('web')->check())
                <li>
                </li>
                <li>
                    @if(!auth()->guard('web')->user()->ppdb()->exists())
                    <a href="{{ route('form') }}">
                        <i class="far fa-file-alt"></i> FORMULIR
                    </a>
                    @else
                    <a href="{{ route('form.detail') }}">
                        <i class="far fa-file-alt"></i> FORMULIR
                    </a>
                    @endif
                </li>
                <li>
                    @if(has_paid())
                    <a href="{{ route('pembayaran.form') }}">
                        <i class="fa fa-check-circle"></i> KONFIRMASI PEMBAYARAN
                    </a>
                    @else
                    <a href="{{ route('pembayaran') }}">
                        <i class="fa fa-money-check-alt"></i> METODE PEMBAYARAN
                    </a>
                    @endif
                </li>
                @endif
            </ul>
            <!-- Auth Section -->
            @if(Auth::guard('web')->check())
                <button type="button" class="btn btn-dual-secondary float-right" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="si si-user mr-1"></i>
                    <span class="d-none d-sm-inline-block">{{ Auth::guard('web')->user()->nama }}</span>
                    <i class="fa fa-angle-down ml-5"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                    <a class="dropdown-item" href="#">
                        <i class="si si-user mr-5"></i> Profil
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="si si-calendar mr-5"></i> Metode
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="si si-logout mr-5"></i> Keluar

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            @else
            <div class="float-right">
                <a href="{{ route('login') }}" class="btn btn-outline-primary mx-1">Login</a>
                <a href="{{ route('daftar') }}" class="btn btn-primary mx-1">Daftar</a>
            </div>
            @endif
            <!-- END Auth Section -->

            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-navicon"></i>
            </button>
            <!-- END Toggle Sidebar -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->
    <div id="page-header-search" class="overlay-header">
        <div class="content-header content-header-fullrow">
            <form action="bd_search.html" method="post">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <!-- Close Search Section -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-secondary px-15" data-toggle="layout" data-action="header_search_off">
                            <i class="fa fa-times"></i>
                        </button>
                        <!-- END Close Search Section -->
                    </div>
                    <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary px-15">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>