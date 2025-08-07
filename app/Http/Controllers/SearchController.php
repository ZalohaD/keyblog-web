<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        if (empty($search)) {
            return view('pages.search', ['results' => collect(), 'search' => '']);
        }

        $results = Post::where('title', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->with('publisher')
            ->get();

        return view('pages.search', compact('results', 'search'));
    }
}
