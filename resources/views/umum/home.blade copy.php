@extends('umum.layouts.master')

@section('styles')
@endsection

@section('content')
<div class="page-content">

    <!-- Banner -->
    <section class="home-banner home-slider-first">
        <div id="Bannerslider" class="carousel slide" data-ride="carousel">
            @foreach($slider as $s)
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-banner" src="{{ asset($s->img) }}" alt="..." />
                </div>
            </div>
            @endforeach
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#Bannerslider" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#Bannerslider" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section>
    <!-- Banner End -->

    <!-- Features -->
    {{-- <section class="intro-section bg-lightgrey">
        <div class="container">
            <div class="row no-gutters bg-white box-shadow-01">
                <div class="col-md-3 iconbox-border">
                    <div class="iconbox iconbox-style-3">
                        <div class="iconbox-inner">
                            <div class="iconbox-icon skincolor">
                                <i class="flaticon-icon flaticon-eye"></i>
                            </div>
                            <div class="iconbox-contents">
                                <div class="iconbox-title">
                                    <h2>Eye care</h2>
                                </div>
                                <div class="iconbox-desc">
                                    <p>Enhancing Your Vision sit ametcon sec tetur adipisicing eiusmod tempor
                                        incididunt ut.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 iconbox-border">
                    <div class="iconbox iconbox-style-3">
                        <div class="iconbox-inner">
                            <div class="iconbox-icon skincolor">
                                <i class="flaticon-icon flaticon-testing-glasses"></i>
                            </div>
                            <div class="iconbox-contents">
                                <div class="iconbox-title">
                                    <h2>Childrens</h2>
                                </div>
                                <div class="iconbox-desc">
                                    <p>Caring Your Eyes is important sec tetur adipisicing elit, sed do
                                        important sec tetur adipisicing.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 iconbox-border">
                    <div class="iconbox iconbox-style-3">
                        <div class="iconbox-inner">
                            <div class="iconbox-icon skincolor">
                                <i class="flaticon-icon flaticon-glasses"></i>
                            </div>
                            <div class="iconbox-contents">
                                <div class="iconbox-title">
                                    <h2>Lasik</h2>
                                </div>
                                <div class="iconbox-desc">
                                    <p>Keep calm dolor sit ametcon sec tetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="iconbox iconbox-style-3">
                        <div class="iconbox-inner">
                            <div class="iconbox-icon skincolor">
                                <i class="flaticon-icon flaticon-contact-lens-3"></i>
                            </div>
                            <div class="iconbox-contents">
                                <div class="iconbox-title">
                                    <h2>Free Consult?</h2>
                                </div>
                                <div class="iconbox-desc">
                                    <p>Enhancing Your Vision ametcon sec tetur adipisicing looking sit ametcon
                                        adipisicing.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Features end -->

    <!-- Welcome -->
    <section class="bg-lightgrey welcome-company">
        <div class="container">
            <div class="row align-items-lg-center align-items-md-end">
                <div class="col-md-12 col-lg-12 mt-sm-30 pb-50">
                    <div class="section-title mt-md-50 text-center">
                        <h3 class="skincolor">SELAMAT DATANG DI </h3>
                        <h2><strong>PONDOK PESANTREN MODERN NURUSSALAM</strong></h2>
                    </div>
                    <p><a class="opt-underline-dotted" href="#">Pondok pesantren modern Nurussalam</a> terletak di Kabupaten Karawang dan didirikan tahun 1970 oleh KH. Nurdin (Alm)
                    Pondok Pesantren Modern Nurussalam menerapkan kurikulum Kulliyatul Mu'allimin Al-Islamiyah (KMI) dan kurikulum Kemendikbud 
                    yang dikelola langsung dibawah naungan Yayasan Nurussalam Medangasem yang membawahi SMP Islam dan SMA Islam Nurussalam, 
                    dengan mengintegrasikan kurikulum Kemendikbud dan Pesantren Modern dengan tetap mempertahankan tradisi salafus sholeh.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome end -->

    <!-- About Vision -->
    <section class="section-md">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pr-4">
                    <div class="section-title with-lead">
                        <h3 class="skincolor text-center">VIDEO PROFILE</h3>
                        <h2 class="text-center"><strong>PONDOK PESANTREN MODERN NURUSSALAM</strong></h2>
                        <img src="{{ asset('assets/img/santriwati.jpg') }}" class="img-fluid img-shadow" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Vision end -->

    
    <section class="py-3 section section-md skin-bg-color">
        <div class="container">
            <div class="row d-flex white-color align-items-center">
                <div class="col-lg-8">
                    <h4>Pendaftaran Santri Baru Tahun Pelajaran 2020-2021</h4>
                </div>
                <div class="col-lg-4 mt-md-30 text-lg-right">
                    <a href="#" class="btn btn-dark">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Service -->
    <section class="section-md bg-lightgrey">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h3 class="skincolor text-center">PROGRAM PENDIDIKAN</h3>
                        <h2 class="text-center"><strong>PONDOK PESANTREN MODERN NURUSSALAM</strong></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center pt-3">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body content-center">
                            <div class="thumnail px-3">
                                <img src="{{ asset('img/logo/logo.png') }}" class="img-fluid" alt="">
                            </div>
                            <h3 class="text-center skincolor">SMP ISLAM NURUSSALAM</h3>
                            <div class="mt-3">
                                <p class="text-center">Sekolah Menengah Pertama (SMP)<br>
                                Status Terakreditasi A<br>
                                NSS : 304022101046
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body content-center">
                            <div class="thumnail px-3">
                                <img src="{{ asset('img/logo/logo.png') }}" class="img-fluid" alt="">
                            </div>
                            <h3 class="text-center skincolor">KMI</h3>
                            <p class="font-w-6 mb-0 skincolor text-center">(Kulliyatul Mu'allimin Al-Islamiyah)</p>
                            <div class="service-desc">
                                <p class=" text-center">Kulliyatul Mu'allimin Al-Islamiyah adalah sistem pendidikan pondok pesantren modern
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body content-center">
                            <div class="thumnail px-3">
                                <img src="{{ asset('img/logo/logo.png') }}" class="img-fluid" alt="">
                            </div>
                            <h3 class="text-center skincolor">SMA ISLAM NURUSSALAM</h3>
                            <div class="mt-3">
                                <p class="text-center">Sekolah Menengah Atas <br>(SMA)<br>
                                Status Terakreditasi A<br>
                                NSS : 304022101125
                            </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our Service end -->

    <!-- Post & Testimonial -->
    <section class="section-md bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="our-blog pr-3 mr-4 mr-md-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title">
                                    <h2>Berita Terbaru</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($berita as $b)
                <div class="col-lg-6">
                    <div class="blog-box row blog-style-3 mb-4">
                        <div class="blog-thumbnail col-md-4 ">
                            <img src="{{ $b->featured_img_url }}" class="img-fluid" alt="">
                        </div>
                        <div class="blog-content col-md-8 pl-0">
                            <div class="blog-entry-meta mb-2">
                                <ul class="list-inline">
                                    <li class="blog-category"><a class="url fn n"
                                            href="#">{{ $b->kategori->nama }}</a>
                                    </li>
                                    <li class="blog-date"><i class="optico-icon-clock"></i>
                                        <a href="#">{{ $b->dibuat }}</a>
                                    </li>
                                </ul>
                            </div>
                            <h4 class="blog-box-title title"><a href="{{ route('post.detail', $b->slug) }}">{{ $b->judul }}</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Post & Testimonial end -->
</div>
@stop

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
    integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
    crossorigin="anonymous"></script>
<script>
jQuery(document).ready(function () {
    $('.homeSlide').slick({
        slidesToShow: 1,
        centerMode: true,
        speed: 500,
    });
});

</script>
@endpush
