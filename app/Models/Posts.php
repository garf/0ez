<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';
    protected static $_instance = null;

    public static function i()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function getPostsByCategoryId($category_id)
    {
        $posts = Posts::with(['category', 'user']);
        if(!empty($category_id)) {
            $posts = $posts->where('category_id', $category_id);
        }
        return $posts->active()->paginate(10);
    }

    public function getBySlug($slug)
    {
        return Posts::with(['user', 'category'])->where('slug', 'like', $slug)->first();
    }

    public function scopeActive($query) {
        return $query->where('status', 'active');
    }
}
