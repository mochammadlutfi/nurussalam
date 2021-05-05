@extends('admin.layouts.master')

@section('styles')
<style>
</style>
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-5">
            <div class="block block-shadow block-bordered block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title" id="form-title">Tambah Role</h3>
                </div>
                <div class="block-content">
                    <form id="form-role">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <input type="hidden" id="metode" value="tambah">
                        <div class="form-group">
                            <label class="col-form-label" for="field-nama">Nama</label>
                            <input type="text" class="form-control" id="field-nama" name="nama">
                            <div class="invalid-feedback" id="error-nama">Invalid feedback</div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="si si-check mr-1"></i>Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="block block-rounded block-shadow block-bordered d-md-block d-none mb-10">
                <div class="block-content p-2">
                    <div class="row justify-content-between">
                        <div class="col-5">
                            <div class="has-search">
                                <i class="fa fa-search"></i>
                                <input type="search" class="form-control" id="search-data-list" name="keyword">
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="row">
                                <div class="col-md-8 m-auto" id="content-nav">
                                    <span>Navigasi</span>
                                </div>
                                <div class="col-md-4 pl-0 text-right">
                                    <button type="button" class="btn btn-alt-secondary" id="prev-data-list">
                                        <i class="fa fa-chevron-left fa-fw"></i>
                                    </button>
                                    <button type="button" class="btn btn-alt-secondary" id="next-data-list">
                                        <i class="fa fa-chevron-right fa-fw"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="block block-rounded block-shadow block-bordered mb-5">
                <div class="block-content px-0 py-0">
                    <input type="hidden" id="current_page" value="1">
                    <table class="table table-striped table-vcenter table-hover mb-0" id="data-list">
                        <thead class="thead-light">
                            <tr>
                                <th>NAMA</th>
                                <th width="15%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="loading" class="data-row d-none">
                                <td colspan="7">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 text-center py-50">
                                            <div class="spinner-border text-primary wh-50" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('js/admin/admin-role.js') }}"></script>
@endpush
