<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Storage;


class PPDBWali extends Model
{

    protected $table = 'ppdb_ustadz';
    protected $fillable =[
        'nama', 'phone', 'is_active',
    ];
}
