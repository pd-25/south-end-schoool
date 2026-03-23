<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouncilCategory extends Model
{
    protected $table = 'council_categories';

    protected $fillable = ['name'];

    public function councils()
    {
        return $this->hasMany(Council::class, 'category_id');
    }
}
