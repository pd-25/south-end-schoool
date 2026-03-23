<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Council extends Model
{
    protected $table = 'councils';

    protected $fillable = ['category_id', 'heading', 'designation', 'image'];

    public function category()
    {
        return $this->belongsTo(CouncilCategory::class, 'category_id');
    }
}