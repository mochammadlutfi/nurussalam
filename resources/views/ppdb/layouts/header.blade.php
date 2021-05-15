<header id="page-header">
    <!-- Header Content -->
    <div class="content-header height-100  py-0">
        <div class="content-header-section w-100">
            <div class="row no-gutters">
                <div class="col col-lg-3 d-flex">
                    <div class="content-header-item">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('img/logo/ppdb_logo.png') }}" class="img-fluid"/>
                        </a>
                    </div>
                </div>
                <div class="col col-lg-9 d-lg-block d-none py-20">
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
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                        <a href="{{ route('daftar') }}" class="btn btn-primary">Daftar</a>
                    </div>
                    @endif
                    <ul class="nav-main-header float-right">
                        @if(Auth::guard('web')->check())
                        <li>
                            <a href="{{ route('ppdb.biaya') }}">
                                <i class="si si-wallet"></i> BIAYA
                            </a>
                        </li>
                        @if(!auth()->guard('web')->user()->ppdb()->exists())
                        <li>
                            <a href="{{ route('form') }}">
                                <i class="far fa-file-alt"></i> FORMULIR
                            </a>
                        </li>
                        @else
                        <li>
                            <a href="{{ route('form.detail') }}">
                                <i class="far fa-file-alt"></i> FORMULIR
                            </a>
                        </li>
                        @endif
                            @if(has_paid())
                                <li>
                                    <a href="{{ route('pembayaran.form') }}">
                                        <i class="fa fa-check-circle"></i> KONFIRMASI PEMBAYARAN
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('pembayaran') }}">
                                        <i class="fa fa-money-check-alt"></i> METODE PEMBAYARAN
                                    </a>
                                </li>
                            @endif
                        @endif
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- END Header Content -->

    <!-- Header Loader -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
