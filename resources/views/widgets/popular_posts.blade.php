<div class="widget-category list-category-1-item py-lg-4">
    <h3 class="font-w700 font-size-h3 mb-15">
        Berita Populer
    </h3>
    @foreach($popular as $p)
    <a class="block bg-image d-flex flex-column text-center" href="{{ route('post.detail', $p->slug) }}" style="background-image: url('{{ asset($p->featured_img_url) }}');" href="javascript:void(0)">
        <div class="block-content bg-black-op flex-grow-1 p-0">
            <div class="align-items-sm-center d-sm-flex justify-content-sm-between m-2 p-2">
                <span class="badge badge-primary font-w700 p-2 text-uppercase">
                    {{ $p->kategori->nama }}
                </span>
                <p class="font-size-sm">
                    <span class="text-white font-w600 mr-5">
                        <i class="fa fa-fw fa-eye text-white-50"></i> {{ $p->views }}
                    </span>
                </p>
            </div>
            <h5 class="text-white font-w700 mb-5 mt-50">
                {{ $p->judul }}
            </h5>
            <p class="font-w600 text-white-op">
                {{ $p->dibuat }}
            </p>
        </div>
    </a>
    @endforeach
</div>
