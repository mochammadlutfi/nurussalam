@extends('ppdb.layouts.master')

@section('styles')
@endsection

@section('content')

<div class="bg-primary">
    <div class="content overflow-hidden py-30 text-center">
        <div class="pt-50 pb-30">
            <h1 class="font-w600 text-white mb-1">BIAYA PENDAFTARAN</h1>
        </div>
    </div>
</div>


<div class="bg-white">
    <div class="content content-full">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th colspan="2">BIAYA PENDAFTARAN PUTRA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>BIAYA AWAL</td>
                            <td>Rp 5.400.000</td>
                        </tr>
                        <tr>
                            <td>BIAYA PERLENGKAPAN PUTRA</td>
                            <td>Rp 2.150.000</td>
                        </tr>
                        <tr class="font-w700">
                            <td>TOTAL</td>
                            <td>Rp 7.550.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th colspan="2">BIAYA PENDAFTARAN PUTRI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>BIAYA AWAL</td>
                            <td>Rp 5.400.000</td>
                        </tr>
                        <tr>
                            <td>BIAYA PERLENGKAPAN PUTRA</td>
                            <td>Rp 2.230.000</td>
                        </tr>
                        <tr class="font-w700">
                            <td>TOTAL</td>
                            <td>Rp 7.630.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white text-center text-uppercase">
                        <tr>
                            <th colspan="3">RINCIAN BIAYA AWAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="font-w700 text-center">
                            <td>URAIAN</td>
                            <td>SMP/SMA</td>
                            <td>KETERANGAN</td>
                        </tr>
                        <tr>
                            <td>FORMULIR PENDAFTARAN</td>
                            <td>Rp 200.000</td>
                            <td>1x Bayar</td>
                        </tr>
                        <tr>
                            <td>BIAYA PENGEMBANGAN PESANTREN</td>
                            <td>Rp 3.000.000</td>
                            <td>1x Bayar</td>
                        </tr>
                        <tr>
                            <td>BIAYA KHUTBATUL-ARSYI</td>
                            <td>Rp 250.000</td>
                            <td>1 Tahun</td>
                        </tr>
                        <tr>
                            <td>Biaya POSKESTREN</td>
                            <td>Rp 300.000</td>
                            <td>1 Tahun</td>
                        </tr>
                        <tr>
                            <td>BIAYA OPPN</td>
                            <td>Rp 300.000</td>
                            <td>1 Semester</td>
                        </tr>
                        <tr>
                            <td>BIAYA KURSUS KOMPUTER</td>
                            <td>Rp 300.000</td>
                            <td>1 Semester</td>
                        </tr>
                        <tr>
                            <td>BIAYA KURSUS BAHASA</td>
                            <td>Rp 300.000</td>
                            <td>1 Semester</td>
                        </tr>
                        <tr>
                            <td>BIAYA SYAHRIAH</td>
                            <td>Rp 300.000</td>
                            <td>1 Semester</td>
                        </tr>
                        <tr class="font-w700">
                            <td>TOTAL</td>
                            <td colspan="2">Rp 5.400.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th colspan="2">RINCIAN BIAYA PERLENGKAPAN PUTRA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="font-w700 text-center">
                            <td>URAIAN</td>
                            <td>SMP/SMA</td>
                        </tr>
                        <tr>
                            <td>BIAYA BUKU PESANTREN</td>
                            <td>Rp 550.000</td>
                        </tr>
                        <tr>
                            <td>BIAYA SERAGAM SEKOLAH PUTRA</td>
                            <td>Rp 700.000</td>
                        </tr>
                        <tr>
                            <td>LEMARI</td>
                            <td>Rp 600.000</td>
                        </tr>
                        <tr>
                            <td>KASUR</td>
                            <td>Rp 300.000</td>
                        </tr>
                        <tr class="font-w700">
                            <td>TOTAL</td>
                            <td>Rp 2.150.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th colspan="2">RINCIAN BIAYA PERLENGKAPAN PUTRI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="font-w700 text-center">
                            <td>URAIAN</td>
                            <td>SMP/SMA</td>
                        </tr>
                        <tr>
                            <td>BIAYA BUKU PESANTREN</td>
                            <td>Rp 550.000</td>
                        </tr>
                        <tr>
                            <td>BIAYA SERAGAM SEKOLAH PUTRA</td>
                            <td>Rp 780.000</td>
                        </tr>
                        <tr>
                            <td>LEMARI</td>
                            <td>Rp 600.000</td>
                        </tr>
                        <tr>
                            <td>KASUR</td>
                            <td>Rp 300.000</td>
                        </tr>
                        <tr class="font-w700">
                            <td>TOTAL</td>
                            <td>Rp 2.230.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white text-center text-uppercase">
                        <tr>
                            <th colspan="3">RINCIAN BIAYA SYAHRIAH (BULANAN)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="font-w700 text-center">
                            <td>URAIAN</td>
                            <td>SMP/SMA</td>
                        </tr>
                        <tr>
                            <td>BIAYA MAKAN 3X SEHARI</td>
                            <td>Rp 550.000</td>
                        </tr>
                        <tr>
                            <td>BIAYA ASRAMA (LISTRIK & AIR)</td>
                            <td>Rp 200.000</td>
                        </tr>
                        <tr class="font-w700">
                            <td>TOTAL</td>
                            <td>Rp 750.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th colspan="2">RINCIAN SERAGAM SEKOLAH PUTRA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PECI</td>
                        </tr>
                        <tr>
                            <td>BATIK</td>
                        </tr>
                        <tr>
                            <td>BET 2 SET</td>
                        </tr>
                        <tr>
                            <td>DASI 2 PCS</td>
                        </tr>
                        <tr>
                            <td>KEMEJA PUTIH</td>
                        </tr>
                        <tr>
                            <td>CELANA HITAM</td>
                        </tr>
                        <tr>
                            <td>CELANA BIRU/ABU-ABU</td>
                        </tr>
                        <tr>
                            <td>PAKAIAN OLAHRAGA</td>
                        </tr>
                        <tr>
                            <td>JUBAH</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th colspan="2">RINCIAN SERAGAM SEKOLAH PUTRI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>KERUDUNG</td>
                        </tr>
                        <tr>
                            <td>BATIK</td>
                        </tr>
                        <tr>
                            <td>BET 2 SET</td>
                        </tr>
                        <tr>
                            <td>KEMEJA PUTIH</td>
                        </tr>
                        <tr>
                            <td>ROK HITAM</td>
                        </tr>
                        <tr>
                            <td>ROK BIRU/ABU-ABU</td>
                        </tr>
                        <tr>
                            <td>PAKAIAN OLAHRAGA</td>
                        </tr>
                        <tr>
                            <td>GAMIS</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('scripts')
@endpush
