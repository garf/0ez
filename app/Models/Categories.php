<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use DB;

class Categories extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'seo_title',
        'save_to'    => 'slug',
        'unique'     => true,
    ];
    protected $table = 'categories';
    public static $_instance = null;

    public static function i()
    {
        $class = get_called_class();
        if (!static::$_instance) {
            static::$_instance = new $class();
        }

        return static::$_instance;
    }

    public function posts()
    {
        return $this->hasMany(Posts::class, 'category_id');
    }

    public function withPostsCount()
    {
        $class = get_called_class();

        return $class::leftJoin('posts', 'posts.category_id', '=', 'categories.id')
            ->where('posts.status', 'active')
            ->groupBy('categories.id')
            ->orderBy('categories.title')
            ->get(['categories.*', DB::raw('COUNT(posts.id) as num')]);
    }

    public function allWithPostsCount()
    {
        return static::leftJoin('posts', 'posts.category_id', '=', 'categories.id')
            ->groupBy('categories.id')
            ->orderBy('categories.title')
            ->get(['categories.*', DB::raw('COUNT(posts.id) as num')]);
    }

    public function getBySlug($slug)
    {
        return static::where('slug', 'like', $slug)->first();
    }
}
