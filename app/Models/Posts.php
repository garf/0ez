<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

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

    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'post_tag', 'post_id', 'tag_id');
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

    public function getPostsByTag($tag)
    {
        if()
        $posts = Tags::where('tag', 'like', $tag)->first()->posts()->active()->paginate(10);
        return $posts;
    }

    public function getBySlug($slug)
    {
        return Posts::with(['user', 'category', 'tags'])->where('slug', 'like', $slug)->first();
    }

    public function scopeActive($query) {
        return $query->where('status', 'active');
    }
}
