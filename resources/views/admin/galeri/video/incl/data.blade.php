@php
    $i = 1;
@endphp
@forelse($data as $video)
<tr>
    <td>
        {{ $i++ }}
    </td>
    <td>
        <img class="img-fluid" src="{{ asset($video->thumbnail) }}">
    </td>
    <td>
        <div class="font-size-16 font-w600">
            {{ $video->judul }}
            <div class="font-size-15">
                @if($video->status === 1)
                    <span class="badge badge-success">Publikasi</span>
                @else
                    <span class="badge badge-danger">Tidak Publikasi</span>
                @endif
            </div>
        </div>
    </td>
    <td class="d-none d-md-table-cell">
        {{ $video->views }}x
    </td>
    <td class="d-none d-md-table-cell">
        {{ $video->dibuat }}
    </td>
    <td>
        <div class="btn-group text-center" role="group">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="btnGroupVerticalDrop3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="si si-wrench mr-1"></i>Aksi</button>
            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 34px, 0px);">
                <a class="dropdown-item btn-edit" href="{{ route('admin.video.edit', $video->id) }}">
                    <i class="si si-note mr-5"></i>Ubah Video
                </a>
                <a class="dropdown-item btn-hapus" href="javascript:void(0)" data-id="{{ $video->id }}">
                    <i class="si si-trash mr-5"></i>Hapus Video
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
