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
            <h1 class="font-w700 mb-10 text-white">PROGRAM PENDIDIKAN</h1>
            <h2 class="h4 font-w400 text-white">KMI (Kulliyatul Mu’allimin Al-Islamiyyah)</h2>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- Content -->
<div class="bg-white">
    <div class="content content-full">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h3 class="font-w700 h5 my-3">
                    Sekilas tentang KMI (Kulliyatul Mu’allimin Al-Islamiyyah)
                </h3>
                <div class="nice-copy">
                    <p>
                        KMI merupakan lembaga pendidikan yang bertanggung jawab atas pelaksanaan program akademis bagi
                        santri dipondok pesantren modern nurussalam pada jenjang pendidikan pertama dan menengah, dengan
                        masa belajar 6 atau 3 tahun, seperti tingkatan pada sekolah islam lainnya yaitu Tsanawiyah dan
                        Aliyah. Lembaga ini dipimpin langsung oleh seorang Direktur KMI langsung di pondok pesantren
                        modern nurussalam K.H. Ujang badruddin yang dibantu seorang wakil pimpinan ma’had. Pondok
                        pesantren modern nurussalam merupakan lembaga pendidikan guru Islam yang mengutamakan dalam
                        pembentukan kepribadian sikap dan mental bagi setiap santrinya serta juga menanamkan ilmu
                        pengetahuan Islam.
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
