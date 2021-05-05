@extends('ppdb.user.layouts')

@section('styles')
@endsection

@section('userHeader')
<!-- Inner Banner -->
<div class="bg-primary">
    <div class="content text-center">
        <div class="pt-50 pb-20">
            <h1 class="font-w700 mb-10 text-white">PPDB PM NURUSSALAM</h1>
            <h2 class="h4 font-w400 text-white">My Profile</h2>
        </div>
    </div>
</div>
<!-- banner end -->
@endsection
@section('user_content')
<div class="block block-rounded block-shadow block-bordered">
    <div class="block-content">
        <div class="border-bottom border-3x">
            <h3 class="font-size-20 mb-0 pb-2">Profil Saya</h3>
        </div>
        <p class="mb-2">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun.</p>
        <form id="form-profil" onsubmit="return false;">
            <div class="row">
                @csrf
                <div class="col-lg-8">
                    <div class="form-group">
                        <label class="form-label" for="field-nama">Nama Lengkap
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="nama" id="field-nama" placeholder="Masukan Nama Lengkap" value="{{ auth()->guard('web')->user()->nama }}">
                        <div class="invalid-feedback" id="error-nama"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="field-email">Alamat Email
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="email" id="field-email" placeholder="Masukan Alamat Email" value="{{ auth()->guard('web')->user()->email }}">
                        <div class="invalid-feedback" id="error-email"></div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="si si-paper-plane mr-1"></i>
                            Simpan
                        </button>
                    </div>
                </div>
                <div class="col-4">

                </div>
            </div>
        </form>
    </div>
</div>
@stop

@push('scripts')

@endpush
