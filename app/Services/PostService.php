<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\Auth;

class PostService
{
    protected PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function all($perPage = 10)
    {
        return $this->postRepository->all($perPage);
    }

    public function featured($limit = 6)
    {
        return $this->postRepository->featured($limit);
    }

    public function getPost($id)
    {
        return $this->postRepository->find($id);
    }

    public function getPostBySlug($slug)
    {
        return $this->postRepository->findBySlug($slug);
    }

    /**
     * Handle file upload and return the file path
     *
     * @param array $data
     * @param string $key
     * @param string $directory
     * @return array
     */
    private function handleFileUpload(array $data, string $key = 'image', string $directory = 'images'): array
    {
        if (isset($data[$key]) && $data[$key] instanceof \Illuminate\Http\UploadedFile) {
            $data[$key] = $data[$key]->store($directory, 'public');
        }

        return $data;
    }

    public function createPost(array $data)
    {
        $publisher = Auth::user()->publisher;

        $data = $this->handleFileUpload($data);

        return $this->postRepository->create($data, $publisher->id);
    }

    public function updatePost(Post $post, array $data)
    {
        $data = $this->handleFileUpload($data);

        return $this->postRepository->update($post, $data);
    }

    public function deletePost($id)
    {
        return $this->postRepository->delete($id);
    }

    public function getPublisherPosts($publisherId = null, $perPage = 10)
    {
        if (!$publisherId) {
            $publisher = Auth::user()->publisher;
            $publisherId = $publisher->id;
        }

        return $this->postRepository->getPublisherPosts($publisherId, $perPage);
    }

    public function toggleSavePost(Post $post)
    {
        $user = Auth::user();

        if ($user->savedPosts()->where('post_id', $post->id)->exists()) {
            $user->savedPosts()->detach($post->id);
            return false;
        } else {
            $user->savedPosts()->attach($post->id);
            return true;
        }
    }
}
