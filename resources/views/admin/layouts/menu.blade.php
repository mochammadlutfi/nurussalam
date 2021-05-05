<ul class="nav-main">
    <li>
        <a class="{{ Request::is('admin/beranda') ? 'active' : null }}" href="{{ route('admin.beranda') }}">
            <i class="si si-cup"></i>
            <span class="sidebar-mini-hide">Beranda</span>
        </a>
    </li>
    <li class="{{ Request::is('admin/berita/*', 'admin/berita') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-flag"></i>
            <span class="sidebar-mini-hide">Berita</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/berita/tambah') ? 'active' : null}}"
                    href="{{ route('admin.post.tambah') }}">Tambah Berita Baru</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/berita') ? 'active' : null}}"
                    href="{{ route('admin.post') }}">Kelola Berita</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/berita/kategori') ? 'active' : null}}"
                    href="{{ route('admin.postKategori') }}">Kategori</a>
            </li>
        </ul>
    </li>
    <li class="{{ Request::is('admin/galeri', 'admin/galeri/*', 'admin/video', 'admin/video/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-film"></i>
            <span class="sidebar-mini-hide">Galeri</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/galeri', 'admin/galeri/*') ? 'active' : null }}" href="{{ route('admin.galeri') }}">Album</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/video', 'admin/video/*') ? 'active' : null}}"
                    href="{{ route('admin.video') }}">Video</a>
            </li>
        </ul>
    </li>
    
    <li class="{{ Request::is('admin/ppdb', 'admin/ppdb/*') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-film"></i>
            <span class="sidebar-mini-hide">PPDB</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/peserta', 'admin/peserta/*') ? 'active' : null }}" href="{{ route('admin.peserta') }}">Peserta</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/ppdb/bayar', 'admin/ppdb/bayar/*') ? 'active' : null}}" href="{{ route('admin.ppdb.bayar') }}">Pembayaran</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/ppdb/wali', 'admin/ppdb/wali/*') ? 'active' : null}}" href="{{ route('admin.ppdb.wali') }}">Ustadz Wali</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/ppdb/rekening', 'admin/ppdb/rekening/*') ? 'active' : null}}" href="{{ route('admin.ppdb.rekening') }}">Rekening</a>
            </li>
        </ul>
    </li>
    <li>
        <a class="{{ Request::is('admin/slider') ? 'active' : null }}" href="{{ route('admin.slider') }}">
            <i class="si si-picture"></i>
            <span class="sidebar-mini-hide">Slider</span>
        </a>
    </li>

    <li class="{{ Request::is('admin/pengelola/*', 'admin/pengelola') ? 'open' : null }}">
        <a class="nav-submenu" data-toggle="nav-submenu" href="#">
            <i class="si si-user"></i>
            <span class="sidebar-mini-hide">Admin</span></a>
        <ul>
            <li>
                <a class="{{ Request::is('admin/pengelola/tambah') ? 'active' : null}}"
                    href="{{ route('admin.pengelola.tambah') }}">Tambah Admin Baru</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/berita') ? 'active' : null}}"
                    href="{{ route('admin.pengelola') }}">Kelola Admin</a>
            </li>
            <li>
                <a class="{{ Request::is('admin/pengelola/jabatan') ? 'active' : null}}"
                    href="{{ route('admin.adminRole') }}">Role</a>
            </li>
        </ul>
    </li>
    
    <li>
        <a class="{{ Request::is('admin/pengaturan/*', 'admin/pengaturan') ? 'open' : null }}" href="{{ route('admin.pengaturan.umum') }}">
            <i class="fa fa-cogs"></i><span class="sidebar-mini-hide">Pengaturan</span>
        </a>
    </li>
</ul>
