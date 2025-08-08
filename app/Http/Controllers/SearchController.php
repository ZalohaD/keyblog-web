<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected SearchService $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function index(Request $request)
    {
        $search = $request->get('search');

        if (empty($search)) {
            return view('pages.search', ['results' => collect(), 'search' => '']);
        }

        $results = $this->searchService->searchPosts($search);

        return view('pages.search', compact('results', 'search'));
    }
}
