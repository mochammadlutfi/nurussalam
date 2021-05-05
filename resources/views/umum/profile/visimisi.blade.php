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
            <h1 class="font-w700 mb-10 text-white">VISI & MISI</h1>
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
                <h2 class="font-w500 h5">Visi Pondok Pesantren Modern Nurussalam Medangasem</h2>
                <div class="nice-copy">
                    <p>
                        Mencetak kader pemimpin umat yang berkarakter berlandaskan al-qur’an, hadist, ijma dan qiyas.
                    </p>
                </div>
                <h2 class="font-w500 h5">Misi Pondok Pesantren Modern Nurussalam Medangasem</h2>
                <ul class="fa-ul">
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Membekali santri dengan akhlak dan tauhid agar memiliki keilmuan dan ketaqwaan yang kuat.
                    </li>
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Mengadakan pelatihan kepemimpinan santri secara professional dan berkesinambungan.
                    </li>
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Melakukan pembinaan mental dan kepribadian melalui pengajaran, pembentukan, pembiasaan, pengawalan, pelatihan, penugasan yang diikuti dengan uswatun hasanah.
                    </li>
                    <li>
                        <i class="fa fa-check fa-li text-primary"></i>
                        Menyelenggarakan program kajian dan telaah khazanah keislaman bersumber al-qur’an, hadist, ijma dan qiyas.
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
