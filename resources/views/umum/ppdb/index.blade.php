@extends('umum.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection

@section('content')
<!-- Inner Banner -->
<div class="bg-primary">
    <div class="content text-center">
        <div class="pt-50 pb-20">
            <h1 class="font-w700 mb-10 text-white">PPDB PM NURUSSALAM</h1>
            <h2 class="h4 font-w400 text-white">Pendaftaran Santri Baru Pondok Pesantren Modern Nurussalam<br>Tahun Ajaran 2020-2021</h2>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- Content -->
<div class="bg-white">
    <div class="content content-full">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="font-w500 h3 text-center">Alur Pendaftaran PPDB</h2>
                <h3 class="font-w400 h5">
                    PERSYARATAN DAN INFORMASI TENTANG PPDB ONLINE
                </h3>
                <p class="my-2">Persyaratan Pendaftaran Online:</p>
                <ul class="list-content pl-4">
                    <li>Hasil Rapid Test (Non-Reaktif)(Asli)</li>
                    <li>Foto Hitam Putih Ukuran 2x3 dan 3x4 (5 Lembar)</li>
                    <li>Scan Ijazah dan SKHUN</li>
                    <li>Akta Kelahiran, Kartu Keluarga & KTP Orang Tua Wali</li>
                    <li>KIP (Kartu Indonesia Pintar) & Keterangan NISN</li>
                    <li>Surat Keterangan Berkalakuan Baik</li>
                    <li>Membawa Perlengkapan Santri</li>
                </ul>
                <p class="my-2">Persyaratan Ketika Berangkat Ke Pondok Pesantren Modern Nurussalam:</p>
                <ul class="list-content pl-4" style="list-style: inherit;">
                    <li>Bersedia Diasramakan dan Mengikuti Ujian Penempatan Kelas</li>
                    <li>Membayar Biaya Administrasi sebagai Berikut:</li>
                </ul>
                <h3 class="font-w400 h5 my-3">
                    BIAYA MASUK SANTRI BARU TAHUN 2021/2022
                </h3>
                <a href="#" class="btn btn-outline-primary">Biaya Masuk Santri Baru 2021/2022</a>
                <h3 class="font-w400 h5 my-3">
                    PAKAIAN RESMI PONPES MODERN NURUSSALAM
                </h3>
                <a href="#" class="btn btn-outline-primary">Pakaian Resmi Santriwan & Santriwati</a>
                <h3 class="font-w400 h5 my-3">
                    FORMULIR PENDAFTARAN SANTRI BARU TAHUN 2021 / 2022
                </h3>
                <a href="{{ route('ppdb.daftar') }}" class="btn btn-outline-primary">Formulir Pendaftaran</a>
                <a href="{{ route('ppdb.cek') }}" class="btn btn-outline-primary">Cek Status Pembayaran</a>
            </div>
        </div>
    </div>
</div>
<!-- Content end -->
@stop

@push('scripts')
@endpush
