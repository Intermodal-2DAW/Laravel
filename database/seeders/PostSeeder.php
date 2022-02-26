<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::all();
        $users->each(function($user){
            Post::factory()->count(1)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
