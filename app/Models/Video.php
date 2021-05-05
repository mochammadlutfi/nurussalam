<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Video extends Model
{
    use HasSlug;
    protected $table = 'videos';
    protected $primaryKey = 'id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul', 'slug', 'url', 'deskripsi', 'thumbnail', 'seo_keyword', 'seo_description', 'seo_tags', 'status'
    ];

    protected $appends = ['dibuat', 'thumbnail_url'];

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

    public function getThumbnailUrlAttribute()
    {
        if (file_exists( public_path() . '/' . $this->attributes['thumbnail']) && $this->attributes['thumbnail'] !== null) {
            return asset($this->attributes['thumbnail']);
        } else {
            return asset('img/poster.png');
        }
    }
}
