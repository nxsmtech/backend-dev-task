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
        $products = Product::query()->get();

        ProductSet::factory()
            ->count(3)
            ->create()
            ->each(function (ProductSet $productSet) use ($products) {
                $attachableProducts = $products->random(5)->pluck('id')->toArray();
                $products->forget($attachableProducts);

                $productSet->products()->sync($attachableProducts);
            });
    }
}
