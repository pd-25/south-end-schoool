<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LatestNews extends Model
{
    protected $fillable = [
        "id",
        "title",
"status"
    ];

    public function scopeActive($query){
        return $query->where('status', 1);
    }
}
