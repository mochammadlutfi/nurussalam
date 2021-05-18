<header id="page-header">
    <!-- Header Content -->
    <div class="content-header py-0" style="align-items: unset;">
        <div class="content-header-section w-100">
            <div class="row no-gutters justify-content-space-between h-100">
                <div class="col col-lg-3 d-flex">
                    <div class="content-header-item min-height-50 my-auto">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset(settings()->get('app_logo')) }}" class="img-fluid h-100" />
                        </a>
                    </div>
                </div>
                <div class="col d-lg-block d-none">
                    <ul class="float-right h-100 nav-main-header">
                        <li class="{{ Request::is('profile', 'profile/*') ? 'open' : null }}">
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">PROFILE</a>
                            <ul>
                                <li>
                                    <a href="{{ route('profile.sejarah') }}">SEJARAH</a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.visimisi') }}">VISI & MISI</a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.logo') }}">MAKNA LOGO</a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.kegiatan') }}">KEGIATAN SANTRI</a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.fasilitas') }}">FASILITAS PONDOK</a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.kepengurusan') }}">STRUKTUR KEPENGURUSAN</a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ Request::is('pendidikan', 'pendidikan/*') ? 'open' : null }}">
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">PENDIDIKAN</a>
                            <ul>
                                <li>
                                    <a href="{{ route('pendidikan.smp') }}">SMP ISLAM NURUSSALAM</a>
                                </li>
                                <li>
                                    <a href="{{ route('pendidikan.sma') }}">SMA ISLAM NURUSSALAM</a>
                                </li>
                                <li>
                                    <a href="{{ route('pendidikan.kmi') }}">KMI</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('posts') }}">BERITA</a>
                        </li>
                        <li class="{{ Request::is('gallery', 'gallery/*') ? 'open' : null }}">
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">GALLERY</a>
                            <ul>
                                <li>
                                    <a href="{{ route('galeri.foto') }}">PHOTO</a>
                                </li>
                                <li>
                                    <a href="{{ route('galeri.video') }}">VIDEO</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">KONTAK</a>
                        </li>
                        <li>
                            <a href="{{ route('ppdb') }}">PPDB</a>
                        </li>
                    </ul>
                </div>
                
                <div class="content-header-section my-auto">
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->
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
