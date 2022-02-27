<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'content' => $this->faker->sentence(),
            'ranking' => $this->faker->numberBetween(1,5),
            'user_name' => $this->faker->name
        ];
    }
}
