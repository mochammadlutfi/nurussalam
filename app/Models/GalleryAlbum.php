<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GalleryAlbum extends Model
{
    use HasSlug;

    protected $table = 'gallery_album';
    protected $primaryKey = 'id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'thumbnail', 'status'
    ];

    protected $appends = [
        'dibuat', 'thumbnail_url', 'status_badge'
    ];

    public function photo()
    {
        return $this->hasMany('App\Models\GalleryPhoto', 'album_id', 'id');
    }

    public function getDibuatAttribute()
    {
        Carbon::setLocale('id');
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }

    public function getStatusBadgeAttribute()
    {
        if ($this->attributes['status'] === 1) {
            return '<span class="badge badge-success">Publikasi</span>';
        } else {
            return '<span class="badge badge-danger">Draft</span>';
        }
    }

    public function getThumbnailUrlAttribute()
    {
        if (file_exists( public_path() . '/' . $this->attributes['thumbnail']) && $this->attributes['thumbnail'] !== null) {
            return asset($this->attributes['thumbnail']);
        } else {
            return asset('img/poster.png');
        }
    }

    /**
     * Get the options for generating the slug.
     */
     public function getSlugOptions() : SlugOptions
     {
         return SlugOptions::create()
             ->generateSlugsFrom('nama')
             ->saveSlugsTo('slug');
     }
}
