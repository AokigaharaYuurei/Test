<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{

    public function definition()
    {
        $faker = \Faker\Factory::create();
        return[
            'number' => $faker->numerify('aaa-###'),
            'description' => $faker->paragraph,
            'created_at' => $faker->dateTimeBetween('-1 week', 'now'),
            'status_id' => 1
        ];  
    }
}
