<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Publisher;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         Publisher::factory(10)->create();
      $this->call(PostSeeder::class);
    }
}
