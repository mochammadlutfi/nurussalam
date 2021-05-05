<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Carbon\Carbon;


class PPDB extends Model
{

    protected $table = 'ppdb';

    protected $fillable =[
        'kd_registrasi', 'nama', 'email', 'alamat', 'tmp_lahir', 'tgl_lahir', 'asal_sekolah', 'NIK', 'wali_nama', 'wali_phone', 'ijazah', 'akta_kelahiran', 'wali_ktp', 'skkb', 'swab', 'wali_id', 'rekening_id', 'status'
    ];

    protected $appends = [
        'tgl_daftar', 'status_badge'
    ];

    public function bayar()
    {
        return $this->hasOne('App\Models\PPDBBayar', 'ppdb_id', 'id');
    }

    public function peserta()
    {
        return $this->belongsTo('App\Models\PPDBPeserta', 'peserta_id', 'id');
    }

    public function ustadz()
    {
        return $this->belongsTo('App\Models\PPDBWali', 'wali_id', 'id');
    }

    public function getTglDaftarAttribute()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d-m-Y');
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->attributes['status'] === 0) {
            return '<span class="badge badge-danger">Belum Lunas</span>';
        } else if($this->attributes['status'] === 1) {
            return '<span class="badge badge-warning">Pending</span>';
        }else{
            return '<span class="badge badge-success">Lunas</span>';
        }
    }

}
