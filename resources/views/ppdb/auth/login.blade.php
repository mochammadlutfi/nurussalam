@extends('ppdb.layouts.master')

@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="block block-rounded block-shadow">
                <div class="block-content">
                    <div class="text-center">
                        <h2 class="h5 font-w700 mb-0">
                            Silakan masuk ke dalam akun kamu.
                        </h2>
                        <p class="nice-copy my-0">Belum punya akun? <a href="{{ route('daftar') }}">Daftar</a> Disini</p>
                    </div>
                    <form method="POST" id="loginForm" onsubmit="return false">
                        @csrf
                        <div class="form-group row mb-2">
                            <div class="col-12">
                                <label for="login-email">Email</label>
                                <input type="text" class="form-control" id="login-email" name="email" placeholder="Masukan Alamat Email">
                                <div class="invalid-feedback font-size-sm" id="error-email"></div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <div class="col-12">
                                <label for="login-password">Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Masukan Password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <a href="javaScript:void(0);"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                        </span>
                                    </div>
                                    <div class="invalid-feedback font-size-sm" id="error-password"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <div class="col-sm-6 d-sm-flex align-items-center">
                                <div class="custom-control custom-checkbox mr-auto ml-0 mb-0">
                                    <input type="checkbox" class="custom-control-input" id="login-remember-me" name="remember">
                                    <label class="custom-control-label" for="login-remember-me">Ingat Saya</label>
                                </div>
                            </div>
                            <div class="col-sm-6 text-sm-right">
                                <a class="font-weight-bold" href="#">
                                    Lupa Password?
                                </a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-sm-right">
                                <button type="submit" class="btn btn-primary btn-block" disabled>
                                    <i class="si si-login mr-10"></i> Masuk
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 text-sm-left">
                                <span>Belum punya akun?</span><br>
                                <a class="font-weight-bold" href="{{ route('daftar') }} 
                                
                                </a>
                            </div>
                            <div class="col-sm-6 text-sm-right">
                                <span>Akun belum aktif?</span><br>
                                <a class="font-weight-bold" href="">
                                    Kirim ulang email aktivasi
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/ppdb/auth/login.js') }}"></script>

@endpush


