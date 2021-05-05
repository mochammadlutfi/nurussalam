@extends('umum.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
<!-- Inner Banner -->
<div class="bg-primary">
    <div class="content text-center">
        <div class="pt-50 pb-20">
            <h1 class="font-w700 mb-10 text-white">PPDB PM NURUSSALAM</h1>
            <h2 class="h4 font-w400 text-white">Pendaftaran Santri Baru Pondok Pesantren Modern Nurussalam<br>Tahun Ajaran 2020-2021</h2>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- Content -->
<div class="bg-white">
    <div class="content content-full">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="font-w500 h3 text-center">Formulir Pendaftaran Online</h2>
                <form id="form-ppdb" onsubmit="return false;" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="field-program" class="col-4 col-form-label">PROGRAM STUDY (TINGKAT)</label> 
                        <div class="col-8">
                            <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="program">SMP ISLAM NURUSSALAM
                            </label>
                            </div>
                            <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="program">SMA ISLAM NURUSSALAM
                            </label>
                            </div>
                            @error('program')
                                <div class="text-danger" style="font-size:80%;" id="error-program">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="field-nama" class="col-4 col-form-label">NAMA LENGKAP</label> 
                        <div class="col-8">
                            <input id="field-nama" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                            <div class="invalid-feedback font-size-sm" id="error-nama">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="field-gender" class="col-4 col-form-label">JENIS KELAMIN</label> 
                        <div class="col-8">
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender" value="L">Laki-Laki
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="gender"value="P">Perempuan
                                </label>
                            </div>
                            @error('gender')
                                <div class="text-danger" style="font-size:80%;" id="error-gender">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="field-email" class="col-4 col-form-label">ALAMAT EMAIL</label> 
                        <div class="col-8">
                            <input id="field-email" name="email" type="text" class="form-control @error('nama') is-invalid @enderror">
                            @error('email')
                            <div class="invalid-feedback font-size-sm" id="error-email">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="field-alamat" class="col-4 col-form-label">ALAMAT LENGKAP</label> 
                        <div class="col-8">
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="field-alamat" name="alamat" rows="4"></textarea>
                            @error('alamat')
                            <div class="invalid-feedback font-size-sm" id="error-email">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="field-tmp_lahir" class="col-4 col-form-label">TEMPAT / TANGGAL LAHIR</label> 
                        <div class="col-4">
                            <input id="field-tmp_lahir" name="tmp_lahir" type="text" class="form-control @error('tmp_lahir') is-invalid @enderror">
                            @error('tmp_lahir')
                            <div class="invalid-feedback font-size-sm" id="error-tmp_lahir">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-4">
                            <input id="field-tgl_lahir" name="tgl_lahir" type="text" class="form-control @error('tgl_lahir') is-invalid @enderror">
                            @error('tmp_lahir')
                            <div class="invalid-feedback font-size-sm" id="error-tgl_lahir">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="field-asal_sekolah" class="col-4 col-form-label">ASAL MADRASAH/SEKOLAH</label> 
                        <div class="col-8">
                            <input id="field-asal_sekolah" name="asal_sekolah" type="text" class="form-control @error('asal_sekolah') is-invalid @enderror">
                            <div class="invalid-feedback font-size-sm" id="error-asal_sekolah"></div>
                            @error('asal_sekolah')
                            <div class="invalid-feedback font-size-sm" id="error-asal_sekolah">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="field-nik" class="col-4 col-form-label">NIK/NISN</label> 
                        <div class="col-8">
                            <input id="field-nik" name="nik" type="text" class="form-control @error('nik') is-invalid @enderror">
                            @error('nik')
                            <div class="invalid-feedback font-size-sm" id="error-nik">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="field-wali_nama" class="col-4 col-form-label">NAMA ORANG TUA / WALI</label> 
                        <div class="col-8">
                            <input id="field-wali_nama" name="wali_nama" type="text" class="form-control @error('wali_nama') is-invalid @enderror">
                            @error('wali_nama')
                            <div class="invalid-feedback font-size-sm" id="error-wali_nama">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="field-wali_phone" class="col-4 col-form-label">NO HP ORANG TUA / WALI</label> 
                        <div class="col-8">
                            <input id="field-wali_phone" name="wali_phone" type="text" class="form-control @error('wali_phone') is-invalid @enderror">
                            @error('wali_phone')
                            <div class="invalid-feedback font-size-sm" id="error-wali_phone">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="field-ijazah" class="col-4 col-form-label">IJAZAH</label> 
                        <div class="col-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('ijazah') is-invalid @enderror" id="field-ijazah" name="ijazah">
                                <label class="custom-file-label" for="field-ijazah">Pilih File</label>
                            </div>
                            @error('ijazah')
                            <div class="text-danger" style="font-size:80%;" id="error-ijazah">
                                {{ $message }}
                            </div>
                            @enderror
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
                        <label for="field-wali_ktp" class="col-4 col-form-label">KTP ORANG TUA / WALI</label> 
                        <div class="col-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('wali_ktp') is-invalid @enderror" id="field-wali_ktp" name="wali_ktp">
                                <label class="custom-file-label" for="field-wali_ktp">Pilih File</label>
                                @error('wali_ktp')
                                <div class="text-danger" style="font-size:80%;" id="error-wali_ktp">
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
                        <label for="pembayaran" class="col-4 col-form-label">METODE PEMBAYARAN</label> 
                        <div class="col-8">
                            <select class="form-control @error('pembayaran') is-invalid @enderror" name="pembayaran">
                                <option value="">Pilih</option>
                                @foreach($bank as $b)
                                    <option value="{{ $b->id }}">{{ $b->bank }}</option>
                                @endforeach
                            </select>
                            @error('pembayaran')
                            <div class="text-danger" style="font-size:80%;" id="error-pembayaran">
                                {{ $message }}
                            </div>
                            @enderror
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

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/umum/ppdb/pendaftaran.js') }}"></script>

<script>
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endpush
