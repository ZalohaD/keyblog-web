<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use App\Services\PublisherService;
use App\Services\TagService;
use App\Services\UserService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected PostService $postService;
    protected TagService $tagService;
    protected PublisherService $publisherService;
    protected UserService $userService;

    public function __construct(
        PostService $postService,
        TagService $tagService,
        PublisherService $publisherService,
        UserService $userService
    ) {
        $this->postService = $postService;
        $this->tagService = $tagService;
        $this->publisherService = $publisherService;
        $this->userService = $userService;
    }

    public function index()
    {
        $featuredPosts = $this->postService->featured();
        $posts = $this->postService->all();
        $tags = $this->tagService->getAllTags();

        return view('pages.home', [
            'posts' => $posts,
            'featuredPosts' => $featuredPosts,
            'tags' => $tags
        ]);
    }

    public function create()
    {
        $publisher = $this->publisherService->getCurrentUserPublisher();
        $tags = $this->tagService->getAllTags();

        return view('dashboard.posts.create', compact('publisher', 'tags'));
    }

    public function store(Request $request)
    {
        $validatedContent = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        try {
            $this->postService->createPost($validatedContent);
            return redirect()->route('dashboard.posts.create');
        } catch (\Exception $e) {
            return redirect()->route('dashboard.publisher.create')->with('error', $e->getMessage());
        }
    }

    public function show(Post $post)
    {
        return view('pages.post-show', compact('post'));
    }

    public function destroy($id)
    {
        $this->postService->deletePost($id);
        return redirect()->back()->with('success', 'Post deleted successfully.');
    }

    public function toggleSave(Post $post)
    {
        $saved = $this->postService->toggleSavePost($post);
        $message = $saved ? 'Post saved successfully.' : 'Post removed from saved posts.';

        return redirect()->back()->with('success', $message);
    }

    public function savedPosts()
    {
        $savedPosts = $this->userService->getSavedPosts();
        return view('dashboard.posts.saved', compact('savedPosts'));
    }

    public function myPosts()
    {
        $posts = $this->postService->getPublisherPosts();
        return view('dashboard.posts.my-posts', compact('posts'));
    }

    public function edit(Post $post)
    {
        $publisher = $this->publisherService->getCurrentUserPublisher();

        if ($post->publisher_id !== $publisher->id) {
            return redirect()->route('dashboard.posts.myposts')->with('error', 'You can only edit your own posts.');
        }

        $tags = $this->tagService->getAllTags();
        $selectedTags = $post->tags->pluck('id')->toArray();

        return view('dashboard.posts.edit', compact('post', 'publisher', 'tags', 'selectedTags'));
    }

    public function update(Request $request, Post $post)
    {
        $publisher = $this->publisherService->getCurrentUserPublisher();

        if ($post->publisher_id !== $publisher->id) {
            return redirect()->route('dashboard.posts.myposts')->with('error', 'You can only update your own posts.');
        }

        $validatedContent = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        try {
            $this->postService->updatePost($post, $validatedContent);
            return redirect()->route('dashboard.posts.myposts')->with('success', 'Post updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }
}
