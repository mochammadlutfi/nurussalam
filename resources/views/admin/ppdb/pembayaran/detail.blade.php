@extends('admin.layouts.master')

@section('styles')
@endsection

@section('content')

<div class="content">
    <div class="content-heading pt-3 mb-3 d-none d-md-block">
        Detail Pendaftaran
        @if($data->status === 0)
        <span class="badge badge-danger">Belum Dikonfirmasi</span>
        <button class="btn btn-primary float-right" id="btn-confirm" type="button" data-id="{{ $data->id }}">Konfirmasi Pembayaran</button>
        @elseif($data->status === 1)
        <span class="badge badge-success">Sudah Dikonfirmasi</span>
        @endif
    </div>
    <div class="block block-rounded block-bordered block-shadow mb-lg-0">
        <div class="block-content py-lg-3">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="mb-3 row">
                        <div class="col-12">
                            <div class="font-size-18 font-weight-bold">
                                Informasi Pembayaran
                            </div>
                            <hr class="border-bottom my-1"/>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">No. Pendaftaran</label>
                        <div class=" col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->ppdb->kd_registrasi }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Bank Tujuan</label>
                        <div class=" col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->tujuan->bank }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Bank Pengirim</label>
                        <div class=" col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->pengirim_bank }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">No Rekening Pengirim</label>
                        <div class=" col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->pengirim_rek }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Nominal</label>
                        <div class=" col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->jumlah }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-6 col-lg-4 mb-0 font-size-18 font-size-14-down-lg ">Tanggal Pembayaran</label>
                        <div class=" col-6 col-lg-8">
                            <div class="form-control-plaintext text-left py-0 font-size-18 font-size-14-down-lg ">
                                :
                                {{ $data->tgl_bayar_frm }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="mb-3 row">
                        <div class="col-12">
                            <div class="font-size-18 font-weight-bold">
                                Bukti Pembayaran
                            </div>
                            <hr class="border-bottom my-1"/>
                        </div>
                    </div>
                    <img src="{{ asset($data->bukti) }}" class="img-fluid">
                </div>

            </div>
        </div>
    </div>
</div>

@stop
@push('scripts')
<script>
    jQuery(function() {
        $('#btn-confirm').on('click', function(){
            id = $(this).attr('data-id');
            Swal.fire({
                title: "Anda Yakin?",
                text: "Data Yang Dihapus Tidak Akan Bisa Dikembalikan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Tidak, Batalkan!',
                reverseButtons: true,
                allowOutsideClick: false,
                confirmButtonColor: '#12b651',
                cancelButtonColor: '#af1310',
            })
            .then((result) => {
                if (result.value) {
                $.ajax({
                    url: laroute.route('admin.ppdb.bayar.confirm', { id: id }),
                    type: "GET",
                    dataType: "JSON",
                    beforeSend: function(){
                        Swal.fire({
                            title: 'Tunggu Sebentar...',
                            text: ' ',
                            imageUrl: laroute.url('public/img/loading.gif', ['']),
                            showConfirmButton: false,
                            allowOutsideClick: false,
                        });
                    },
                    beforeSend: function(){
                        Swal.fire({
                            title: 'Tunggu Sebentar...',
                            text: ' ',
                            imageUrl: laroute.url('public/img/loading.gif', ['']),
                            showConfirmButton: false,
                            allowOutsideClick: false,
                        });
                    },
                    success: function() {
                        Swal.fire({
                            title: "Berhasil",
                            text: 'Pembayaran Berhasil Dikonfirmasi!',
                            timer: 3000,
                            showConfirmButton: false,
                            icon: 'success'
                        });
                        location.reload();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });
                } else {
                    window.setTimeout(function(){
                        location.reload();
                    } ,1500);
                }
            });
        });
    });

</script>
@endpush
