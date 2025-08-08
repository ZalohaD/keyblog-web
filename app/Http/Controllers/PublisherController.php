<?php
namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Services\PublisherService;
use App\Services\UserService;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    protected PublisherService $publisherService;
    protected UserService $userService;

    public function __construct(PublisherService $publisherService, UserService $userService)
    {
        $this->publisherService = $publisherService;
        $this->userService = $userService;
    }

    public function create()
    {
        $user = $this->userService->getCurrentUser();
        return view('dashboard.publisher.publisher', compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->publisherService->createOrUpdatePublisher($validatedData);

        return redirect()->route('dashboard.index')->with('success', 'Publisher profile saved successfully.');
    }

    public function show(Publisher $publisher)
    {
        $posts = $this->publisherService->getPublisherPosts($publisher->id);
        return view('pages.publisher-show', compact('publisher', 'posts'));
    }
}
