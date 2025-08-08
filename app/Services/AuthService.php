<?php

namespace App\Services;

use App\Repositories\AuthRepository;
use App\Repositories\UserRepository;
use Illuminate\Validation\ValidationException;

class AuthService
{
    protected AuthRepository $authRepository;
    protected UserRepository $userRepository;

    public function __construct(
        AuthRepository $authRepository,
        UserRepository $userRepository
    ) {
        $this->authRepository = $authRepository;
        $this->userRepository = $userRepository;
    }

    public function login(array $credentials)
    {
        $success = $this->authRepository->attemptLogin($credentials);

        if (!$success) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $this->authRepository->regenerateSession();

        return true;
    }

    public function logout()
    {
        $this->authRepository->logout();
    }

    public function register(array $userData)
    {
        $user = $this->userRepository->create($userData);

        $this->authRepository->attemptLogin([
            'email' => $userData['email'],
            'password' => $userData['password']
        ]);

        return $user;
    }
}
