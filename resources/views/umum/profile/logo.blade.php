@extends('umum.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}" />
@endsection

@section('content')

<!-- Inner Banner -->
<div class="bg-primary">
    <div class="content text-center">
        <div class="pt-50 pb-20">
            <h1 class="font-w700 mb-10 text-white">MAKNA LOGO</h1>
            <h2 class="h4 font-w400 text-white">PONPES MODERN NURUSSALAM</h2>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- Content -->
<div class="bg-white">
    <div class="content content-full">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <img src="{{ asset('img/logo/logo.png') }}" class="img-fluid w-50">
            </div>
            <div class="col-lg-6">
                <h2 class="font-w500 h5">ARTI LAMBANG</h2>
                <ul class="fa-ul">
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Bulan Sabit : Kemenangan Islam, Keindahan, Pencerahan, Nuansa Baru
                    </li>
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Bola Dunia : Pengetahuan luas, Pluraritas dan cita-cita yang tinggi
                    </li>
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Pena : Pendidikan dan Pengajaran
                    </li>
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Kitab : Ilmu Pengetahuan, Sumber Ilmu dan Pedoman
                    </li>
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Tulisan Al Quran Hadits : Pedoman Hidup, Sumber Ilmu dan Hukum
                    </li>
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Nama Nurussalam dengan khot khoufi : Identitas diri yang tegas tapi tidak kaku
                    </li>
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        5 Cahaya dari Kitab : Rukun Islam, Pancasila, Panca Jiwa
                    </li>
                </ul>
            </div>
        </div>
        <div class="row justify-content-center my-lg-3">
            <div class="col-lg-4">
                <img src="{{ asset('img/warna.png') }}" class="img-fluid w-50">
            </div>
            <div class="col-lg-6">
                <h2 class="font-w500 h5">ARTI WARNA</h2>
                <ul class="fa-ul">
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Merah: Kekuatan, Kehangatan, Energi dan Keberanian
                    </li>
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Hijau: kedamaian, Ketabahan,Kesuburan
                    </li>
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Putih: Kesucian, Netralitas, Independensi, keadilan dan ketertiban
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/plugins/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/umum/ppdb/konfirmasi.js') }}"></script>

<script>
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
@endpush
