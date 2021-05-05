@extends('umum.layouts.master')

@section('styles')
@endsection
@section('content')
<!-- Inner Banner -->
<div class="bg-primary">
    <div class="content text-center">
        <div class="pt-50 pb-20">
            <h1 class="font-w700 mb-10 text-white">BERITA</h1>
            <h2 class="h4 font-w400 text-white">PONPES MODERN NURUSSALAM</h2>
        </div>
    </div>
</div>
<!-- banner end -->

<div class="bg-white">
    <div class="content content-full">
        <div class="row" id="post-list">
            @foreach($posts as $post)
            <div class="col-6 col-xl-4 px-2 d-flex align-items-stretch">
                <div class="post">
                    <div class="post-thumb p-0">
                        <a class="badge badge-primary category">
                            {{ $post->kategori->nama }}
                        </a>
                        <img src="{{ $post->featured_img_url }}" class="img-fluid"/>
                    </div>
                    <div class="post-title">
                        <h2>
                            <a href="{{ route('post.detail', $post->slug) }}">{{ $post->judul }}</a>
                        </h2>
                    </div>
                    <div class="post-tags my-2">
                        <ul>
                             <li><a href="#"><i class="si si-clock mr-1"></i> {{ ucwords($post->dibuat) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center py-10">
            {{ $posts->links('umum.post.pagination') }}
        </div>
    </div>
</div>
@stop
@push('scripts')

@endpush
