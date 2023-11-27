<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $startYear = 2022;
        // $endYear = 2023;
        $createdAt = fake()->dateTimeBetween('2022-01-01', '2023-12-31');
        $updatedAt = fake()->dateTimeBetween($createdAt, '2023-12-31');
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'product_name' => fake()->sentence(2),
            'quantity' => fake()->numberBetween(1, 10),
            'total_amount' => fake()->randomFloat(2, 10, 200),
            'created_at' => $createdAt->format('Y-m-d H:i:s'),
            'updated_at' => $updatedAt->format('Y-m-d H:i:s'),
        ];
    }
}
