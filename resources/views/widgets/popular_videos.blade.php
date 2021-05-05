
<div class="block block-rounded block-shadow block-bordered">
    <div class="block-header block-header-default">
        <h3 class="block-title text-center">Berita Populer</h3>
    </div>
    <div class="block-content py-0">
        @foreach($popular as $p)
        <a class="block my-3" href="#">
            <div class="block-content p-0">
                <div class="row">
                    <div class="col-6">
                        <img src="{{ asset($p->thumbnail) }}" class="img-fluid">
                    </div>
                    <div class="col-6 px-0">
                        <h2 class="font-size-14-down-lg font-size-16 title">{{ $p->judul }}</h2>
                        <div class="text-muted font-w600 pt-1 font-size-12" href="javascript:void(0)">
                            <i class="fa fa-fw fa-calendar mr-5"></i> {{ $p->dibuat }}
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
