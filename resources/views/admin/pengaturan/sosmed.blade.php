@extends('admin.pengaturan.index')

@section('pengaturan_content')
<div class="block block-rounded block-shadow block-bordered">
    <form id="form-sosmed" method="post" onsubmit="return false;">
    @csrf
        <div class="block-header block-header-default">
            <h3 class="block-title">Pengaturan Social Media</h3>
            <div class="block-options">
                <button type="submit" class="btn btn-alt-primary btn-rounded">
                    <i class="si si-paper-plane mr-3"></i>Simpan
                </button>
            </div>
        </div>
        <div class="block-content pb-15">
            <div class="form-group row">
                <label class="col-4" for="social_facebook">Facebook Page URL</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="social_facebook" name="social_facebook" placeholder="Masukan Facebook URL" value="{{ settings()->get('social_facebook') }}">
                    <div class="invalid-feedback" id="error-social_facebook">Invalid feedback</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4" for="social_instagram">Instagram URL</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="social_instagram" name="social_instagram" placeholder="Masukan Instagram URL" value="{{ settings()->get('social_instagram') }}">
                    <div class="invalid-feedback" id="error-social_instagram">Invalid feedback</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4" for="social_youtube">Youtube Channel URL</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="social_youtube" name="social_youtube" placeholder="Masukan Youtube Channel URL" value="{{ settings()->get('social_youtube') }}">
                    <div class="invalid-feedback" id="error-social_youtube">Invalid feedback</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4" for="social_twitter">Twitter URL</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="social_twitter" name="social_twitter" placeholder="Masukan Twitter URL" value="{{ settings()->get('social_twitter') }}">
                    <div class="invalid-feedback" id="error-social_twitter">Invalid feedback</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-4" for="social_linkedin">LinkedIn URL</label>
                <div class="col-8">
                    <input type="text" class="form-control" id="social_linkedin" name="social_linkedin" placeholder="Masukan Linkedin URL" value="{{ settings()->get('social_linkedin') }}">
                    <div class="invalid-feedback" id="error-social_linkedin">Invalid feedback</div>
                </div>
            </div>
        </div>
    </form>
</div>
@stop
@push('scripts')
<script src="{{ asset('assets/js/pages/pengaturan.js') }}"></script>
@endpush
