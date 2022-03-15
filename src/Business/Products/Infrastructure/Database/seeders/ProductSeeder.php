<?php

namespace Products\Infrastructure\Database\seeders;

use Illuminate\Database\Seeder;
use Products\Domain\Model\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the product seeder.
     *
     * @return void
     */
    public function run(): void
    {
        Product::factory()
            ->count(40)
            ->create();
    }
}
