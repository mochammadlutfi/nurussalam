@extends('umum.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}" />
@endsection

@section('content')

<!-- Inner Banner -->
<div class="bg-primary">
    <div class="content text-center">
        <div class="pt-50 pb-20">
            <h1 class="font-w700 mb-10 text-white">KEGIATAN SANTRI</h1>
            <h2 class="h4 font-w400 text-white">PONPES MODERN NURUSSALAM</h2>
        </div>
    </div>
</div>
<!-- banner end -->

<!-- Content -->
<div class="bg-white">
    <div class="content content-full">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h2 class="font-w500 h3 text-center">Sekilas tentang kegiatan santri di pondok pesantren modern nurussalam.</h2>
                <h2 class="font-w500 h5 mb-1">Harian</h2>
                <table class="table table-bordered table-vcenter">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">NO</th>
                            <th>WAKTU</th>
                            <th>AKTIVITAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>04.00 - 04.15 WIB</td>
                            <td>Persiapan Shalat Subuh</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>04.15 - 05.00 WIB</td>
                            <td>Shalat Subuh Berjama’ah</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>05.00 - 05.30 WIB</td>
                            <td>Dzikir dan Pembacaan Surat Al-Waqi’ah</td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>05.30 – 06.40 WIB</td>
                            <td>Sarapan Pagi, Piket dan Persiapan Masuk Kelas</td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>06.40 – 07.00 WIB</td>
                            <td>Muhadatsah dan Masuk Kelas</td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>07.00 – 12.00 WIB</td>
                            <td>Kegiatan Belajar  Mengajar (KBM) Pagi</td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td>12.00 – 13.15 WIB</td>
                            <td>Shalat Dzuhur dan Makan Siang</td>
                        </tr>
                        <tr>
                            <td class="text-center">8</td>
                            <td>12.00 – 13.15 WIB</td>
                            <td>Kegiatan Belajar  Mengajar (KBM) Siang</td>
                        </tr>
                        <tr>
                            <td class="text-center">9</td>
                            <td>14.00 – 15.00 WIB</td>
                            <td>Istirahat (Tidur Siang)</td>
                        </tr>
                        <tr>
                            <td class="text-center">10</td>
                            <td>15.00 – 15.10 WIB</td>
                            <td>Persiapan Sholat Ashar</td>
                        </tr>
                        <tr>
                            <td class="text-center">11</td>
                            <td>15.10 – 15.45 WIB</td>
                            <td>Shalat Ashar berjama’ah</td>
                        </tr>
                        <tr>
                            <td class="text-center">12</td>
                            <td>15.45 – 17.00 WIB</td>
                            <td>Makan Sore dan Kegiatan Ekstrakulikuler</td>
                        </tr>
                        <tr>
                            <td class="text-center">13</td>
                            <td>17.00 – 17.30 WIB</td>
                            <td>Piket, Mandi Sore dan Persiapan Masuk Masjid</td>
                        </tr>
                        <tr>
                            <td class="text-center">14</td>
                            <td>17.30 – 18.00 WIB</td>
                            <td>Pembacaan Ratib</td>
                        </tr>
                        <tr>
                            <td class="text-center">15</td>
                            <td>18.00 – 18.30 WIB</td>
                            <td>Shalat Maghrib Berjama’ah</td>
                        </tr>
                        <tr>
                            <td class="text-center">16</td>
                            <td>18.30 – 19.45 WIB</td>
                            <td>Pengajian Al-Qur’an dan Kitab Kuning</td>
                        </tr>
                        <tr>
                            <td class="text-center">17</td>
                            <td>19.46 – 20.15 WIB</td>
                            <td>Shalat Isya Berjama’ah</td>
                        </tr>
                        <tr>
                            <td class="text-center">18</td>
                            <td>20.15 – 21.30 WIB</td>
                            <td>Belajar Malam dan Kursus</td>
                        </tr>
                        <tr>
                            <td class="text-center">19</td>
                            <td>21.30 – 22.15 WIB</td>
                            <td>Absensi Malam dan Pembacaan Do’a dan Zikir Sebelum Tidur</td>
                        </tr>
                        <tr>
                            <td class="text-center">8</td>
                            <td>22.15 – 04.00 WIB</td>
                            <td>Istirahat Tidur</td>
                        </tr>
                    </tbody> 
                </table>
                <h2 class="font-w500 h5 mb-1">Mingguan</h2>
                <table class="table table-bordered table-vcenter">
                    <thead class="thead-light">
                        <tr>
                            <th class="text-center">NO</th>
                            <th>HARI</th>
                            <th>WAKTU</th>
                            <th>AKTIVITAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>SENIN</td>
                            <td>20.15 - 21.30 WIB</td>
                            <td>Muhadloroh Bahasa Inggris</td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td>KAMIS</td>
                            <td>18.30 - 19.30 WIB</td>
                            <td>Pembacaan Yaasin, Maulid Diba dan Marhaba</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>KAMIS</td>
                            <td>02.00 - 03.00 WIB</td>
                            <td>Qiyamul Lail</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>KAMIS</td>
                            <td>18.30 – 19.00 WIB</td>
                            <td>Ziarah Kubur alm. KH. Nurdin (Pendiri Ponpes Modern Nurussalam)</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>SABTU</td>
                            <td>13.30 – 15.00 WIB</td>
                            <td>Muhadloroh Bahasa Arab</td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>SABTU</td>
                            <td>20.15 – 21.30 WIB</td>
                            <td>Muhadloroh Bahasa Indonesia</td>
                        </tr>
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script src="{{ asset('js/plugins/moment/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/i18n/id.js') }}"></script>
<script src="{{ asset('js/plugins/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/umum/ppdb/konfirmasi.js') }}"></script>

<script>
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

</script>
@endpush
