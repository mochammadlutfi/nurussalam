@extends('admin.layouts.master')

@section('styles')
<style>
    #list-kategori_filter {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-5">
            <div class="block block-shadow block-bordered block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title" id="form-title">Tambah Kategori Berita</h3>
                </div>
                <div class="block-content">
                    <form id="form-kategori">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <input type="hidden" id="metode" value="tambah">
                        <div class="form-group">
                            <label class="col-form-label" for="field-nama">Nama</label>
                            <input type="text" class="form-control" id="field-nama" name="nama" placeholder="Masukan Nama">
                            <div class="invalid-feedback" id="error-nama">Invalid feedback</div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deksripsi</label>
                            <textarea class="form-control" id="field-deskripsi" name="deskripsi" placeholder="Masukan Deskripsi" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-alt-primary btn-block"><i class="si si-check mr-1"></i>Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="block block-shadow block-bordered block-rounded">
                <div class="block-content bg-body-light p-3">
                    <!-- Search -->
                    <div class="form-group mb-0">
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
                <div class="block-content pb-15 pt-3">
                    <table class="table table-hover table-vcenter mb-0" id="list-kategori">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th width="25%">Total Berita</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <!-- END Default Elements -->
        </div>
    </div>
</div>
@stop
@push('scripts')
<script src="{{ asset('js/admin/post/kategori.js') }}"></script>
@endpush
