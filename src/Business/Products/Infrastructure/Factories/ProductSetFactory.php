<?php

namespace Products\Infrastructure\Factories;

use Products\Domain\Model\ProductSet;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductSet::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->text(50),
        ];
    }
}
