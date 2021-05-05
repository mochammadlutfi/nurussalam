@extends('umum.layouts.master')
@section('styles')
@endsection

@section('content')
<div class="bg-primary">
    <div class="content overflow-hidden py-30 text-center">
        <div class="pt-50 pb-30">
            <h1 class="font-w700 text-white mb-10">Detail Berita</h1>
            <h2 class="h4 font-w400 text-white">{{ $post->judul }}</h2>
        </div>
    </div>
</div>
<div class="bg-white">
    <div class="content content-full">
        <div class="row">
            <div class="col-lg-8">
                <div class="post">
                    <div class="post-thumb">
                        <img src="{{ $post->featured_img_url }}" alt="{{ $post->judul }}" srcset="" width="100%">
                    </div>
                    <div class="post-title">
                        <h2 class="font-size-h3 mb-2">{{ $post->judul }}</h2>
                    </div>
                    <div class="meta-info">
                        <ul>
                            <li><a href="" class="badge badge-primary">{{ $post->kategori->nama }}</a></li>
                            <li><i class="fa fa-eye"></i> {{ $post->views }} Views  </li>
                            <li><i class="fa fa-calendar-alt"></i> {{ $post->dibuat }}</li>
                        </ul>
                    </div>
                    <div class="post-content nice-copy">
                        <?= $post->deskripsi; ?>
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-lg col">
                            <button type="button" class="btn btn-sm btn-social btn-tw btn-block" data-sharer="twitter" data-url="{{ route('post.detail', $post->slug) }}">
                                <i class="fab fa-twitter fa-2x"></i>
                            </button>
                        </div>
                        <div class="col-lg col">
                            <button type="button" class="btn btn-sm btn-social btn-fb btn-block" data-sharer="facebook" data-hashtag="hashtag" data-url="{{ route('post.detail', $post->slug) }}">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </button>
                        </div>
                        <div class="col-lg col">
                            <button type="button" class="btn btn-sm btn-social btn-in btn-block" data-sharer="linkedin" data-url="{{ route('post.detail', $post->slug) }}">
                                <i class="fab fa-linkedin-in fa-2x" data-fa-transform="grow-2"></i>
                            </button>
                        </div>
                        <div class="col-lg col">
                            <button type="button" class="btn btn-sm btn-social btn-wa btn-block" data-sharer="whatsapp" data-url="{{ route('post.detail', $post->slug) }}">
                                <i class="fab fa-whatsapp fa-2x" data-fa-transform="grow-2"></i>
                            </button>
                        </div>
                        <div class="col-lg col">
                            <button type="button" class="btn btn-sm btn-social btn-line btn-block" data-sharer="line" data-url="{{ route('post.detail', $post->slug) }}">
                                <i class="fab fa-line fa-2x" data-fa-transform="grow-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div id="disqus_thread"></div>
            </div>
            {{-- Sidebar --}}
            <div class="col-lg-4">
                <div class="block block-rounded block-shadow block-bordered">
                    <div class="block-header block-header-default">
                        <h3 class="block-title text-center">Find Us On</h3>
                    </div>
                    <div class="block-content py-15">
                        <a class="btn btn-alt-info btn-block" href="{{ settings()->get('social_facebook') }}">
                            <i class="fa fa-facebook mr-5"></i> Facebook
                        </a>
                        <a class="btn btn-alt-primary btn-block" href="{{ settings()->get('social_twitter') }}">
                            <i class="fa fa-twitter mr-5"></i> Twitter
                        </a>
                        <a class="btn btn-alt-danger btn-block" href="{{ settings()->get('social_youtube') }}">
                            <i class="fa fa-youtube mr-5"></i> Youtube
                        </a>
                        <a class="btn btn-alt-warning btn-block" href="{{ settings()->get('social_instagram') }}">
                            <i class="fa fa-instagram mr-5"></i> Instagram
                        </a>
                    </div>
                </div>
                @widget('popularPosts')
            </div>
            {{-- End Sidebar --}}
        </div>
    </div>
</div>
@stop
@push('scripts')
@endpush
