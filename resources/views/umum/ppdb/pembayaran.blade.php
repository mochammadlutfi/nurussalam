@extends('umum.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')

<div class="page-content">

    <!-- Inner Banner -->
    <section class="inner-banner">
        <div class="titlebar-main">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 text-center">
                        <h1 class="inner-page-title">PPDB PM NURUSSALAM</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner end -->

    <!-- Content -->
    <section class="bg-lightgrey welcome-company">
        <div class="container">
            <div class="row align-items-lg-center align-items-md-end">
                <div class="col-md-12 col-lg-12 mt-sm-30">
                    <div class="section-title mt-md-50 text-center">
                        <h3 class="font-weight-normal">Pendaftaran Santri Baru Pondok Pesantren Modern Nurussalam</h3>
                        <h2>Tahun Ajaran 2020-2021</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-md bg-white">
        <div class="container bg-lightgrey p-4">
            <h3 class="font-size-20 font-weight-bold font-weight-normal text-center">Pendaftaran Berhasil</h3>
            <div class="row justify-content-center">
                <div class="col-lg-4 text-center">
                    <div class="font-weight-bold">No Pendaftaran Anda</div>
                    <h3 class="font-weight-normal text-center">110003264</h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <p class="mb-1">
                        Untuk Melanjutkan Proses Pendaftaran Silahkan Melakukan Pembayaran Sebesar:
                    </p>
                    @if($ppdb->gender === 'L')
                    
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2" class="text-center bg-primary text-white">BIAYA PENDAFTARAN PUTRA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">BIAYA AWAL</td>
                                <td>Rp 5.400.000</td>
                            </tr>
                            <tr>
                                <td class="text-left">BIAYA PERLENGKAPAN PUTRA</td>
                                <td>Rp 2.150.000</td>
                            </tr>
                            <tr>
                                <td class="text-left"><b>TOTAL</b></td>
                                <td><b>RP 7500.000</b></td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="javascript:void(0)" class="btn btn-primary btn-sm">Lihat Rincian Pembayaran</a>
                    @else
                        <div class="font-size-30 my-3">Rp 7.630.000</div>
                    @endif
                    <p class="my-2">Tujuan Pembayaran Ke No Rekening Berikut</p>
                    <div class="row justify-content-center py-3">
                        @foreach($rekening as $r)
                        <div class="col-5">
                            <div class="card">
                                <div class="card-body p-2">
                                    <img src="{{ $r->icon_url }}" class="img-fluid">
                                    <div class="font-weight-bold py-1">
                                        {{ $r->bank }}
                                    </div>
                                    <div class="">
                                        <b>No Rek : </b> {{$r->no_rek}}
                                    </div>
                                    <div class="">
                                        {{ $r->nama }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm">Konfirmasi Pembayaran</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Content end -->
</div>
@stop

@push('scripts')
<script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/umum/ppdb/pendaftaran.js') }}"></script>

<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endpush
