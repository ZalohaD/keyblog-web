<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository
{
    public function all()
    {
        return Tag::all();
    }

    public function find($id)
    {
        return Tag::find($id);
    }

    public function findBySlug($slug)
    {
        return Tag::where('slug', $slug)->first();
    }

    public function getPostsByTag($tagId, $perPage = 10)
    {
        $tag = $this->find($tagId);
        return $tag ? $tag->posts()->paginate($perPage) : collect();
    }
}
