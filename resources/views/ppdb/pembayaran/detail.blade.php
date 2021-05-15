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
            <h2 class="h4 font-w400 text-white">Detail Pendaftaran</h2>
        </div>
    </div>
</div>
<!-- banner end -->
@endsection

@section('user_content')

<div class="block block-rounded block-bordered block-shadow">
    <div class="block-content block-content-full">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="form-group row mb-1">
                    <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Bank Tujuan</label>
                    <div class=" col-6 col-lg-8">
                        <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                            :
                            {{ $data->tujuan->bank }}
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Status Pembayaran
                    </label>
                    <div class="col-6 col-lg-8">
                        <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                            :
                            @if($data->status === 0)
                            <span class="badge badge-warning font-size-16 p-2">Proses</span>
                            @elseif($data->status === 1)
                            <span class="badge badge-success font-size-16 p-2">Terkonfirmasi</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Nominal Pembayaran</label>
                    <div class="col-6 col-lg-8">
                        <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                            :
                            {{ $data->jumlah }}
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Tanggal Pembayaran</label>
                    <div class="col-6 col-lg-8">
                        <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                            :
                            {{ $data->tgl_bayar_frm }}
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Bank Pengirim</label>
                    <div class="col-6 col-lg-8">
                        <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                            :
                            {{ $data->pengirim_bank }}
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">No. Rekening Pengirim
                    </label>
                    <div class="col-6 col-lg-8">
                        <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                            :
                            {{ $data->pengirim_rek }}
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-1">
                    <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Bukti Pembayaran</label>
                    <div class="col-6 col-lg-8">
                        :
                        <a href="{{ asset($data->bukti) }}" class="btn btn-secondary btn-sm"><i class="fa fa-download mr-1"></i>
                            Download
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
<script src="{{ asset('js/plugins/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/ppdb/form.js') }}"></script>

@endpush
