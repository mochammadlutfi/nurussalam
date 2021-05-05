<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{

    protected $table = 'visitor';

    protected $fillable = [
        'id', 'page_type', 'slug', 'url', 'source_url', 'ip', 'agent_browser','created_at', 'updated_at'
    ];

    public function post(){
        return $this->belongsTo('App\Models\Post', 'slug', 'slug');
    }
}
