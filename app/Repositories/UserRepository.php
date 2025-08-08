<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{
    public function find($id)
    {
        return User::find($id);
    }

    public function getCurrentUser()
    {
        return Auth::user();
    }

    public function create(array $userData)
    {
        return User::create($userData);
    }

    public function update(User $user, array $data)
    {
        $user->update($data);
        return $user;
    }

    public function getSavedPosts($userId, $perPage = 10)
    {
        $user = $this->find($userId);
        return $user->savedPosts()->latest()->paginate($perPage);
    }

    public function toggleSavePost($userId, $postId)
    {
        $user = $this->find($userId);

        if ($user->savedPosts()->where('post_id', $postId)->exists()) {
            $user->savedPosts()->detach($postId);
            return false;
        } else {
            $user->savedPosts()->attach($postId);
            return true;
        }
    }
}
