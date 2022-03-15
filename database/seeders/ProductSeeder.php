<?php

namespace Database\Seeders;

use Products\Domain\Model\Product;
use Illuminate\Database\Seeder;

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
