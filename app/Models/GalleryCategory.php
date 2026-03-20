<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $table = 'gallery_categories';

    protected $fillable = [
        'name',
        'image',
        'slug',
    ];

    public function galleries()
    {
        return $this->hasMany(Galary::class, 'category_id');
    }
}
