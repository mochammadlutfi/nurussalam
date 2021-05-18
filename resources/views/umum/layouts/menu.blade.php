<ul class="nav-main">
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
