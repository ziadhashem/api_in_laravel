<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return array(
            'name' => $this->faker->name(),
            'description' =>  Str::random(10),
            'is_active'=>$this->faker->boolean(),
            'image'=>$this->faker->image(),
            'slug'=>Str::random(10),
        );
    }
}
