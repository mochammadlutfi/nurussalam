@php
    $i = 1;
@endphp
@forelse($data as $album)
<tr>
    <td>
        {{ $i++ }}
    </td>
    <td>
        <img class="img-fluid" src="{{ asset($album->foto) }}">
    </td>
    <td>
        <div class="font-size-16 font-w600">
            {{ $album->nama }}
            <div class="font-size-15">
                @if($album->status === 1)
                    <span class="badge badge-success">Publikasi</span>
                @else
                    <span class="badge badge-danger">Tidak Publikasi</span>
                @endif
            </div>
        </div>
    </td>
    <td class="d-none d-md-table-cell">
        {{ $album->views }}x
    </td>
    <td class="d-none d-md-table-cell">
        {{ $album->dibuat }}
    </td>
    <td>
        <div class="btn-group text-center" role="group">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="si si-wrench mr-1"></i>Aksi</button>
            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                <a class="dropdown-item" href="{{ route('admin.galeri.foto', $album->id) }}">
                    <i class="si si-plus mr-5"></i>Tambah Foto
                </a>
                <a class="dropdown-item btn-edit" href="javascript:void(0)" data-id="{{ $album->id }}">
                    <i class="si si-note mr-5"></i>Ubah Album
                </a>
                <a class="dropdown-item btn-hapus" href="javascript:void(0)" data-id="{{ $album->id }}">
                    <i class="si si-trash mr-5"></i>Hapus Album
                </a>
            </div>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="5">

    </td>
</tr>
@endforelse
