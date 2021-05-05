
<div class="bg-primary">
    <div class="content content-full">
        <div class="row pt-30 pb-10 justify-content-center">
            <div class="homeSlide">
                @foreach($data as $d)
                <div class="slide">
                    <a href="#">
                        <img class="img-fluid rounded" src="{{ asset($d->img) }}" width="728px"/>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
