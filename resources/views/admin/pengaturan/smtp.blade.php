@extends('admin.pengaturan.index')

@section('pengaturan_content')
<div class="block block-rounded block-shadow block-bordered">
    <form id="form-smtp" method="post" onsubmit="return false;">
    @csrf
    <div class="block-header block-header-default">
        <h3 class="block-title">Pengaturan Email SMTP</h3>
        <div class="block-options">
            <button type="submit" class="btn btn-alt-primary btn-rounded">
                <i class="si si-paper-plane mr-3"></i>Simpan
            </button>
        </div>
    </div>
    <div class="block-content">
        <div class="form-group row">
            <label class="col-4" for="smtp_server">Alamat SMTP Server</label>
            <div class="col-8">
                <input type="text" class="form-control" id="smtp_server" name="smtp_server" placeholder="Masukan SMTP Server" value="{{ settings()->get('smtp_server') }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4" for="smtp_username">SMTP Username</label>
            <div class="col-8">
                <input type="text" class="form-control" id="smtp_username" name="smtp_username" placeholder="Masukan SMTP Username" value="{{ settings()->get('smtp_username') }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4" for="smtp_password">SMTP Password</label>
            <div class="col-8">
                <input type="password" class="form-control" id="smtp_password" name="smtp_password" placeholder="Masukan SMTP Password" value="{{ settings()->get('smtp_password') }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4" for="smtp_port">SMTP Port</label>
            <div class="col-8">
                <input type="text" class="form-control" id="smtp_port" name="smtp_port" placeholder="Masukan SMTP Port" value="{{ settings()->get('smtp_port') }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4" for="smtp_crypt">SMTP Encryption</label>
            <div class="col-8">
                <select class="form-control" name="smtp_crypt">
                    <option value="SSL" <?php if(settings()->get('smtp_crypt') == 'SSL'){ echo 'selected="selected"'; } ?>>SSL</option>
                    <option value="TLS" <?php if(settings()->get('smtp_crypt') == 'TLS'){ echo 'selected="selected"'; } ?>>TLS</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4>Test Konfigurasi</h4>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4" for="email_test">Alamat Email</label>
            <div class="col-6">
                <input type="text" class="form-control" id="email_test" name="email_test" placeholder="Masukan Alamat Email" value="{{ settings()->get('kontak_email') }}">
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-alt-primary btn-block"><i class="si si-paper-plane mr-5"></i> Test</button>
            </div>
        </div>
    </div>
    </form>
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/backend/js/pages/pengaturan.js') }}"></script>
@endpush
