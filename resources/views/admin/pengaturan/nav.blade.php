<div class="js-inbox-nav d-none d-md-block">
    <div class="block block-rounded block-shadow block-bordered">
        <div class="block-header block-header-default">
            <h3 class="block-title">Navigasi</h3>
        </div>
        <div class="block-content">
            <ul class="nav nav-pills flex-column push">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between {{ Request::is('admin/pengaturan/umum') ? 'active' : null}}"
                        href="{{ route('admin.pengaturan.umum') }}">
                        <span>Umum</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between {{ Request::is('admin/pengaturan/kontak') ? 'active' : null}}"
                    href="{{ route('admin.pengaturan.kontak') }}">
                        <span>Kontak</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between {{ Request::is('admin/pengaturan/social-media') ? 'active' : null}}"
                    href="{{ route('admin.pengaturan.sosmed') }}">
                        <span>Social Media</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center justify-content-between {{ Request::is('admin/pengaturan/smtp') ? 'active' : null}}"
                     href="{{ route('admin.pengaturan.smtp') }}">
                        <span>SMTP</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
