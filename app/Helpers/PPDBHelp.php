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

if (!function_exists('has_paid')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function has_paid()
    {
        $ppdb = PPDB::where('peserta_id', auth()->guard('web')->user()->id)->first();
        if($ppdb)
        {
            // return PPDBBayar::where('ppdb_id', $ppdb->id)->exists();
            return true;
        }else{
            return false;
        }

    }
}
