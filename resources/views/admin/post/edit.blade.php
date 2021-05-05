@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-taginput/tagsinput.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
@endsection

@section('content')
<div class="content">
    <!-- Default Elements -->
    <div class="block">
        <div class="block-content">
            <form id="form-post" onsubmit="return false;" enctype="multipart/form-data">
            <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}"/>
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-group row">
                            <label class="col-12" for="field-judul">Judul</label>
                            <div class="col-12">
                                <input type="text" class="form-control" id="field-judul" name="judul" placeholder="Masukan Judul Post" value="{{ $post->judul }}">
                                <div class="invalid-feedback" id="error-judul">Invalid feedback</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12">Deskripsi</label>
                            <div class="col-12">
                                <textarea class="form-control" id="field-deskripsi" name="deskripsi" placeholder="Masukan Deskripsi Event" rows="8">{{ $post->deskripsi }}</textarea>
                                <div class="invalid-feedback" id="error-deskripsi">Invalid feedback</div>
                            </div>
                        </div>
                        {{-- SEO INFO --}}
                        <div class="form-group row mb-3">
                            <div class="col-lg-12">
                                <div class="content-heading mb-0 pt-0">SEO Info</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="seo_keyword">SEO Keyword</label>
                            <div class="col-12">
                                <input type="text" class="form-control" id="seo_keyword" name="seo_keyword" placeholder="Masukan SEO Keyword" value="{{ $post->seo_keyword }}">
                                <div class="form-text text-muted font-size-sm text-right">Gunakan tanda koma "," sebagai pemisah!</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="seo_tags">SEO Tags</label>
                            <div class="col-12">
                                <input type="text" class="form-control" id="seo_tags" name="seo_tags" placeholder="Masukan SEO Tags" value="{{ $post->seo_tags }}">
                                <div class="form-text text-muted font-size-sm text-right">Gunakan tanda koma "," sebagai pemisah!</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12" for="seo_deskripsi">SEO Deksripsi</label>
                            <div class="col-12">
                                <textarea class="form-control" id="deskripsi_seo" name="seo_deskripsi" maxlength="115" data-always-show="true" data-placement="top" placeholder="Masukan SEO Deskripsi" rows="2">{{ $post->seo_deskripsi }}</textarea>
                                <div class="form-text text-muted font-size-sm text-right">Maksimal 115 Karakter</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group row mb-3">
                            <div class="col-lg-12">
                                <div class="content-heading mb-0 pt-0">Status</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-12">Publikasi</label>
                            <div class="col-12">
                                <label class="css-control css-control-primary css-radio">
                                    <input type="radio" class="css-control-input" id="status_publikasi" name="status" value="1" {{  $post->status == "1" ? "checked" : "" }}>
                                    <span class="css-control-indicator"></span> Publikasikan
                                </label>
                                <label class="css-control css-control-danger css-radio">
                                    <input type="radio" class="css-control-input" id="status_draft" name="status" value="0" {{  $post->status == "0" ? "checked" : "" }}>
                                    <span class="css-control-indicator"></span> Draft
                                </label>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-alt-primary btn-block"><i class="si si-check mr-5"></i>Simpan</button>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-lg-12">
                                <div class="content-heading mb-0 pt-0">Kategori</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <select class="form-control" name="kategori" id="field-kategori" data-id="{{ $post->kategori_id }}" data-text="{{ $post->kategori->nama }}"></select>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-lg-12">
                                <div class="content-heading mb-0 pt-0">Media Info</div>
                            </div>
                        </div>
                        <div class="row gutters-tiny items-push">
                            <label class="col-12">Thumbnail</label>
                            <div class="col-lg-12">
                                <div class="text-center mb-15">
                                    <img id="img_preview" src="{{ asset(empty($post->featured_img) ? "img/poster.png" : $post->featured_img) }}" width="100%">
                                </div>
                                <div class="btn btn-alt-primary btn-block">
                                    <input type="hidden" id="featured_img" name="featured_img" value="">
                                    <input type="file" class="file-upload" id="file-upload" accept="image/*">
                                    Pilih Foto
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END Default Elements -->
</div>
@include('include.modal_crop')
@stop

@push('scripts')
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.js"></script>
<script src="{{ asset('js/plugins/bootstrap-taginput/tagsinput.js') }}"></script><script src="{{ asset('js/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/admin/post/edit.js') }}"></script>
<script src="{{ asset('js/admin/seo_post.js') }}"></script>
@endpush
