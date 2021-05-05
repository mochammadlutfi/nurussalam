@extends('ppdb.layouts.master')

@section('content')

<div class="content">
    <div class="row mt-50 justify-content-center">
        <div class="col-lg-6">
            <div class="block block-rounded block-shadow">
                <div class="block-content block-content-full">
                    <div class="sa m-auto">
                        <div class="sa-warning">
                            <div class="sa-warning-body"></div>
                            <div class="sa-warning-dot"></div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2 class="h3">
                            Verifikasi Email Kamu
                        </h2>
                        <p>
                           <b>Hai {{ auth()->guard('web')->user()->nama }}!</b><br>
                           Sebelum melanjutkan, periksa email kamu untuk link verifikasi email. Apabila kamu belum menerima link verifikasi email, silahkan klik tombol "Kirim Ulang Link Verifikasi Email".
                        </p>
                        <a href="{{ route($resendRoute) }}" class="btn btn-block btn-primary">Kirim Ulang Link Verifikasi Email</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
