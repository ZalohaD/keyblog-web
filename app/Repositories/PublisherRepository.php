<?php

namespace App\Repositories;

use App\Models\Publisher;
use Illuminate\Support\Str;

class PublisherRepository
{
    public function all()
    {
        return Publisher::all();
    }

    public function find($id)
    {
        return Publisher::find($id);
    }

    public function findBySlug($slug)
    {
        return Publisher::where('slug', $slug)->first();
    }

    public function getPublisherPosts($publisherId, $perPage = 10)
    {
        $publisher = $this->find($publisherId);
        return $publisher ? $publisher->posts()->orderBy('created_at', 'desc')->paginate($perPage) : collect();
    }

    public function createOrUpdate($userId, array $data)
    {
        $logoPath = $data['logo'] ?? null;

        $publisherData = [
            'name' => $data['name'],
            'bio' => $data['bio'] ?? null,
            'logo' => $logoPath,
            'slug' => Str::slug($data['name']),
        ];

        return Publisher::updateOrCreate(
            ['user_id' => $userId],
            $publisherData
        );
    }
}
