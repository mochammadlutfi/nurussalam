<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Post extends Model
{
    use HasSlug;

    protected $table = 'posts';
    protected $primaryKey = 'id';

    protected $fillable = [

    ];

    protected $appends = ['dibuat', 'featured_img_url'];

    public function kategori()
    {
        return $this->belongsTo('App\Models\PostKategori', 'kategori_id', 'kategori_id');
    }

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
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('d F Y');
    }

    public function getFeaturedImgUrlAttribute()
    {
        if (file_exists( public_path() . '/' . $this->attributes['featured_img']) && $this->attributes['featured_img'] !== null) {
            return asset($this->attributes['featured_img']);
        } else {
            return asset('img/poster.png');
        }
    }

}
