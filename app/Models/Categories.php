<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'posts_categories';

    public function posts()
    {
        return $this->hasMany(Posts::class, 'category_id');
    }

}
