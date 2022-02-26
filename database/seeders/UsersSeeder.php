<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//Se importan los modelos.
use App\Models\Post;
use App\Models\User;



class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // $user = new User();
        // $user->login = 'salva@gmail.com';
        // $user->password = '1234';
        // $user->save();

        // $post = new Post();
        // $post->title = "The seender's Post";
        // $post->content = "Content of seeder's post";
        // $post->user()->associate($user);
        // $post->save();

        $user = new User();
        $user->login = 'admin';
        $user->password = bcrypt('admin');
        $user->name = 'admin';
        $user->lastname = 'admin';
        $user->rol = 'admin';
        $user->email= 'admin@fuckOff';
        $user->save();

        // User::factory()->count(5)->create();

    }
}
