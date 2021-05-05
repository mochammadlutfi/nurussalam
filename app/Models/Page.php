<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Page extends Model
{
    use HasSlug;

    protected $table = 'pages';
    protected $primaryKey = 'id';


    protected $fillable = [
        'path', 'kunjungan_id', 'nama'
    ];

    protected $appends = ['dibuat'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('judul')
            ->saveSlugsTo('slug');
    }

    public function getDibuatAttribute()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
