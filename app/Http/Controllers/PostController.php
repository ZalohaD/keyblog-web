<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Publisher;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class PostController extends Controller
{

    public function index()
    {
        $featuredPosts = Post::with('publisher')->where('featured', 1)->limit(6)->get();
        $posts = Post::with('publisher')->latest()->paginate(10);
        $tags = Tag::all();

        return view('pages.home', [
            'posts' => $posts,
            'featuredPosts' => $featuredPosts,
            'tags' => $tags
        ]);
    }


    public function create()
    {
        $publisher = Auth::user()->publisher;

        if (!$publisher) {
            return redirect()->route('dashboard.publisher.create')
                ->with('error', 'You need to create a publisher profile first.');
        }

        $tags = Tag::all();

        return view('dashboard.posts.create', compact('publisher', 'tags'));
    }



    public function store(Request $request)
    {
        $publisher = Auth::user()->publisher;

        $validatedContent = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
        ]);

        $cleanedContent = Purifier::clean($validatedContent['description']);

        $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

        $post = Post::create([
            'title' => $validatedContent['title'],
            'description' => $cleanedContent,
            'image' => $imagePath,
            'publisher_id' => $publisher->id,
            'slug' => Str::slug($validatedContent['title']),
        ]);

        if (!empty($validatedContent['tags'])) {
            $post->tags()->attach($validatedContent['tags']);
        }
        return redirect()->route('dashboard.posts.create');
    }


    public function show(Post $post)
    {
        return view('pages.post-show', compact('post'));
    }


    public function destroy($id)
    {
        // TODO: Implement post deletion
    }


    public function toggleSave(Post $post)
    {
        $user = auth()->user();

        if ($user->savedPosts()->where('post_id', $post->id)->exists()) {
            $user->savedPosts()->detach($post->id);
            $message = 'Post removed from saved posts.';
        } else {
            $user->savedPosts()->attach($post->id);
            $message = 'Post saved successfully.';
        }

        return redirect()->back()->with('success', $message);
    }


    public function savedPosts()
    {
        $user = Auth::user();
        $savedPosts = $user->savedPosts()->latest()->paginate(10);

        return view('dashboard.posts.saved', compact('savedPosts'));
    }

    public function myPosts()
    {
        $publisher = Auth::user()->publisher;
        $posts = $publisher->posts()->latest()->paginate(10);

        return view('dashboard.posts.my-posts', compact('posts'));


    }
}
