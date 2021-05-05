@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="content">
    <form id="form-user" onsubmit="return false;" enctype="multipart/form-data">
    @csrf
    <div class="content-heading pt-0 mb-3">
        Tambah Pengguna
        <button type="submit" class="btn btn-alt-primary float-right">
            <i class="si si-check mr-5"></i>
            Simpan
        </button>
    </div>
    <div class="block block-shadow block-rounded block-bordered">
        <div class="block-content py-2">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="field-name">Nama</label>
                        <input type="text" class="form-control" id="field-name" name="name" value="{{ $data->name }}">
                        <div class="invalid-feedback" id="error-name">Invalid feedback</div>
                    </div>
                    <div class="form-group">
                        <label for="field-username">Username</label>
                        <input type="text" class="form-control" id="field-username" name="username"value="{{ $data->username }}">
                        <div class="invalid-feedback" id="error-username">Invalid feedback</div>
                    </div>
                    <div class="form-group">
                        <label for="field-email">Email</label>
                        <input type="email" class="form-control" id="field-email" name="email" value="{{ $data->email }}">
                        <div class="invalid-feedback" id="error-email">Invalid feedback</div>
                    </div>
                    <div class="form-group">
                        <label for="field-password">Password</label>
                        <div class="input-group input-password">
                            <input type="password" class="form-control" id="field-password" name="password">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <a href="javaScript:void(0);"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                </span>
                            </div>
                            <div class="invalid-feedback font-size-sm" id="error-password"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="field-role">Peran</label>
                        <select class="form-control" name="role" id="field-role" data-id=""></select>
                        <div class="invalid-feedback" id="error-role">Invalid feedback</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@include('include.modal_crop')
@stop

@push('scripts')
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('js/admin/user.js') }}"></script>
@endpush
