@forelse($data as $post)
<tr>
    <td>
        <div class="custom-control custom-checkbox mb-5">
            <input class="custom-control-input" type="checkbox" name="example-checkbox1" id="example-checkbox1" value="option1" >
            <label class="custom-control-label" for="example-checkbox1"></label>
        </div>
    </td>
    <td>
        <div class="font-size-16 font-w600">
            {{ $post->judul }}
        </div>
        <div class="font-size-15">
            {{ $post->kategori->nama }} |
            @if($post->status == 1)
                <span class="badge badge-success">Publikasi</span>
            @else
                <span class="badge badge-danger">Draft</span>
            @endif
        </div>
    </td>
    <td>
        {{ $post->views }}x
    </td>
    <td>
        {{ $post->dibuat }}
    </td>
    <td>
        <div class="btn-group text-center" role="group">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="si si-wrench mr-1"></i>Aksi</button>
            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                <a class="dropdown-item" href="{{ route('admin.post.edit', $post->id) }}">
                    <i class="si si-note mr-5"></i>Ubah Berita
                </a>
                <a class="dropdown-item" href="javascript:void(0)" onClick="hapus({{ $post->id}})">
                    <i class="si si-trash mr-5"></i>Hapus Berita
                </a>
            </div>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="5">
        <div class="text-center">
            <img class="img-fluid" src="{{ asset('assets/img/icon/not_found.png') }}">
            <div>
                <h3 class="font-size-24 font-w600 mt-3">Data Tidak Ditemukan</h3>
            </div>
        </div>
    </td>
</tr>
@endforelse
