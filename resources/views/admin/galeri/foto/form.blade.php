@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" id="css-main" href="{{ asset('js/plugins/bootstrap-fileinput/css/fileinput.min.css') }}">
<link rel="stylesheet" id="css-main" href="{{ asset('js/plugins/bootstrap-fileinput/css/input_file.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/magnific-popup/magnific-popup.css') }}">
<style>
</style>
@endsection

@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Kelola Galeri {{ $album->title }}
        <button id="btn_tambah" type="button" class="btn btn-secondary mr-5 mb-5 float-right btn-rounded">
            <i class="si si-plus mr-5"></i>
            Tambah Foto Baru
        </button>
    </div>

    <div class="row justify-content-center" id="loading">
        <div class="col-lg-6 text-center">
            <div class="spinner-border text-primary wh-50" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <input type="hidden" id="current_page" value="1">
            <div class="gal-masonry" id="dataContent"></div>
        </div>
        <div class="col text-center d-none" id="btn-loadMore">
            <button class="btn btn-primary text-center" type="button">Load More</button>
        </div>
    </div>
</div>

<div class="modal" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-center modal-dialog-popout modal-lg" role="document">
        <div class="modal-content">
            <div class="block mb-0">
                <form id="form-foto" onsubmit="return false;">
                    @csrf
                    <div class="block-header block-header-default">
                        <h3 class="block-title" id="modal-title">Tambah Foto Baru</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <input type="hidden" id="album_id" name="album_id" value="{{ $album->id }}">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 px-0">
                                <div class="form-group">
                                    <input id="upload-foto" name="files[]" type="file" multiple accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-alt-primary">
                            <i class="fa fa-check"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-fileinput/js/plugins/piexif.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript">
</script>
<script src="{{ asset('js/plugins/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/bootstrap-fileinput/js/locales/id.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/bootstrap-fileinput/css/themes/fa/theme.js') }}" type="text/javascript">
</script>
<script src="{{ asset('js/plugins/bootstrap-fileinput/css/themes/explorer-fa/theme.js') }}"type="text/javascript"></script>
<script src="{{ asset('https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.js') }}"></script>
<script src="{{ asset('js/admin/galeri/photo.js') }}"></script>

@endpush
