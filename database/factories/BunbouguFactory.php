<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BunbouguFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->realText(10),
            'kakaku'=>$this->faker->numberBetween($min=50,$max=999),
            'bunrui'=>$this->faker->numberBetween($min=4,$max=6),
            'shosai'=>$this->faker->realText(50),
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>null,
        ];
    }
}
