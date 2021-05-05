<?php
use Carbon\Carbon;
use App\Models\PPDB;
use App\Models\PPDBBayar;
if (!function_exists('get_kd_register')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function get_kd_register()
    {
        $q = PPDB::select(DB::raw('MAX(RIGHT(kd_registrasi,4)) AS kd_max'));
        if($q->count() > 0){
            foreach($q->get() as $k){
                return Carbon::now()->format('Ymd').sprintf("%04s", abs(((int)$k->kd_max) + 1));
            }
        }else{
            return Carbon::now()->format('Ymd').sprintf("%04s", 1);
        }
    }
}

if (!function_exists('get_status_kunjungan')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function get_status_kunjungan($status)
    {
        if(auth()->guard('admin')->check())
        {
            if($status == 'diproses')
            {
                $re = '<div class="badge badge-warning float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }else if($status == 'disetujui' ||  $status == 'kabag')
            {
                $re = '<div class="badge badge-success float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }else if($status == 'ditolak')
            {
                $re = '<div class="badge badge-danger float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }if($status == 'selesai')
            {
                $re = '<div class="badge badge-primary float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }
        }

        return $re;
    }
}

if (!function_exists('kunjungan_status')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function kunjungan_status($status)
    {
        if(auth()->guard('web')->check())
        {
            if($status == 'diproses' ||  $status == 'kabag')
            {
                $re = '<div class="badge badge-warning float-lg-left float-right font-size-14-down-lg font-size-20 py-2">Diproses</div>';
            }else if($status == 'disetujui')
            {
                $re = '<div class="badge badge-success float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }else if($status == 'ditolak')
            {
                $re = '<div class="badge badge-danger float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }if($status == 'selesai')
            {
                $re = '<div class="badge badge-primary float-lg-left float-right font-size-14-down-lg font-size-20 py-2">
                   '. ucwords($status) .'
                </div>';
            }
        }

        return $re;
    }
}

if (!function_exists('has_paid')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function has_paid()
    {
        $ppdb_id = auth()->guard('web')->user()->ppdb->id;

        return PPDBBayar::where('ppdb_id', $ppdb_id)->exists();
    }
}
