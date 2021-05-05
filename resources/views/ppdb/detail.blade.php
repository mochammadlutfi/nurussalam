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
    <div class="block-header block-header-default">
        <h3 class="block-title">#{{ $data->kd_registrasi }}</h3>
        @if($data->status === 0)
        <span class="badge badge-danger font-size-16 p-2">Belum Bayar</span>
        @elseif($data->status === 1)
        <span class="badge badge-warning font-size-16 p-2">Proses</span>
        @elseif($data->status === 2)
        <span class="badge badge-success font-size-16 p-2">Lunas</span>
        @endif
    </div>
    <div class="block-content block-content-full">
        <div class="row justify-content-center">
            <div class="col-lg-12">
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
                            {{ auth()->guard('web')->user()->nama }}
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
                            {{ $data->email }}
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
        </div>

        <div class="row">
            
            <div class="col-lg-12">
                <div class="my-3 row">
                    <div class="col-12">
                        <div class="font-size-18 font-weight-bold">
                            Dokumen
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
@stop

@push('scripts')
<script src="{{ asset('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
<script src="{{ asset('js/plugins/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/ppdb/form.js') }}"></script>

@endpush
