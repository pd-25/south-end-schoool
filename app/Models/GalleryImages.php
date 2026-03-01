<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryImages extends Model
{
    use HasFactory;

    protected $table = 'gallery_images';

    protected $fillable = [
        'image',
        'gallery_id',
    ];

    public function gallery()
    {
        return $this->belongsTo(Galary::class, 'gallery_id');
    }
}
