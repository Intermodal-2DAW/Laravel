<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;

use Illuminate\Database\Seeder;

class CommentsSenders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $post = Post::all();

        $post->each(function($post){
            Comment::factory()->count(1)->create([
                'user_id' => $post->user_id,
                'post_id'=> $post->id
            ]);
        });
    }
}
