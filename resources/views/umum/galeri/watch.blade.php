@extends('umum.layouts.master')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/video.js@7.0.0/dist/video-js.min.css">
@endsection

@section('content')

<div class="bg-primary">
    <div class="content overflow-hidden py-30 text-center">
        <div class="pt-50 pb-30">
            <h1 class="font-w700 text-white mb-10">Detail Video</h1>
            <h2 class="h4 font-w400 text-white">{{ $data->judul }}</h2>
        </div>
    </div>
</div>
<div class="bg-white">
    <div class="content content-full">
        <div class="row">
            <div class="col-lg-8">
                <div class="video">
                    <div class="video-watch">
                        <video poster="{{ $data->thumbnail_url }}" class="video-js vjs-default-skin" preload="none" controls width=100% 
                            data-setup='{
                            "fluid": true,
                            "techOrder": ["youtube"],
                            "sources": [{
                                "type": "video/youtube",
                                "src": "{{ $data->url }}"
                            }],
                            "youtube": {
                                "iv_load_policy": 1
                            }}'>
                        </video>
                    </div>
                    <div class="post-title">
                        <h2 class="font-size-h3 mb-2">{{ $data->judul }}</h2>
                    </div>
                    {{-- <div class="meta-info">
                        <ul>
                            <li><a href="" class="badge badge-primary">{{ $post->kategori->nama }}</a></li>
                            <li><i class="fa fa-eye"></i> {{ $post->views }} Views  </li>
                            <li><i class="fa fa-calendar-alt"></i> {{ $post->dibuat }}</li>
                        </ul>
                    </div> --}}
                    <div class="post-content nice-copy">
                        <?= $data->deskripsi; ?>
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-lg col">
                            <button type="button" class="btn btn-sm btn-social btn-tw btn-block" data-sharer="twitter" data-url="{{ route('galeri.watch', $data->slug) }}">
                                <i class="fab fa-twitter fa-2x"></i>
                            </button>
                        </div>
                        <div class="col-lg col">
                            <button type="button" class="btn btn-sm btn-social btn-fb btn-block" data-sharer="facebook" data-hashtag="hashtag" data-url="{{ route('galeri.watch', $data->slug) }}">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </button>
                        </div>
                        <div class="col-lg col">
                            <button type="button" class="btn btn-sm btn-social btn-in btn-block" data-sharer="linkedin" data-url="{{ route('galeri.watch', $data->slug) }}">
                                <i class="fab fa-linkedin-in fa-2x" data-fa-transform="grow-2"></i>
                            </button>
                        </div>
                        <div class="col-lg col">
                            <button type="button" class="btn btn-sm btn-social btn-wa btn-block" data-sharer="whatsapp" data-url="{{ route('galeri.watch', $data->slug) }}">
                                <i class="fab fa-whatsapp fa-2x" data-fa-transform="grow-2"></i>
                            </button>
                        </div>
                        <div class="col-lg col">
                            <button type="button" class="btn btn-sm btn-social btn-line btn-block" data-sharer="line" data-url="{{ route('galeri.watch', $data->slug) }}">
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
</div>
@stop

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/video.js@7.0.0/dist/video.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-youtube/2.6.1/Youtube.min.js"></script>
<script>
    jQuery(document).ready(function () {
        // var player = videojs('vid1', {
        //     height: "400px";
        //     fluid: true,
        //     autoplay: false,
        //     controls: true,
        // });
    });
</script>
@endpush
