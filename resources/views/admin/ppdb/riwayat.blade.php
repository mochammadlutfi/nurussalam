@extends('admin.layouts.master')
@section('styles')
@endsection
@section('content')

<div class="content">
    <div class="content-heading pt-3 mb-3 d-none d-md-block">
        Riwayat Kunjungan
    </div>
    <div class="block block-rounded block-shadow block-bordered d-md-block d-none mb-5">
        <div class="block-content p-2">
            <div class="row justify-content-between">
                <div class="col-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" id="pencarian" name="keyword" placeholder="Masukan Kata Kunci">
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col-md-7 py-lg-2" id="produk_nav">
                            <span>Data Jadwal Kunjungan</span>
                        </div>
                        <div class="col-md-5 pt-25">
                            <button type="button" class="btn btn-alt-secondary float-right" id="nextProduk">
                                <i class="fa fa-chevron-right fa-fw"></i>
                            </button>
                            <button type="button" class="btn btn-alt-secondary float-left" id="prevProduk">
                                <i class="fa fa-chevron-left fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="current_page" value="1">
    <div id="kunjungan-list">
    </div>
</div>

@stop
@push('scripts')
<script>
    var urlContent = laroute.route('admin.kunjungan.riwayat');
</script>
<script src="{{ asset('js/admin/kunjungan/jadwal.js') }}"></script>
@endpush
