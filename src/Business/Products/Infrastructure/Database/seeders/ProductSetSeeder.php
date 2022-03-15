<?php

namespace Products\Infrastructure\Database\seeders;

use Illuminate\Database\Seeder;
use Products\Domain\Model\Product;
use Products\Domain\Model\ProductSet;

class ProductSetSeeder extends Seeder
{
    /**
     * Run the product seeder.
     *
     * @return void
     */
    public function run(): void
    {
        ProductSet::factory()
            ->count(3)
            ->create()
            ->each(function (ProductSet $productSet) {
                $attachableProducts = Product::factory()->count(7)->create();
                $productSet->products()->sync($attachableProducts->pluck('id')->toArray());
            });
    }
}
