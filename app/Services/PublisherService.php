<?php

namespace App\Services;

use App\Models\Publisher;
use App\Repositories\PublisherRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PublisherService
{
    protected PublisherRepository $publisherRepository;

    public function __construct(PublisherRepository $publisherRepository)
    {
        $this->publisherRepository = $publisherRepository;
    }

    public function getAllPublishers()
    {
        return $this->publisherRepository->all();
    }

    public function getPublisher($id)
    {
        return $this->publisherRepository->find($id);
    }

    public function getPublisherBySlug($slug)
    {
        return $this->publisherRepository->findBySlug($slug);
    }

    public function getPublisherPosts($publisherId, $perPage = 10)
    {
        return $this->publisherRepository->getPublisherPosts($publisherId, $perPage);
    }

    public function createOrUpdatePublisher(array $data, $userId = null)
    {
        if (!$userId) {
            $userId = Auth::id();
        }

        if (isset($data['logo']) && $data['logo'] instanceof \Illuminate\Http\UploadedFile) {
            $data['logo'] = $data['logo']->store('logos', 'public');
        }

        return $this->publisherRepository->createOrUpdate($userId, $data);
    }

    public function getCurrentUserPublisher()
    {
        $user = Auth::user();
        return $user ? $user->publisher : null;
    }
}
