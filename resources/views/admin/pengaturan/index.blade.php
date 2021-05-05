@extends('admin.layouts.master')

@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Pengaturan
    </div>
    <div class="row">
        <div class="col-3">
            <div class="js-inbox-nav d-none d-md-block">
                <div class="block block-rounded block-shadow">
                    <div class="block-content p-0">
                        <div class="list-group push">
                            <a class="list-group-item list-group-item-action d-flex {{ Request::is('admin/pengaturan/umum') ? 'active' : null }}" href="{{ route('admin.pengaturan.umum') }}">
                               Pengaturan Umum
                            </a>
                            <a class="list-group-item list-group-item-action d-flex {{ Request::is('admin/pengaturan/social-media') ? 'active' : null }}" href="{{ route('admin.pengaturan.sosmed') }}">
                                Pengaturan Sosial Media
                            </a>
                            <a class="list-group-item list-group-item-action d-flex {{ Request::is('admin/pengaturan/kontak') ? 'active' : null }}" href="{{ route('admin.pengaturan.kontak') }}">
                                Pengaturan Kontak
                            </a>
                            <a class="list-group-item list-group-item-action d-flex {{ Request::is('admin/pengaturan/smtp') ? 'active' : null }}" href="{{ route('admin.pengaturan.smtp') }}">
                                Pengaturan Email SMTP
                            </a>
                        </div>
                    </div>
                </div>
                {{-- <div class="block">
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
                </div> --}}
            </div>
        </div>
        <div class="col-lg-9">
            @yield('pengaturan_content')
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('js/admin/pengaturan.js') }}"></script>
@endpush
