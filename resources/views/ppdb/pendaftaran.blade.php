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
            <h2 class="h4 font-w400 text-white">Formulir Pendaftaran Online</h2>
        </div>
    </div>
</div>
<!-- banner end -->
@endsection

@section('user_content')

<div id="pendaftaran" class="block block-shadow block-rounded block-bordered">
    <!-- Step Tabs -->
    <ul class="nav nav-tabs nav-tabs-alt nav-fill" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#biodata" data-toggle="tab">1.
                Informasi Biodata</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#wali" data-toggle="tab">2.
                Informasi Wali</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#dokumen" data-toggle="tab">3.
                Dokumen Kelengkapan</a>
        </li>
    </ul>
    <!-- END Step Tabs -->

    <!-- Form -->
    <form id="form-ppdb" method="post" onsubmit="return false;">
        @csrf
        <!-- Steps Content -->
        <div class="block-content block-content-full tab-content">
            <!-- Step 1 -->
            <div class="tab-pane active" id="biodata" role="tabpanel">
                <div class="form-group row">
                    <label for="field-program" class="col-4 col-form-label">PROGRAM STUDY (TINGKAT)</label> 
                    <div class="col-8">
                        <label class="css-control css-control-primary css-radio">
                            <input type="radio" class="css-control-input" name="program" checked="" value="SMP">
                            <span class="css-control-indicator"></span> SMP ISLAM NURUSSALAM
                        </label>
                        <label class="css-control css-control-primary css-radio">
                            <input type="radio" class="css-control-input" name="program" value="SMA">
                            <span class="css-control-indicator"></span> SMA ISLAM NURUSSALAM
                        </label>
                        <div class="invalid-feedback" id="error-program"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="field-nama" class="col-4 col-form-label">NAMA LENGKAP</label> 
                    <div class="col-8">
                        <input id="field-nama" name="nama" type="text" class="form-control" value="{{ Auth::guard('web')->user()->nama }}">
                        <div class="invalid-feedback" id="error-nama"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="field-gender" class="col-4 col-form-label">JENIS KELAMIN</label> 
                    <div class="col-8">
                        <label class="css-control css-control-primary css-radio">
                            <input type="radio" class="css-control-input" name="gender" value="L" checked="">
                            <span class="css-control-indicator"></span> Laki-Laki
                        </label>
                        
                        <label class="css-control css-control-primary css-radio">
                            <input type="radio" class="css-control-input" name="gender" value="P">
                            <span class="css-control-indicator"></span> Perempuan
                        </label>
                        <div class="invalid-feedback" id="error-gender"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="field-alamat" class="col-4 col-form-label">ALAMAT LENGKAP</label> 
                    <div class="col-8">
                        <textarea class="form-control" id="field-alamat" name="alamat" rows="4"></textarea>
                        <div class="invalid-feedback" id="error-email"></div>
                    </div>
                </div>
                
                <div class="row">
                    <label for="field-gender" class="col-4 col-form-label">Tempat Tanggal Lahir</label>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input id="field-tmp_lahir" name="tmp_lahir" type="text" class="form-control">
                            <div class="invalid-feedback" id="error-tmp_lahir"></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input id="field-tgl_lahir" name="tgl_lahir" type="text" class="form-control" autocomplete="false">
                            <div class="invalid-feedback" id="error-tgl_lahir"></div>
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <label class="col-4 col-form-label">TEMPAT LAHIR</label> 
                    <div class="col-4">
                    </div>
                    <div class="col-4">
                        <input id="field-tgl_lahir" type="text" class="form-control" >
                        <div class="invalid-feedback" id="error-tgl_lahir"></div>
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label for="field-asal_sekolah" class="col-4 col-form-label">ASAL MADRASAH/SEKOLAH</label> 
                    <div class="col-8">
                        <input id="field-asal_sekolah" name="asal_sekolah" type="text" class="form-control">
                        <div class="invalid-feedback" id="error-asal_sekolah"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="field-nik" class="col-4 col-form-label">NIK/NISN</label> 
                    <div class="col-8">
                        <input id="field-nik" name="nik" type="text" class="form-control">
                        <div class="invalid-feedback" id="error-nik"></div>
                    </div>
                </div>
            </div>
            <!-- END Step 1 -->

            <!-- Step 2 -->
            <div class="tab-pane" id="wali" role="tabpanel">
                <div class="form-group row">
                    <label for="field-wali_nama" class="col-4 col-form-label">NAMA ORANG TUA / WALI</label> 
                    <div class="col-8">
                        <input id="field-wali_nama" name="wali_nama" type="text" class="form-control">
                        <div class="invalid-feedback" id="error-wali_nama"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="field-wali_phone" class="col-4 col-form-label">NO HP ORANG TUA / WALI</label> 
                    <div class="col-8">
                        <input id="field-wali_phone" name="wali_phone" type="text" class="form-control">
                        <div class="invalid-feedback" id="error-wali_phone"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="field-wali_ktp" class="col-4 col-form-label">KTP ORANG TUA / WALI</label> 
                    <div class="col-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="field-wali_ktp" name="wali_ktp">
                            <label class="custom-file-label" for="field-wali_ktp">Pilih File</label>
                            <div class="invalid-feedback" id="error-wali_ktp"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Step 2 -->

            <!-- Step 3 -->
            <div class="tab-pane" id="dokumen" role="tabpanel">
                <div class="form-group row">
                    <label for="field-ijazah" class="col-4 col-form-label">IJAZAH</label> 
                    <div class="col-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="field-ijazah" name="ijazah">
                            <label class="custom-file-label" for="field-ijazah">Pilih File</label>
                        </div>
                        <div class="text-danger" style="font-size:80%;" id="error-ijazah"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="field-akta" class="col-4 col-form-label">AKTA KELAHIRAN</label> 
                    <div class="col-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('akta') is-invalid @enderror" id="field-akta" name="akta">
                            <label class="custom-file-label" for="field-akta">Pilih File</label>
                            @error('akta')
                            <div class="text-danger" style="font-size:80%;" id="error-akta">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="field-skkb" class="col-4 col-form-label">SURAT KETERANGAN BERKELAKUAN BAIK</label> 
                    <div class="col-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('skkb') is-invalid @enderror" id="field-skkb" name="skkb">
                            <label class="custom-file-label" for="field-skkb">Pilih File</label>
                            @error('skkb')
                            <div class="text-danger" style="font-size:80%;" id="error-skkb">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="field-swab" class="col-4 col-form-label">SURAT HASIL SWAB/RAPID TEST</label> 
                    <div class="col-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('swab') is-invalid @enderror" id="field-swab" name="swab">
                            <label class="custom-file-label" for="field-swab">Pilih File</label>
                            @error('swab')
                            <div class="text-danger" style="font-size:80%;" id="error-swab">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ustadz" class="col-4 col-form-label">USTADZ WALI</label> 
                    <div class="col-8">
                        <select class="form-control" name="ustadz">
                            <option value="">Pilih</option>
                            @foreach($ustadz as $u)
                                <option value="{{ $u->id }}">{{ $u->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- END Step 3 -->
        </div>
        <!-- END Steps Content -->

        <!-- Steps Navigation -->
        <div class="block-content block-content-sm block-content-full bg-body-light">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-alt-secondary disabled"
                        data-wizard="prev">
                        <i class="fa fa-angle-left mr-5"></i> Sebelumnya
                    </button>
                </div>
                <div class="col-6 text-right">
                    <button type="button" class="btn btn-alt-secondary" data-wizard="next">
                        Selanjutnya <i class="fa fa-angle-right ml-5"></i>
                    </button>
                    <button type="submit" class="btn btn-alt-primary d-none" id="finish_btn"
                        data-wizard="finish" disabled>
                        <i class="fa fa-check mr-5"></i> Daftar Sekarang
                    </button>
                </div>
            </div>
        </div>
        <!-- END Steps Navigation -->
    </form>
    <!-- END Form -->
</div>
@stop

@push('scripts')
<script src="{{ asset('js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.js') }}"></script>
<script src="{{ asset('js/plugins/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/ppdb/form.js') }}"></script>

<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endpush
