<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->company().rand(1,10000);
        return [
            'name'=> $name,
            'slug' => Str::slug($name,'-'),
            'description'=> $this->faker->text(300),
        ];
    }
}
