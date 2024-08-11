<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class UserPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create()->each(function ($user) {
            Post::factory(3)->create([
                'user_id' => $user->id,
                'user_first' => $user->first,
                'user_last' => $user->last,
            ]);
        });
    }
}

