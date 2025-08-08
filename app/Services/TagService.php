<?php

namespace App\Services;

use App\Models\Tag;
use App\Repositories\TagRepository;

class TagService
{
    protected TagRepository $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function getAllTags()
    {
        return $this->tagRepository->all();
    }

    public function getTag($id)
    {
        return $this->tagRepository->find($id);
    }

    public function getTagBySlug($slug)
    {
        return $this->tagRepository->findBySlug($slug);
    }

    public function getPostsByTag($tagId, $perPage = 10)
    {
        return $this->tagRepository->getPostsByTag($tagId, $perPage);
    }
}
