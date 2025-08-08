<?php
namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $this->authService->login($validatedData);

        return redirect()->intended('/');
    }

    public function destroy()
    {
        $this->authService->logout();
        return redirect()->route('home');
    }
}
