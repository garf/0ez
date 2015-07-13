<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    public function scopeActive($query) {
        return $query->where('status', 'active');
    }
}
