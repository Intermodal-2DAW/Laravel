<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class UserFactory extends Factory
{

    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'login' => $this->faker->word,
            'password' => bcrypt('1234'),
            'name' => $this->faker->word,
            'lastname' => $this->faker->word,
            'rol' => 'user',
            'email' => $this->faker->email(),
        ];
    }

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [

        'password',
    ];

}
