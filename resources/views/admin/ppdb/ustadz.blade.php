@extends('admin.layouts.master')

@section('styles')
<style>
    #list-data_filter {
        display: none;
    }
</style>
@endsection


@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Ustadz Wali
        <button type="button" class="btn btn-primary float-right" id="btn-add_data">Tambah Ustadz Wali</button>
    </div>
    <div class="block">
        <div class="block-content bg-body-light">
            <!-- Search -->
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="search_box" placeholder="Masukan Kata Kunci..">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- END Search -->
        </div>
        <div class="block-content pb-15">
            <table class="table table-hover table-vcenter mb-0" id="list-data">
                <thead>
                    <tr>
                        <th class="font-weight-bold">Nama Lengkap</th>
                        <th class="font-weight-bold">No Handphone</th>
                        <th class="font-weight-bold">Status</th>
                        <th class="font-weight-bold" width="20% text-right">Opsi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<div class="modal" id="modalForm">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form onsubmit="return false" id="form-wali">
                @csrf
                <input type="hidden" name="id" id="field-id" value="">
                <div class="block-header block-header-default">
                    <h3 class="block-title modal-title">Judul Modal</h3>
                    <div class="block-options">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="fa fa-times-circle"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="block-content py-0">
                    <div class="form-group">
                        <label class="col-form-label" for="field-nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Nama Lengkap" autocomplete="off">
                        <div class="invalid-feedback font-size-sm" id="error-nama">Invalid feedback</div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="field-phone">No Handphone</label>
                        <input type="text" class="form-control" id="field-phone" name="phone" placeholder="Masukan No Handphone" autocomplete="off">
                        <div class="invalid-feedback font-size-sm" id="error-phone">Invalid feedback</div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label" for="field-status">Status</label>
                        <select id="field-status" name="status" class="form-control">
                            <option value="">Pilih</option>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                        <div class="invalid-feedback font-size-sm" id="error-status">Invalid feedback</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
@push('scripts')
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('js/admin/ppdb/ustadz.js') }}"></script>
@endpush
