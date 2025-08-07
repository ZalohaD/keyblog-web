<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PublisherController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        return view('dashboard.publisher.publisher', compact('user'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logoPath = $request->hasFile('logo')
            ? $request->file('logo')->store('logos', 'public')
            : ($user->publisher->logo ?? null);

        $data = [
            'name' => $validatedData['name'],
            'bio' => $validatedData['bio'] ?? null,
            'logo' => $logoPath,
            'slug' => Str::slug($validatedData['name']),
        ];

        $user->publisher()->updateOrCreate(
            ['user_id' => $user->id],
            $data
        );

        return redirect()->route('dashboard.index')->with('success', 'Publisher profile saved successfully.');
    }

    public function show(Publisher $publisher)
    {
        $posts = $publisher->posts()->orderBy('created_at', 'desc')->paginate(10);
        return view('pages.publisher-show', compact('publisher', 'posts'));
    }
}
