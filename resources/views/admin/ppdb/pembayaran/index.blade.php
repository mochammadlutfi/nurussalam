@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('js/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" />

@endsection


@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Pembayaran PPDB
    </div>
    <div class="block block-rounded block-shadow block-bordered d-md-block d-none mb-10">
        <div class="block-content p-2">
            <div class="row justify-content-between mb-2">
                <div class="col-lg-4">
                    <select class="form-control" name="filter-status" id="filter-status">
                        <option value="">Semua Status</option>
                        <option value="0">Belum Dikonfirmasi</option>
                        <option value="1">Sudah Dikonfirmasi</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <div id="tgl_range" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                        <i class="fa fa-calendar"></i>
                        <span></span>
                        <i class="fa fa-caret-down float-right"></i>
                        <input type="hidden" id="tgl_mulai" value="">
                        <input type="hidden" id="tgl_akhir" value="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <select class="form-control" name="filter-bank" id="filter-bank">
                        <option value="">Semua Rekening</option>
                        @foreach($bank as $b)
                        <option value="{{ $b->id }}">{{ $b->bank }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-4">
                    <div class="has-search">
                        <i class="fa fa-search"></i>
                        <input type="search" class="form-control" id="search-data-list" name="keyword">
                    </div>
                </div>
                <div class="col-4">

                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-md-8 m-auto" id="content-nav">
                            <span>Navigasi</span>
                        </div>
                        <div class="col-md-4 pt-25 pl-0">
                            <button type="button" class="btn btn-alt-secondary float-right" id="next-data-list">
                                <i class="fa fa-chevron-right fa-fw"></i>
                            </button>
                            <button type="button" class="btn btn-alt-secondary float-left" id="prev-data-list">
                                <i class="fa fa-chevron-left fa-fw"></i>
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
                        <th class="font-weight-bold">Tanggal</th>
                        <th class="font-weight-bold" width="10%">Status</th>
                        <th class="font-weight-bold">Bank Tujuan</th>
                        <th class="font-weight-bold">Peserta</th>
                        <th class="font-weight-bold">Bank Pengirim</th>
                        <th class="font-weight-bold">Nominal</th>
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
</div>

@stop
@push('scripts')
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('js/plugins/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}"></script>
<script src="{{ asset('js/admin/ppdb/pembayaran.js') }}"></script>
@endpush
