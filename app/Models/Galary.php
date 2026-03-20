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
        'short_description',
        'category_id',
    ];

    public function images()
    {
        return $this->hasMany(GalleryImages::class, 'gallery_id');
    }

    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }
}
