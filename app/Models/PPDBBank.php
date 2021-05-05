<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Storage;


class PPDBBank extends Model
{

    protected $table = 'bank';

    protected $fillable =[
        'name', 'code'
    ];
}
