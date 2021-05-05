
<div class="bg-white">
    <div class="content content-full">
        <div class="position-relative">
            <h2 class="font-w700 text-center font-size-18 mb-10">FRAKSI-FRAKSI</h2>
        </div>
        <div class="row text-center">
            @foreach($data as $d)
            <div class="col py-30 js-appear-enabled animated bounceIn" data-toggle="appear" data-class="animated bounceIn">
                <a class="" href="#">
                    <img src="{{ asset($d->logo) }}" class="img-fluid" alt="{{ $d->nama }}" title="{{ $d->nama }}">
                </a>
                {{-- <div class="font-w600">Passion</div> --}}
            </div>
            @endforeach
        </div>
    </div>
</div>