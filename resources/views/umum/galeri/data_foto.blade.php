


@foreach($data as $f)
<div class="col-lg-3 col-6 grid-item">
    <div class="block block-rounded block-shadow">
        <div class="block-content p-0">
            <div class="animated fadeIn">
                <div class="options-container">
                    <img class="img-fluid options-item" src="{{ asset($f->path) }}" alt="">
                    <div class="options-overlay">
                        <div class="options-overlay-content">
                            <a class="btn btn-sm btn-rounded btn-noborder btn-alt-primary min-width-75 img-lightbox" href="{{ asset($f->path) }}">
                                <i class="fa fa-search-plus"></i> Lihat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
