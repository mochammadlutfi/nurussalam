<div class="bg-body-light">
    <div class="content-header h-100 py-0">
        <div class="content-header-section w-100">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <ul class="nav-main-header">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="si si-calendar"></i> Tentang
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('posts') }}">
                                <i class="fa fa-newspaper"></i> Berita
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('dewan') }}">
                                <i class="si si-calendar"></i> Daftar Anggota
                            </a>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                                <i class="si si-people"></i>Alat Kelengkapan</a>
                            <ul style="width: 250px;">
                                <li>
                                    <a href="{{ route('akd.detail', 'pimpinan') }}">Pimpinan</a>
                                </li>
                                <li>
                                    <a href="{{ route('akd.detail', 'badan-musyawarah') }}">Badan Musyawarah</a>
                                </li>
                                <li>
                                    <a href="{{ route('akd.detail', 'badan-anggaran') }}">Badan Anggaran</a>
                                </li>
                                <li>
                                    <a href="{{ route('akd.detail', 'badan-kehormatan') }}">Badan Kehormatan</a>
                                </li>
                                <li>
                                    <a href="{{ route('akd.detail', 'badan-pembentukan-perda') }}">Badan Pembentukan Perda</a>
                                </li>
                                <li>
                                    <a href="{{ route('akd.detail', 'komisi') }}">Komisi</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">
                                <i class="si si-people"></i>Fraksi</a>
                            <ul style="width: 250px;">
                                @foreach($fraksi as $f)
                                <li>
                                    <a href="{{ route('fraksi.detail', $f->slug) }}">{{ $f->nama}}</a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-camera"></i>Galeri</a>
                            <ul>
                                <li>
                                    <a href="{{ route('galeri.foto') }}">Foto</a>
                                </li>
                                <li>
                                    <a href="{{ route('galeri.video') }}">Video</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('perda') }}">
                                <i class="fa fa-gavel"></i> JDIH
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>