@extends('umum.layouts.master')


@section('styles')

<link rel="stylesheet" href="{{ asset('js/plugins/magnific-popup/magnific-popup.css') }}">
<style>
    @media(min-width:360px){
        .block-columns {
            column-count: 1;
        }
    }
    @media(min-width:360px){
        .block-columns {
            column-count: 1;
        }
    }
    @media(min-width:360px){
        .block-columns {
            column-count: 1;
        }
    }
    @media(min-width:360px){
        .block-columns {
            column-count: 1;
        }
    }
</style>
@endsection
@section('content')
<div class="bg-primary">
    <div class="content overflow-hidden py-30 text-center">
        <div class="pt-50 pb-30">
            <h1 class="font-w700 text-white mb-10">Album Foto</h1>
            <h2 class="h4 font-w400 text-white">{{ $album->nama }}</h2>
        </div>
    </div>
</div>
<div class="content content-full">
    @if($data->count() > 1)
    <div class="gal-masonry">
        @foreach($data as $f)
        <div class="animated fadeIn mb-10">
            <a class="img-link img-link-zoom-in img-lightbox" href="{{ asset($f->path) }}">
                <img class="img-fluid" src="{{ asset($f->path) }}" alt="">
            </a>
        </div>
        @endforeach
    </div>
    <input type="hidden" id="current_page" value="1">
    @else
    <div class="block block-bordered block-shadow block-rounded" id="empty">
        <div class="block-content">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <img class="img-fluid" src="{{ asset('img/icon/doc_empty.png') }}">
                    <div class="mb-15">
                        <h3 class="font-size-24 font-w600 mt-3">Foto Tidak Ditemukan</h3>
                        <a class="btn btn-primary btn-lg px-50" href="{{ route('galeri.foto') }}">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row justify-content-center d-none" id="loading">
        <div class="col-lg-6 text-center pb-100">
            <div class="spinner-border text-primary wh-50" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>

@stop
@push('scripts')
<script src="{{ asset('js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/umum/galeri.js') }}"></script>
@endpush
