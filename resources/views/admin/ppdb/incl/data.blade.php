@forelse($data as $d)
<div class="block block-rounded block-shadow block-bordered mb-5">
    <div class="block-content py-10">
        <div class="row">
            <div class="col-6">
                <strong>#{{ $d->kd_registrasi }}</strong>
            </div>
            <div class="col-6 text-right">
                {{-- <i class="si si-calendar mr-3"></i><strong>{{ $d->tgl }}</strong> --}}
            </div>
        </div>
    </div>
    <div class="block-content bg-body-light py-10">
        <div class="row">
            <div class="col-6">
                <div class="anggota">
                    <div>{{ $d->nik }}</div>
                    <div>{{ $d->nama }}</div>
                    <div></div>
                </div>
            </div>
            <div class="col-6">
                <div class="anggota">
                    {{-- <i class="si si-people mr-5"></i> {{ $d->anggota()->count() }} Orang --}}
                </div>
                <div class="anggota">
                    {{-- <i class="fa fa-map-marked-alt mr-5"></i> {{ $d->user->dari }} --}}
                </div>
            </div>
        </div>
    </div>
    <div class="block-content py-10">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-8 text-right">
                {{-- <a href="{{ route('admin.kunjungan.detail', $d->no_kunjungan) }}" class="btn btn-outline-primary btn-sm">
                    <i class="si si-eye"></i>
                    Detail
                </a> --}}
            </div>
        </div>
    </div>
</div>
@empty
<div class="block block-rounded block-shadow block-bordered">
    <div class="block-content">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <img class="img-fluid" src="{{ asset('img/icon/not_found.png') }}">
                <div>
                    <h3 class="font-size-24 font-w600 mt-3">Tidak Ada Data Kunjungan</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endforelse
