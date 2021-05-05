@extends('admin.layouts.master')

@section('styles')
<style>
    .grid-striped .row>.col {
        vertical-align: middle;
        border-top: 1px solid #e4e7ed;
    }

    @media (max-width: 767.98px) {
        .grid-striped .row {
            border-top: 2px solid #e4e7ed;
        }

        .grid-striped .row>.col {
            border-top: none;
        }
    }

</style>
<link rel="stylesheet" id="css-main" href="{{ asset('js/plugins/bootstrap-fileinput/css/fileinput.min.css') }}">
<link rel="stylesheet" id="css-main" href="{{ asset('js/plugins/bootstrap-fileinput/css/input_file.css') }}">
@endsection

@section('content')

<div class="content">
    <div class="content-heading pt-3 mb-3 d-none d-md-block">
        Detail Pendaftaran
        @if($data->status === 0)
        <span class="badge badge-danger">Belum Bayar</span>
        @elseif($data->status === 1)
        <span class="badge badge-warning">Pending</span>
        @elseif($data->status === 2)
        <span class="badge badge-success">Lunas</span>
        @endif
    </div>
    <div class="block block-rounded block-bordered block-shadow mb-lg-0">
        <div class="block-content py-lg-3">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="mb-3 row">
                        <div class="col-12">
                            <div class="font-size-18 font-weight-bold">
                                Informasi Biodata
                            </div>
                            <hr class="border-bottom my-1"/>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">No. Pendaftaran</label>
                        <div class=" col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->kd_registrasi }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Program</label>
                        <div class="col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->program }} Islam Nurussalam
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Nama Lengkap</label>
                        <div class="col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->peserta->nama }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Jenis Kelamin</label>
                        <div class="col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->gender === "L" ? "Laki-Laki" : "Perempuan" }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Tempat/Tanggal Lahir</label>
                        <div class="col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->tmp_lahir }} / {{ $data->tgl_lahir }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Alamat Email</label>
                        <div class="col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->peserta->email }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Alamat Lengkap</label>
                        <div class="col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->alamat }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Asal Sekolah/Madrasah</label>
                        <div class="col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->asal_sekolah }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">NIK/NISN</label>
                        <div class="col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->NIK }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Nama Orang Tua/Wali</label>
                        <div class="col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->wali_nama }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">No. HP Orang Tua/Wali</label>
                        <div class="col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->wali_phone }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="mb-3 my-3 my-lg-0 row">
                        <div class="col-12">
                            <div class="font-size-18 font-weight-bold">
                                Informasi Dokumen
                            </div>
                            <hr class="border-bottom my-1"/>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-8 col-lg-8 mb-0 font-size-18 font-size-14-down-lg ">Scan Ijazah</label>
                        <div class="col-4 col-lg-4 text-right">
                            <a href="{{ asset($data->ijazah) }}" class="btn btn-secondary btn-sm"><i class="fa fa-download mr-1"></i>
                                Download
                            </a>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-8 col-lg-8 mb-0 font-size-18 font-size-14-down-lg ">Scan Akta Kelahiran</label>
                        <div class="col-4 col-lg-4 text-right">
                            <a href="{{ asset($data->akta_kelahiran) }}" class="btn btn-secondary btn-sm"><i class="fa fa-download mr-1"></i>
                                Download
                            </a>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-8 col-lg-8 mb-0 font-size-18 font-size-14-down-lg ">KTP Orang Tua / Wali</label>
                        <div class="col-4 col-lg-4 text-right">
                            <a href="{{ asset($data->wali_ktp) }}" class="btn btn-secondary btn-sm"><i class="fa fa-download mr-1"></i>
                                Download
                            </a>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-8 col-lg-8 mb-0 font-size-18 font-size-14-down-lg ">Surat Keterangan Berkelakuan Baik</label>
                        <div class="col-4 col-lg-4 text-right">
                            <a href="{{ asset($data->skkb) }}" class="btn btn-secondary btn-sm"><i class="fa fa-download mr-1"></i>
                                Download
                            </a>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-8 col-lg-8 mb-0 font-size-18 font-size-14-down-lg ">Surat Hasil Swab /Rapid Test</label>
                        <div class="col-4 col-lg-4 text-right">
                            <a href="{{ asset($data->swab) }}" class="btn btn-secondary btn-sm"><i class="fa fa-download mr-1"></i>
                                Download
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@stop
@push('scripts')
<script src="{{ asset('js/plugins/bootstrap-fileinput/js/plugins/piexif.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/bootstrap-fileinput/js/locales/id.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/bootstrap-fileinput/css/themes/fa/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/admin/kunjungan/detail.js') }}"></script>
@endpush
