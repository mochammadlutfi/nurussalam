@extends('umum.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/components/portfolio-galleries.css') }}">
@endsection

@section('content')
<!-- Inner Banner -->
<div class="bg-primary pt-50">
    <div class="content overflow-hidden py-30 text-center">
        <div class="pb-30">
            <h1 class="font-w700 text-white mb-10">Galeri Video</h1>
        </div>
    </div>
</div>
<!-- banner end -->

<div class="bg-white">
    
    <div class="content content-full">
        <div class="row">
            @foreach($video as $g)
                <div class="col-lg-4">
                    <a class="block block-shadow block-rounded block-link-pop" href="{{ route('galeri.watch', $g->slug) }}">
                        <div class="block-content flex-grow-1 p-0">
                            <img src="{{ $g->thumbnail_url }}" class="img-fluid"/>
                        </div>
                        <div class="block-content p-3 flex-grow-0">
                            <h2 class="gal-title font-size-14-down-lg font-size-20 ">{{ $g->judul }}</h2>
                            <div class="row font-size-sm pt-2">
                                <div class="col-lg-4">
                                    {{-- <div class="text-muted font-w600" href="javascript:void(0)">
                                        <i class="fa fa-fw fa-eye mr-5"></i> {{ $g->views }}
                                    </div> --}}
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
            {{ $video->links('umum.galeri.pagination') }}
        </div>
    </div>
</div>


<!-- Blog -->


{{-- <section class="section-md bg-white pt-md-70 pb-md-40 pt-sm-50 pb-sm-20 pt-xs-40 pb-xs-10">
    <div class="container">
        <div class="row">
            @forelse($video as $data)
            <div class="col-lg-4">
                <div class="video-box blog-style-2 mb-4 p-1">
                    <div class="video-thumbnail">
                        <img src="{{ $data->thumbnail_url }}" class="img-fluid" alt="{{ $data->judul }}">
                    </div>
                    <div class="video-content px-1 py-1">
                        <h4 class="video-box-title"><a href="{{ route('galeri.watch', $data->slug) }}">{{  $data->judul }}</a></h4>
                        <div class="video-date">
                            <i class="fa fa-calendar"></i>
                            {{ $data->dibuat }}
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-lg-6">
                    <img src="{{ asset('img/placeholder/data_not_found.png') }}" class="img-fluid">
                </div>
            @endforelse
        </div>
    </div>
</section> --}}
@stop

@push('scripts')
@endpush
