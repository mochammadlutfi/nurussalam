<div class="bg-white">
    <div class="content content-full">
        <div class="border-2x border-bottom mb-lg-4 pb-2">
            <div class="row">
                <div class="col-8">
                    <h2 class="font-w700 h4 mb-10">Berita Terbaru</h2>
                </div>
                <div class="col-4 text-right">
                    <a href="#" class="btn btn-primary">Berita Lainnya</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($posts as $post)
            <div class="col-6">
                <div class="post">
                    <div class="row no-gutters">
                        <div class="col-4">
                            <img src="{{ $post->featured_img_url }}" class="img-fluid">
                        </div>
                        <div class="col-6 px-3">
                            <div class="post-tags mb-1">
                                <ul class="mb-1">
                                    <li>
                                        <a class="badge badge-primary category p-2 text-white" href="#">
                                            {{ $post->kategori->nama }}
                                        </a>
                                    </li>
                                     <li><i class="si si-clock mr-1"></i> {{ ucwords($post->dibuat) }}</li>
                                </ul>
                            </div>
                            <div class="post-title">
                                <h2>
                                    <a href="{{ route('post.detail', $post->slug) }}">{{ $post->judul }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>