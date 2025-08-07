<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = [
        'publisher_id',
        'title',
        'description',
        'image',
        'slug',

    ];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_posts')->withTimestamps();
    }
}
