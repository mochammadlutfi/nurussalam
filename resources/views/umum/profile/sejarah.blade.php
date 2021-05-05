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
            <h1 class="font-w700 mb-10 text-white">SEJARAH</h1>
            <h2 class="h4 font-w400 text-white">PONPES MODERN NURUSSALAM</h2>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- Content -->
<div class="bg-white">
    <div class="content content-full">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="font-w500 h3">Sekilas Tentang Pondok Modern Nurussalam</h2>
                <div class="nice-copy">
                    <p>
                        Pondok Pesantren Modern Nurussalam yang terletak di Kabupaten karawang, tepatnya di Jl. Raya
                        Medangasem KM. 04 Desa Medangasem Kec. Jayakerta Kab. Karawang. Pondok pesantren Modern
                        Nurussalam
                        didirikan pada tahun 1970 oleh KH. Nurdin (Alm), beliau wafat pada 7 syawal 1412 H bertepatan
                        dengan
                        11 April 1992 Masehi.
                    </p>
                    <p>
                        Pondok Pesantren Modern Nurusalam “Berdiri di atas dan untuk Semua Golongan“ yang berarti bahwa
                        pondok pesantren modern nurussalam tidak terikat dengan satu aliran tertentu, atau golongan
                        organisasi masyarakat (ormas) sosial tertentu, atau salah-satu partai atau afiliasi politik tertentu.
                    </p>
                    <p>
                        Orientasi Pondok pesantren modern nurussalam adalah membentuk pribadi beriman, bertakwa, dan
                        berakhlak karimah yang dapat mengabdi pada umat dengan penuh keikhlasan dan berperan aktif dalam
                        memberdayakan masyarakat. Jenjang pendidikan di pondok pesantren modern nurussalam disebut
                        dengan Kulliyatul-Mu’allimin/Mu’allimat Al-Islamiyah (KMI). Para santri selain dididik dan
                        diajarkan ilmu pengetahuan agama, juga dibekali ilmu-ilmu pengetahuan umum yang menggunakan
                        sistem dan kurikulum sekolah SMP/SMA. Selain penanaman disiplin hidup dan disiplin dalam
                        beribadah. Dengan demikian para santri diharapkan mempunyai wawasan dan pengetahuan yang
                        seimbang antara ukhrawi dan duniawi.

                    </p>
                </div>
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
