<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryPhoto extends Model
{

    protected $table = 'gallery_photo';
    protected $primaryKey = 'id';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'album_id', 'path',
    ];

    public function album()
    {
        return $this->hasMany('App\Models\GalleryAlbum', 'album_id', 'id');
    }

    public function getPathAttribute($value)
    {
        if (file_exists( public_path() . '/' . $value) && $value !== null) {
            return asset($value);
        } else {
            return asset('img/poster.png');
        }
    }
}
