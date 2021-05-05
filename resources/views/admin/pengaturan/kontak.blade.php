@extends('admin.pengaturan.index')

@section('pengaturan_content')
<div class="block block-rounded block-shadow block-bordered">
    <form id="form-kontak" method="post" onsubmit="return false;">
    @csrf
        <div class="block-header block-header-default">
            <h3 class="block-title">Pengaturan Kontak</h3>
            <div class="block-options">
                <button type="submit" class="btn btn-alt-primary btn-rounded">
                    <i class="si si-paper-plane mr-3"></i>Simpan
                </button>
            </div>
        </div>
        <div class="block-content pb-15">
            <div class="form-group row">
                <label class="col-4" for="social_facebook">Alamat Lengkap</label>
                <div class="col-8">
                    <textarea class="form-control" name="alamat" id="field-alamat" rows="2">{{ settings()->get('kontak_alamat') }}</textarea>
                    <div class="invalid-feedback" id="error-social_facebook"></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4" for="field-phone">No. Telepon 1</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="field-phone" name="phone" placeholder="Masukan No. Telepon" value="{{ settings()->get('kontak_phone') }}">
                    <div class="invalid-feedback" id="error-field-phone"></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4" for="field-phone2">No. Telepon 2</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="field-phone2" name="phone2" placeholder="Masukan No. Telepon" value="{{ settings()->get('kontak_phone_opt') }}">
                    <div class="invalid-feedback" id="error-field-phone2"></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4" for="field-email">Alamat Email 1</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="field-email" name="email" placeholder="Masukan Alamat Email" value="{{ settings()->get('kontak_email') }}">
                    <div class="invalid-feedback" id="error-field-email"></div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4" for="field-email2">Alamat Email 2</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="field-email2" name="email2" placeholder="Masukan Alamat Email" value="{{ settings()->get('kontak_email_opt') }}">
                    <div class="invalid-feedback" id="error-field-email2"></div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop