<?php

namespace app\Models;

use Cache;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'seo_title',
        'save_to'    => 'slug',
    ];

    protected $table = 'posts';
    protected $fillable = ['*'];
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
        $posts = self::with(['category', 'user']);
        if (!empty($category_id)) {
            $posts = $posts->where('category_id', $category_id);
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
            $posts = Tags::where('tag', 'like', $tag)->first()->posts()->active()->paginate(10);
            Cache::put($key, $posts, 5);
        }

        return $posts;
    }

    public function getBySlug($slug)
    {
        return self::with(['user', 'category', 'tags'])->where('slug', 'like', $slug)->first();
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
}
