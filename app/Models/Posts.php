<?php

namespace App\Models;

use Cache;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Posts extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'seo_title',
        'save_to'    => 'slug',
        'unique'     => true,
    ];

    protected $table = 'posts';
    protected $fillable = ['*'];
    public static $_instance = null;

    public static function i()
    {
        $class = get_called_class();
        if (!static::$_instance) {
            static::$_instance = new $class();
        }

        return static::$_instance;
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

    public function getPostsByCategoryId($category_id, $str = null)
    {
        $posts = $this->with(['category', 'user']);
        if (!empty($category_id)) {
            $posts->where('category_id', $category_id);
        }

        if (!empty($str)) {
            $this->scopeSearch($posts, $str);
        }

        return $posts->active()->sort()->paginate(10);
    }

    public function getPostsByTag($tag)
    {
        $slug = str_slug($tag, '_');
        $key = 'post_tag_'.$slug;
        if (Cache::has($key)) {
            return Cache::get($key);
        } else {
            $tag = Tags::where('tag', 'like', $tag)->first();

            if (is_null($tag)) {
                return null;
            }

            $posts = $tag->posts()->active()->paginate(10);
            Cache::put($key, $posts, 5);
        }

        return $posts;
    }

    public function getBySlug($slug)
    {
        return $this->with(['user', 'category', 'tags'])->where('slug', $slug)->first();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeSort($query)
    {
        return $query->orderBy('is_pinned', 'desc')->orderBy('published_at', 'desc');
    }

    public function scopeByStatus($query, $statuses)
    {
        if (is_array($statuses)) {
            return $query->whereIn('status', $statuses);
        } else {
            return $query->where('status', $statuses);
        }
    }

    public function scopeSearch($query, $str)
    {
        $str = '%' . $str . '%';

        return $query->where('title', 'like', $str)
            ->orWhere('excerpt', 'like', $str)
            ->orWhere('content', 'like', $str);
    }
}
