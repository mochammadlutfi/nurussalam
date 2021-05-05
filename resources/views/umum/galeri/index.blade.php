@extends('umum.layouts.master')

@section('styles')
<style>
    .gal-title {
        margin-bottom: 4px;
            max-width: 100%;
            max-height: 100%;
            text-overflow: ellipsis;
            overflow: hidden;
            white-space: pre-wrap;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
</style>
@endsection

@section('content')
<div class="bg-primary pt-50">
    <div class="content overflow-hidden py-30 text-center">
        <div class="pb-30">
            <h1 class="font-w700 text-white mb-10">Galeri Foto</h1>
        </div>
    </div>
</div>
<div class="bg-white">
    
<div class="content content-full">
    <div class="row">
        @foreach($galeri as $g)
            <div class="col-lg-4">
                <a class="block block-shadow block-rounded block-link-pop" href="{{ route('galeri.detail', $g->slug) }}">
                    <div class="block-content flex-grow-1 p-0">
                        <img src="{{ $g->thumbnail_url }}" class="img-fluid"/>
                    </div>
                    <div class="block-content p-3 flex-grow-0">
                        <h2 class="gal-title font-size-14-down-lg font-size-20 ">{{ $g->title }}</h2>
                        <div class="row font-size-sm pt-2">
                            <div class="col-lg-4">
                                <div class="text-muted font-w600" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-eye mr-5"></i> {{ $g->views }}
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="text-muted font-w600 text-right" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-calendar mr-5"></i> {{ $g->dibuat }}
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center py-10">
        {{ $galeri->links('umum.galeri.pagination') }}
    </div>
</div>
</div>
@stop

@push('scripts')

@endpush
