<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getCurrentUser()
    {
        return $this->userRepository->getCurrentUser();
    }

    public function createUser(array $userData)
    {
        return $this->userRepository->create($userData);
    }

    public function updateUser(User $user, array $data)
    {
        return $this->userRepository->update($user, $data);
    }

    public function getSavedPosts($userId = null, $perPage = 10)
    {
        if (!$userId) {
            $userId = Auth::id();
        }

        return $this->userRepository->getSavedPosts($userId, $perPage);
    }

    public function toggleSavePost($postId, $userId = null)
    {
        if (!$userId) {
            $userId = Auth::id();
        }

        return $this->userRepository->toggleSavePost($userId, $postId);
    }
}
