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
            <h3 class="font-size-20 mb-0 pb-2">Ubah Password</h3>
        </div>
        <form id="form-password" onsubmit="return false;">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="field-old_password">Password Lama</label>
                        <div class="input-group has_password">
                            <input type="password" class="form-control" id="field-old_password" name="old_password" autocomplete>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a href="javaScript:void(0);"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </span>
                            </div>
                            <div class="invalid-feedback font-size-sm" id="error-old_password"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-password">Password Baru</label>
                        <div class="input-group has_password">
                            <input type="password" class="form-control" id="field-password" name="password" autocomplete>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a href="javaScript:void(0);"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </span>
                            </div>
                            <div class="invalid-feedback font-size-sm" id="error-password"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-password_confirmation">Konfirmasi Password Baru</label>
                        <div class="input-group has_password">
                            <input type="password" class="form-control" id="field-password_confirmation" name="password_confirmation" autocomplete>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a href="javaScript:void(0);"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </span>
                            </div>
                            <div class="invalid-feedback font-size-sm" id="error-password_confirmation"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            <i class="si si-paper-plane mr-1"></i>
                            Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/ppdb/user.js') }}"></script>

@endpush
