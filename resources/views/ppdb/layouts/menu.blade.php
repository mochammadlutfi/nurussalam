
<div class="block block-rounded block-shadow">
    <div class="block-content p-0">
        <div class="list-group push">
            <a class="list-group-item list-group-item-action d-flex {{ Request::is('user/profil') ? 'active' : null }}" href="{{ route('user.profil') }}">
                <i class="si si-user mr-3"></i>
                Profil
            </a>
            <a class="list-group-item list-group-item-action d-flex {{ Request::is('user/kunjungan/pengajuan') ? 'active' : null }}" href="{{ route('form') }}">
                <i class="fa fa-calendar-plus mr-3"></i>
                Pendaftaran Saya
            </a>
            <a class="list-group-item list-group-item-action d-flex {{ Request::is('user/kunjungan') ? 'active' : null }}" href="#">
                <i class="fa fa-calendar-alt mr-3"></i>
                Konfirmasi Pembayaran
            </a>
            <a class="list-group-item list-group-item-action d-flex" href="javascript:void(0)">
                <i class="si si-logout mr-3"></i>
                Keluar
            </a>
        </div>
    </div>
</div>