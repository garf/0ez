<?php

namespace app\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
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

    public function posts()
    {
        return $this->belongsToMany(Posts::class, 'post_tag', 'tag_id', 'post_id');
    }

    public function allWithPostsCount()
    {
        return self::leftJoin('post_tag', 'post_tag.tag_id', '=', 'tags.id')
            ->groupBy('tags.id')
            ->orderBy('tags.tag')
            ->get(['tags.*', DB::raw('COUNT(post_tag.id) as num')]);
    }
}
