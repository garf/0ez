<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use DB;

class Categories extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'seo_title',
        'save_to' => 'slug',
    ];

    protected $table = 'categories';
    public static $_instance = null;

    public static function i()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function posts()
    {
        return $this->hasMany(Posts::class, 'category_id');
    }

    public function withPostsCount()
    {
        return Categories::leftJoin('posts', 'posts.category_id', '=', 'categories.id')
            ->where('posts.status', 'active')
            ->groupBy('categories.id')
            ->orderBy('categories.title')
            ->get(['categories.*', DB::raw('COUNT(posts.id) as num')]);
    }

    public function allWithPostsCount()
    {
        return Categories::leftJoin('posts', 'posts.category_id', '=', 'categories.id')
            ->groupBy('categories.id')
            ->orderBy('categories.title')
            ->get(['categories.*', DB::raw('COUNT(posts.id) as num')]);
    }

    public function getBySlug($slug)
    {
        return Categories::where('slug', 'like', $slug)->first();
    }
}
