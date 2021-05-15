<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\PesertaEmailVerificationNotification;
use Carbon\Carbon;

class PPDBPeserta extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'ppdb_peserta';
    protected $fillable = [
        'nama', 'email', 'password',
    ];

    protected $appends = [
        'created_at_frm', 'status_badge'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ppdb()
    {
        return $this->hasOne('App\Models\PPDB', 'peserta_id', 'id');
    }

    public function is_register()
    {
        return count($this->ppdb);
    }

    public function getCreatedAtFrmAttribute()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d-m-Y');
    }

    public function getLastLoginAtAttribute($value)
    {
        Carbon::setLocale('id');
        return Carbon::parse($value)->translatedFormat('l, d F Y h:i');
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new PesertaEmailVerificationNotification);
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->attributes['email_verified_at'] === NULL) {
            return '<span class="badge badge-danger">Belum Verifikasi</span>';
        } else{
            return '<span class="badge badge-success">Terverifikasi</span>';
        }
    }
    


}
