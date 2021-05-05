@extends('admin.layouts.master')

@section('content')
<div class="content">
    <div class="row invisible" data-toggle="appear">
        <!-- Row #1 -->
        <div class="col-6 col-md-3 col-xl-3">
            <a class="block text-center block-shadow block-bordered" href="{{ route('admin.post') }}">
                <div class="block-content ribbon ribbon-left ribbon-bookmark ribbon-primary">
                    <div class="ribbon-box">{{ $data['berita'] }}</div>
                    <p class="mt-5">
                        <i class="si si-book-open fa-3x"></i>
                    </p>
                    <p class="font-w600">Total Berita</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-xl-3">
            <a class="block text-center block-shadow block-bordered" href="{{ route('admin.post.tambah') }}">
                <div class="block-content ribbon ribbon-left ribbon-bookmark ribbon-primary">
                    <p class="mt-5">
                        <i class="si si-plus fa-3x"></i>
                    </p>
                    <p class="font-w600">Tambah Berita</p>
                </div>
            </a>
        </div>


        <div class="col-6 col-md-3 col-xl-3">
            <a class="block text-center block-shadow block-bordered" href="#">
                <div class="block-content ribbon ribbon-left ribbon-bookmark ribbon-primary">
                    <div class="ribbon-box">{{ $data['ppdb'] }}</div>
                    <p class="mt-5">
                        <i class="fa fa-gavel fa-3x"></i>
                    </p>
                    <p class="font-w600">Total PPDB</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-3 col-xl-3">
            <a class="block text-center block-shadow block-bordered" href="#">
                <div class="block-content ribbon ribbon-left ribbon-bookmark ribbon-primary">
                    <p class="mt-5">
                        <i class="si si-plus fa-3x"></i>
                    </p>
                    <p class="font-w600">Pembayaran</p>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-12 col-md-8 col-sm-12 col-12">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">
                        Pengunjung Sikawan <small>Bulan Ini</small>
                    </h3>
                </div>
                <div class="block-content block-content-full">
                    <div class="pull-all">
                        <canvas id="revenue"></canvas>
                    </div>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                            <h4 class="font-size-20"> Total Unique Visitor :
                                {{ number_format($data['totalUniqueVisitors']) }}</h4>
                            <h4 class="font-size-20"> Total Unique Visits :
                                {{ number_format($data['totalUniqueVisits']) }}</h4>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <h2 class="font-weight-normal mb-3 font-size-h4">
                                <span>{{number_format($data['totalVisits']->count())}}</span> </h2>
                            <div class="mb-0 mt-3 legend-item">
                                <span class="fa-xs text-primary mr-1 legend-title "><i
                                        class="fas fa-fw fa-square-full"></i></span>
                                <span class="legend-text">{{ __('total_visits') }}</span>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                            <h2 class="font-weight-normal mb-3 font-size-h4">
                                <span>{{ number_format($data['totalVisitors']) }}</span>
                            </h2>
                            <div class="text-muted mb-0 mt-3 legend-item">
                                <span class="fa-xs text-secondary mr-1 legend-title"><i
                                        class="fas fa-fw fa-square-full"></i></span><span
                                    class="legend-text">Total Pengunjung</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end reveune  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- total sale  -->
        <!-- ============================================================== -->
        <div class="col-xl-4 col-lg-12 col-md-4 col-sm-12 col-12">
            <div class="block">
                <div class="block-header">
                    <h3 class="block-title">
                        Penggunaan Browser <small>Bulan Ini</small>
                    </h3>
                </div>
                <div class="block-content block-content-full">
                    <canvas id="total-sale" width="220" height="155"></canvas>
                    <div class="chart-widget-list">
                        @php
                        $browserNames = [];
                        $browserCounts = [];
                        $browserColors = [];
                        @endphp
                        @foreach($data['usageBrowsers'] as $key => $browser)

                        @php
                        $browserNames[] = '"'.$key.'"';
                        $browserCounts[] = '"'.$browser->count().'"';
                        $browserColors[] = '"#'.substr(uniqid(),-6).'"';
                        @endphp

                        <p>
                            <span class="fa-xs text-primary mr-1 legend-title"></span><span class="legend-text">
                                {{$key}}</span>
                            <span class="float-right">{{ number_format($browser->count()) }}</span>
                        </p>

                        @endforeach



                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end total sale  -->
        <!-- ============================================================== -->
    </div>

</div>
@stop
@push('scripts')
<script src="{{ asset('js/plugins/chartjs/Chart.bundle.min.js') }}"></script>
<script>
    var ctx = document.getElementById('revenue').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [ {{ $data['dates'] }} ],
            datasets: [{
                label: 'Dikunjungi',
                data: [{{ $data['visits'] }}],
                backgroundColor: "rgba(89, 105, 255,0.5)",
                borderColor: "rgba(89, 105, 255,0.7)",
            }, {
                label: 'Pengunjung',
                data: [ {{ $data['visitors'] }}],
                backgroundColor: "rgba(255, 64, 123,0.5)",
                borderColor: "rgba(255, 64, 123,0.7)",
            }]
        },
    });

    // ==============================================================
    // Total Sale
    // ==============================================================

    @php
    $browserNames = implode(',', $browserNames);
    $browserCounts = implode(',', $browserCounts);
    $browserColors = implode(',', $browserColors);
    @endphp

    var ctx = document.getElementById("total-sale").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [ {!! $browserNames !!} ],
            datasets: [{
                backgroundColor: [{!! $browserColors !!}],
                data: [{!! $browserCounts !!}]
            }]
        },
        options: {
            legend: {
                display: false

            }
        }

    });


    // ==============================================================
    // Location Map
    // ==============================================================

</script>
@endpush
