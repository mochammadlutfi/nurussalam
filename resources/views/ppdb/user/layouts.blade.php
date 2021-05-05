@extends('ppdb.layouts.master')

@section('styles')
    <link rel="stylesheet" id="css-main" href="{{ asset('js/plugins/bootstrap-fileinput/css/fileinput.min.css') }}">
    <link rel="stylesheet" id="css-main" href="{{ asset('js/plugins/bootstrap-fileinput/css/input_file.css') }}">
@endsection

@section('content')

<!-- Inner Banner -->
@yield('userHeader')
<!-- banner end -->

<div class="bg-white">
    <div class="content content-full">
        <div class="row justify-content-center">
            <div class="col-lg-3 d-lg-block d-none">
                <div class="block block-rounded block-shadow">
                    <div class="block-content p-0">
                        <div class="list-group push">
                            <a class="list-group-item list-group-item-action {{ Request::is('user/profil') ? 'active' : null }}" href="{{ route('user.profil') }}">
                                <i class="fa fa-user mr-3"></i>
                                Profil
                            </a>
                            @if(!auth()->guard('web')->user()->ppdb()->exists())
                            <a class="list-group-item list-group-item-action {{ Request::is('ppdb/formulir') ? 'active' : null }}" href="{{ route('form') }}">
                                <i class="far fa-file-alt mr-3"></i>
                                Formulir Pendaftaran
                            </a>
                            @else 
                            <a class="list-group-item list-group-item-action {{ Request::is('ppdb/detail') ? 'active' : null }}" href="{{ route('form.detail') }}">
                                <i class="far fa-file-alt mr-3"></i>
                                Detail Pendaftaran
                            </a>
                            @endif
                            @if(has_paid())
                            <a class="list-group-item list-group-item-action {{ Request::is('ppdb/konfirmasi-pembayaran') ? 'active' : null }}" href="{{ route('pembayaran.form') }}">
                                <i class="fa fa-check-circle mr-3"></i>
                                Konfirmasi Pembayaran
                            </a>
                            @endif
                            <a class="list-group-item list-group-item-action {{ Request::is('ppdb/pembayaran') ? 'active' : null }}" href="{{ route('pembayaran') }}">
                                <i class="fa fa-money-check-alt mr-3"></i>
                                Metode Pembayaran
                            </a>
                            <a class="list-group-item list-group-item-action {{ Request::is('user/kunjungan/riwayat') ? 'active' : null }}" href="{{ route('user.changePassword') }}">
                                <i class="fa fa-user-lock mr-3"></i>
                                Ubah Password
                            </a>
                            <a class="list-group-item list-group-item-action d-flex" href="javascript:void(0)">
                                <i class="si si-logout mr-3"></i>
                                Keluar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                @yield('user_content')
            </div>
        </div>
    </div>
</div>
@endsection
