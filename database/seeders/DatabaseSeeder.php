<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory(2)->create();
        //Se agrega el sedeer UserSeeder para poder agregar un par de inserts de tipo test
        $this->call(UsersSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentsSenders::class);

    }
}
