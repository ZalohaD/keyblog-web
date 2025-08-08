<?php

namespace App\Services;

use App\Repositories\SearchRepository;

class SearchService
{
    protected SearchRepository $searchRepository;

    public function __construct(SearchRepository $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function searchPosts($searchTerm)
    {
        return $this->searchRepository->searchPosts($searchTerm);
    }
}
