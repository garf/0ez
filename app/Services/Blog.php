<?php

namespace App\Services;

use App\Models\Posts;
use App\Models\Tags;

class Blog
{
    public function getRelatedPosts($tags, $except = null)
    {
        $limit = 4;
        $tag_ids = $tags->lists('tag');
        $related = Posts::whereHas('tags', function ($q) use ($tag_ids) {
            $q->whereIn('tag', $tag_ids);
        });
        if (!empty($except)) {
            $related = $related->where('id', '!=', $except);
        }
        $related = $related->active()->orderBy('created_at')
            ->take($limit)
            ->get();

        //If posts not enough for maximum
        if ($related->count() < $limit) {
            $left = $limit - $related->count();
            $excluded = $related->lists('id')->toArray();
            $excluded[] = $except;
            $additional = Posts::whereNotIn('id', $excluded)->active()->orderByRaw('RAND()')->limit($left)->get();
            $related = $related->merge($additional);
        }

        return $related;
    }
}
