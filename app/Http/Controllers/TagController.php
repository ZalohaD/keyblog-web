<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Services\TagService;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected TagService $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function show(Tag $tag)
    {
        $posts = $this->tagService->getPostsByTag($tag->id);
        return view('pages.tags-show', compact('tag', 'posts'));
    }
}
