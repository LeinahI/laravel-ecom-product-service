<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'image' => $this->faker->randomElement([
                'https://www.personsoul.com/cdn/shop/files/WashedBlackDetachableOverallsfemalemodelfullbodyfrontview_3.jpg?v=1717485943&width=1280',
                'https://thoughtwefriends.com/cdn/shop/files/280125_TWF22651_2e187e1f-fa41-4d28-bc64-86afa7706a0d_1512x.jpg?v=1738781795',
                'https://thoughtwefriends.com/cdn/shop/files/280125_TWF06111_1512x.jpg?v=1738776336'
            ]),
            'sku' => $this->faker->unique()->word(),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}
