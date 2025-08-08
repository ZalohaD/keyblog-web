<?php

namespace App\Repositories;

use App\Models\Post;

class SearchRepository
{
    public function searchPosts($searchTerm)
    {
        if (empty($searchTerm)) {
            return collect();
        }

        return Post::where('title', 'like', '%' . $searchTerm . '%')
            ->orWhere('description', 'like', '%' . $searchTerm . '%')
            ->with('publisher')
            ->get();
    }
}
