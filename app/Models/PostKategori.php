<?php

namespace App\Models;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class PostKategori extends Model
{

    use HasSlug;

    protected $table = 'p_kategori';
    protected $primaryKey = 'kategori_id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'slug', 'deskripsi', 'seo_keyword', 'seo_tags', 'seo_description', 'status'
    ];

    public function post()
    {
        return $this->hasOne('App\Models\Post', 'kategori_id', 'kategori_id');
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
