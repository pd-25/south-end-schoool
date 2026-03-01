<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Galary extends Model
{
    use HasFactory;

    protected $table = 'galaries';

    protected $fillable = [
        'name',
        'preview_image',
        'short_description'
    ];

    public function images()
    {
        return $this->hasMany(GalleryImages::class, 'gallery_id');
    }
}
