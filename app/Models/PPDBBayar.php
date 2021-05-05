<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Storage;
use Carbon\Carbon;

class PPDBBayar extends Model
{

    protected $table = 'ppdb_bayar';
    protected $fillable =[
        'ppdb_id', 'rekening_id', 'jumlah', 'tgl_bayar', 'bukti'
    ];

    protected $appends = [
        'status_badge', 'tgl_bayar_frm'
    ];

    public function ppdb()
    {
        return $this->belongsTo('App\Models\PPDB', 'ppdb_id', 'id');
    }

    public function tujuan()
    {
        return $this->hasOne('App\Models\PPDBRekening', 'id', 'rekening_id');
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->attributes['status'] === 0) {
            return '<span class="badge badge-danger">Belum Dikonfirmasi</span>';
        } else if($this->attributes['status'] === 1) {
            return '<span class="badge badge-success">Terkonfirmasi</span>';
        }
    }

    public function getTglBayarFrmAttribute()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['tgl_bayar'])->translatedFormat('d-m-Y');
    }
}
