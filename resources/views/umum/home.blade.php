@extends('umum.layouts.master')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
    integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
    crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
    integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
    crossorigin="anonymous" />
<style>
    .homeSlide {
        width: 100%;
        text-align: center;
        color: white;
    }
    .homeSlide .slide .slick-center a img {
        width: 100%;
    }
</style>
@endsection

@section('content')
<section class="home-banner home-slider-first">
    <div class="homeSlide">
        @foreach($slider as $d)
        <div class="slide">
            <a href="#">
                <img class="w-100" src="{{ asset($d->img) }}" width="728px"/>
            </a>
        </div>
        @endforeach
    </div>
</section>

<!-- Welcome -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="font-w700 mb-10 text-primary">
                    SELAMAT DATANG DI
                </h2>
                <h3 class="h4 font-w700 text-mutedmb-4">
                    PONDOK PESANTREN MODERN NURUSSALAM
                </h3>
                <p class="font-size-20"><a href="{{ url('/') }}">Pondok pesantren modern Nurussalam</a> terletak di Kabupaten Karawang dan didirikan tahun 1970 oleh KH. Nurdin (Alm)
                    Pondok Pesantren Modern Nurussalam menerapkan kurikulum Kulliyatul Mu'allimin Al-Islamiyah (KMI) dan kurikulum Kemendikbud 
                    yang dikelola langsung dibawah naungan Yayasan Nurussalam Medangasem yang membawahi SMP Islam dan SMA Islam Nurussalam, 
                    dengan mengintegrasikan kurikulum Kemendikbud dan Pesantren Modern dengan tetap mempertahankan tradisi salafus sholeh.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Welcome end -->

<div class="bg-white">
    <div class="content content-full">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h2 class="font-w700 h4 mb-10">
                    Video Profile Pondok Pesantren Modern Nurussalam
                </h2>
                <video poster="{{ asset('video/poster.jpg') }}" class="video-js vjs-default-skin w-75" controls width=100% data-setup='{ 
                        "fluid": true, 
                    }'>
                    <source src="{{ asset('video/intro.mp4') }}" type="video/mp4">
                </video>
            </div>
        </div>
    </div>
</div>

<div class="bg-primary">
    <div class="content content-full">
        <div class="row justify-content-space-between">
            <div class="col-lg-9">
                <h2 class="h3 font-w700 mb-10 text-white mb-0">
                    Pendaftaran Santri Baru Tahun Pelajaran 2020-2021
                </h2>
            </div>
            <div class="col-lg-3">
                <a href="{{ route('ppdb') }}" class="btn btn-secondary btn-lg">DAFTAR SEKARANG</a>
            </div>
        </div>
    </div>
</div>

<div class="bg-body-light">
    <div class="content content-full">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <h3 class="font-w700 h4 mb-0 text-primary">
                    PROGRAM PENDIDIKAN
                </h3>
                <h2 class="font-w700 h3 mb-10">
                    PONDOK PESANTREN MODERN NURUSSALAM
                </h2>
            </div>
        </div>
        <div class="row justify-content-center pt-3">
            <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch">
                <a class="block block-link-pop block-bordered block-shadow block-rounded-2 c-pointer" href="{{ route('pendidikan.smp') }}">
                    <div class="block-content text-center">
                        <div class="thumnail mb-3">
                            <img src="{{ asset('img/logo/logo.png') }}" class="img-fluid w-75" alt="">
                        </div>
                        <h3 class="h5 mb-1 text-primary">SMP ISLAM NURUSSALAM</h3>
                        <div class="mt-3">
                            <p class="text-center">Sekolah Menengah Pertama (SMP)<br>
                            Status Terakreditasi A<br>
                            NSS : 304022101046
                        </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch">
                <a class="block block-link-pop block-bordered block-shadow block-rounded-2 c-pointer" href="{{ route('pendidikan.kmi') }}">
                    <div class="block-content text-center">
                        <div class="thumnail mb-3">
                            <img src="{{ asset('img/logo/logo.png') }}" class="img-fluid w-75" alt="">
                        </div>
                        <h3 class="h5 mb-1 text-primary">KMI (Kulliyatul Mu'allimin Al-Islamiyah)</h3>
                        <div class="service-desc">
                            <p class=" text-center">Kulliyatul Mu'allimin Al-Islamiyah adalah sistem pendidikan pondok pesantren modern
                        </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 d-flex align-items-stretch">
                <a class="block block-link-pop block-bordered block-shadow block-rounded-2 c-pointer" href="{{ route('pendidikan.sma') }}">
                    <div class="block-content text-center">
                        <div class="thumnail mb-3">
                            <img src="{{ asset('img/logo/logo.png') }}" class="img-fluid w-75" alt="">
                        </div>
                        <h3 class="h5 mb-1 text-primary">SMA ISLAM NURUSSALAM</h3>
                        <div class="mt-3">
                            <p class="text-center">Sekolah Menengah Atas (SMA)<br>
                            Status Terakreditasi A<br>
                            NSS : 304022101125
                        </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@stop
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous"></script>
<script>
jQuery(document).ready(function () {
    $('.homeSlide').slick({
        autoplay: true,
        fade: true,
        arrows: true
    });
});

</script>
@endpush
