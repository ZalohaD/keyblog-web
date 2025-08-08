<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;

class PostRepository
{
    public function all($perPage = 10)
    {
        return Post::with('publisher')->latest()->paginate($perPage);
    }

    public function find($id)
    {
        return Post::find($id);
    }

    public function findBySlug($slug)
    {
        return Post::where('slug', $slug)->first();
    }

    public function featured($limit = 6)
    {
        return Post::with('publisher')->where('featured', 1)->limit($limit)->get();
    }

    public function create(array $data, $publisherId)
    {
        $cleanedContent = Purifier::clean($data['description']);

        $post = Post::create([
            'title' => $data['title'],
            'description' => $cleanedContent,
            'image' => $data['image'] ?? null,
            'publisher_id' => $publisherId,
            'slug' => Str::slug($data['title']),
        ]);

        if (!empty($data['tags'])) {
            $post->tags()->attach($data['tags']);
        }

        return $post;
    }

    public function update(Post $post, array $data)
    {
        if (isset($data['description'])) {
            $data['description'] = Purifier::clean($data['description']);
        }

        if (isset($data['title']) && !isset($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $post->update($data);

        if (isset($data['tags'])) {
            $post->tags()->sync($data['tags']);
        }

        return $post;
    }

    public function delete($id)
    {
        $post = $this->find($id);
        if ($post) {
            $post->tags()->detach();
            return $post->delete();
        }
        return false;
    }

    public function getPublisherPosts($publisherId, $perPage = 10)
    {
        return Post::where('publisher_id', $publisherId)
            ->latest()
            ->paginate($perPage);
    }
}
