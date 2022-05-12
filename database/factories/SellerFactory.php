<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Seller;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seller>
 */
class SellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nickname' => $this->faker->name(),
            'access_token' => 'jfhsd786fd',
            'refresh_token' => 'jfhsd786fd',
            'expires_in' => 2600,
            'pais' => $this->faker->randomElement(['AR', 'CL', 'MX', 'UY', 'PE'])
        ];
    }
}
