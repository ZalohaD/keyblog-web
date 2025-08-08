<?php
namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $userData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        $this->authService->register($userData);

        return redirect('/');
    }
}
