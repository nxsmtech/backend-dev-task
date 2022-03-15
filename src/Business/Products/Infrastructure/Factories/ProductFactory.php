<?php

namespace Products\Infrastructure\Factories;

use Products\Domain\Model\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'sku_code' => $this->faker->randomNumber(8),
            'name' => $this->faker->text(40),
            'type' => $this->faker->randomElement(Product::PRODUCT_TYPES),
            'condition' => $this->faker->randomElement(Product::PRODUCT_CONDITIONS),
            'description_title' => $this->faker->text(),
            'description_text' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(3, 0, 999),
            'published' => $this->faker->boolean(),
        ];
    }
}
