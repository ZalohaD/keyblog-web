<?php
namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = $this->userService->getCurrentUser();
        return view('dashboard.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = $this->userService->getCurrentUser();

        $validatedData = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255|unique:users,email,' . $user->id,
        ]);

        $this->userService->updateUser($user, $validatedData);
        return redirect()->route('dashboard.index')->with('success', 'Your profile has been updated');
    }
}
