@extends('ppdb.layouts.master')

@section('content')
<div class="content" id="appContent">
    <div class="block block-shadow block-rounded block-bordered block-rounded-2">
        <div class="block-content py-0 pl-0">
            <div class="row">
                <div class="col-lg-7">
                    <div class="bg-image h-100" style="background-image: url('{{ asset('img/register.jpg') }}');border-top-left-radius: 10px;
                    border-bottom-left-radius: 10px;">
                        <div class="bg-white-op-25 h-100">
                            <div class="align-items-center content d-flex h-100 justify-content-center text-center">
                                <div>
                                    
                                <h1 class="font-w700 text-white mb-10">SELAMAT DATANG</h1>
                                <h2 class="h4 font-w400 text-white">PPDB PONPDOK PESANTREN MODERN<br>NURUSSALAM</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 pt-10">
                    <form id="form-daftar" onsubmit="return false">
                        @csrf
                        <div class="form-group">
                            <h2 class="h5 font-w400">
                                Buat Akun PPDB. <br>
                                Sudah punya akun? <a href="{{ route('login') }}">Login</a> Disini
                            </h2>
                        </div>
                        <div class="form-group">
                            <label for="daftar-nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="daftar-nama" name="nama" placeholder="Masukan Nama Lengkap">
                            <div class="invalid-feedback font-size-sm" id="error-nama"></div>
                        </div>
                        <div class="form-group">
                            <label for="daftar-email">Alamat Email</label>
                            <input type="text" class="form-control" id="daftar-email" name="email" placeholder="Masukan Alamat Email">
                            <div class="invalid-feedback font-size-sm" id="error-email"></div>
                        </div>
                        <div class="form-group">
                            <label for="daftar-password">Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-control" id="daftar-password" name="password" placeholder="Masukan Password" autocomplete>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <a href="javaScript:void(0);"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </span>
                                </div>
                                <div class="invalid-feedback font-size-sm" id="error-password"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="daftar-password_confirmation">Konfirmasi Password</label>
                            <div class="input-group" id="show_hide_password2">
                                <input type="password" class="form-control" id="daftar-password_confirmation" name="password_confirmation" placeholder="Masukan Password" autocomplete>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <a href="javaScript:void(0);"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </span>
                                </div>
                                <div class="invalid-feedback font-size-sm" id="error-password_confirmation"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" disabled>
                                <i class="si si-login mr-10"></i> Daftar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/ppdb/auth/daftar.js') }}"></script>

@endpush
