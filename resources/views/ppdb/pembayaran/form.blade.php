@extends('ppdb.user.layouts')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}"/>
@endsection

@section('userHeader')
<!-- Inner Banner -->
<div class="bg-primary">
    <div class="content text-center">
        <div class="pt-50 pb-20">
            <h1 class="font-w700 mb-10 text-white">PPDB PM NURUSSALAM</h1>
            <h2 class="h4 font-w400 text-white">Konfirmasi Pembayaran</h2>
        </div>
    </div>
</div>
<!-- banner end -->
@endsection

@section('user_content')

<div class="block block-shadow block-rounded block-bordered">
    <div class="block-content block-content-full">
        <form id="ppdb-konfirm" onsubmit="return false;">
            @csrf
            <div class="form-group row">
                <label for="field-bank" class="col-4 col-form-label">BANK TUJUAN</label> 
                <div class="col-8">
                    <select class="form-control" name="bank" id="field-bank">
                        <option value="">Pilih</option>
                        @foreach($bank as $b)
                            <option value="{{ $b->id }}">{{ $b->bank }}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback" id="error-bank"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="field-nominal" class="col-4 col-form-label">NOMINAL PEMBAYARAN</label> 
                <div class="col-8">
                    <input id="field-nominal" name="nominal" type="text" class="form-control">
                    <div class="invalid-feedback" id="error-nominal"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="field-tgl_bayar" class="col-4 col-form-label">TANGGAL PEMBAYARAN</label> 
                <div class="col-8">
                    <input id="field-tgl_bayar" type="text" class="form-control" autocomplete="false">
                    <input type="hidden" name="tgl_bayar">
                    <div class="invalid-feedback" id="error-tgl_bayar"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="field-bank_pengirim" class="col-4 col-form-label">BANK PENGIRIM</label> 
                <div class="col-8">
                    <select class="form-control" id="field-bank_pengirim" name="bank_pengirim"></select>
                    <div class="invalid-feedback" id="error-bank_pengirim"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="field-no_rek_pengirim" class="col-4 col-form-label">NO. REKENING PENGIRIM</label> 
                <div class="col-8">
                    <input id="field-no_rek_pengirim" name="no_rek_pengirim" type="text" class="form-control">
                    <div class="invalid-feedback" id="error-no_rek_pengirim"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="field-bukti" class="col-4 col-form-label">BUKTI PEMBAYARAN</label> 
                <div class="col-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="field-bukti" name="bukti">
                        <label class="custom-file-label" for="field-bukti">Pilih File</label>
                        <div class="invalid-feedback" id="error-bukti"></div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-8">
                    <button type="submit" class="btn btn-primary">
                        <i class="si si-paper-plane mr-1"></i>
                        Kirim
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/plugins/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/ppdb/konfirmasi.js') }}"></script>

<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endpush
