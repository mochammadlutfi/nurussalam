@if($data->count() >= 1)
    @foreach($posts as $post)
    <div class="col-md-6 col-xl-4 px-3">
        <div class="block block-rounded block-shadow block-bordered">
            <div class="block-content block-content-full bg-image min-height-175 flex-grow-0" style="background-image: url('{{ getFeaturedImg($post->featured_img) }}');">
                <a class="badge badge-primary font-w700 p-2 text-uppercase" href="{{ route('post.detail', $post->slug) }}">
                    {{ $post->kategori->nama }}
                </a>
            </div>
            <div class="block-content flex-grow-1 border-bottom py-15">
                <h2 class="font-size-14-down-lg font-size-20 mb-5" style="min-height: 43px;">
                    <a class="text-dark" href="{{ route('post.detail', $post->slug) }}">
                        {{ $post->judul }}
                    </a>
                </h2>
            </div>
            <div class="block-content py-15 flex-grow-0">
                <div class="row no-gutters font-size-sm text-center">
                    <div class="col-4">
                        <a class="text-muted font-w600" href="javascript:void(0)">
                            <i class="fa fa-fw fa-eye mr-5"></i> {{ $post->views }}
                        </a>
                    </div>
                    <div class="col-4">
                        <a class="text-muted font-w600" href="javascript:void(0)">
                            <i class="fa fa-fw fa-heart mr-5"></i> 300
                        </a>
                    </div>
                    <div class="col-4">
                        <a class="text-muted font-w600" href="javascript:void(0)">
                            <i class="fa fa-fw fa-comments mr-5"></i> 750
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row justify-content-center py-10">
        {{ $data->links() }}
    </div>
@else
<div class="block block-rounded block-shadow block-bordered">
    <div class="block-content">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <img class="img-fluid" src="{{ asset('assets/img/icon/not_found.png') }}">
                <div>
                    <h3 class="font-size-24 font-w600 mt-3">Berita Tidak Ditemukan!</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endif