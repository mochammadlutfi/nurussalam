@extends('ppdb.user.layouts')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}"/>
@endsection

@section('userHeader')
<!-- Inner Banner -->
<div class="bg-primary">
    <div class="content text-center">
        <div class="pt-50 pb-20">
            <h1 class="font-w700 mb-10 text-white">PPDB PM NURUSSALAM</h1>
            <h2 class="h4 font-w400 text-white">Metode Pembayaran</h2>
        </div>
    </div>
</div>
<!-- banner end -->
@endsection

@section('user_content')
<!-- Content -->
<div class="row justify-content-center">
    @foreach($bank as $b)
    <div class="col-lg-6">
        <div class="block block-rounded block-bordered block-shadow">
            <div class="block-content block-content-full">
                <img src="{{ asset($b->icon_url) }}" class="mx-auto d-block">
                <div class="py-3 text-center">
                    <div class="font-w700">{{ $b->nama }}</div>
                    <div class="font-w500">{{ $b->no_rek }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop

@push('scripts')
<script src="{{ asset('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
<script src="{{ asset('js/plugins/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/umum/ppdb/konfirmasi.js') }}"></script>

<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endpush
