<?php

namespace App\Models;

use DB;

class Tags extends Model
{
    protected $table = 'tags';
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

    public function posts()
    {
        return $this->belongsToMany(Posts::class, 'post_tag', 'tag_id', 'post_id');
    }

    public function allWithPostsCount()
    {
        return $this->leftJoin('post_tag', 'post_tag.tag_id', '=', 'tags.id')
            ->groupBy('tags.id')
            ->orderBy('tags.tag')
            ->get(['tags.*', DB::raw('COUNT(post_tag.id) as num')]);
    }
}
