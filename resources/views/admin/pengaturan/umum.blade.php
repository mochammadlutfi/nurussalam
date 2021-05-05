@extends('admin.pengaturan.index')

@section('pengaturan_content')
<div class="block block-rounded block-shadow block-bordered">
    <form id="form_general" method="post" action = "" onsubmit="return false;">
    @csrf
        <div class="block-header block-header-default">
            <h3 class="block-title">Pengaturan Umum</h3>
            <div class="block-options">
                <button type="submit" class="btn btn-alt-primary btn-rounded">
                    <i class="si si-paper-plane mr-3"></i>Simpan
                </button>
            </div>
        </div>
        <div class="block-content pb-15">
            <div class="form-group row">
                <label class="col-4" for="app_name">Nama Situs</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="app_name" name="app_name" placeholder="Masukan Nama Situs" value="{{ settings()->get('app_name') }}">
                    <div class="invalid-feedback" id="error-app_name">Invalid feedback</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4" for="app_url">URL Situs</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="field-app_url" name="app_url" placeholder="Masukan URL Situs" value="{{ settings()->get('app_url') }}">
                    <div class="invalid-feedback" id="error-app_url">Invalid feedback</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4" for="app_description">Deskripsi Situs</label>
                <div class="col-8">
                    <textarea name="app_description" class="form-control" id="app_description" rows="5">{{ settings()->get('app_description') }}</textarea>
                    <div class="invalid-feedback" id="error-app_description">Invalid feedback</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4" for="app_logo">Logo</label>
                <div class="col-8">
                    <div class="row mb-10">
                        <div class="col-5">
                            <img id="logo_preview" src="{{ asset(settings()->get('app_logo')) }}" width="100%"/>
                        </div>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input js-custom-file-input-enabled" id="field-app_logo" name="app_logo" data-toggle="custom-file-input">
                        <label class="custom-file-label label-logo" for="field-app_logo">Pilih File..</label>
                        <div class="invalid-feedback" id="error-app_logo">Invalid feedback</div>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4" for="app_description">Favicon</label>
                <div class="col-8">
                    <div class="row mb-10">
                        <div class="col-1">
                            <img id="icon_preview" src="{{ asset(settings()->get('app_favicon')) }}" width="100%"/>
                        </div>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input js-custom-file-input-enabled" id="field-app_favicon" name="app_favicon" data-toggle="custom-file-input">
                        <label class="custom-file-label label-favicon" for="field-app_favicon">Pilih File..</label>
                        <div class="invalid-feedback" id="error-app_favicon">Invalid feedback</div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@push('scripts')
@endpush
