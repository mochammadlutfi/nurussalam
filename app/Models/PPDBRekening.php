<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Storage;


class PPDBRekening extends Model
{

    protected $table = 'ppdb_rekening';

    protected $fillable =[
        'bank', 'kode', 'nama', 'rekening_no', 'icon'
    ];

    protected $appends = [
        'icon_url'
    ];

    public function getIconUrlAttribute($value) {
        $isExists = Storage::disk('umum')->exists($this->attributes['icon']);
        if(!$isExists)
        {
             return 'https://via.placeholder.com/128x64.png?text=ICON+BANK';
        }else{
                return asset('uploads/'.$this->attributes['icon']);
        }
    }
}
