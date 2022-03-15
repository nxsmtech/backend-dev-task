<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Products\Infrastructure\Database\seeders\ProductSeeder;
use Products\Infrastructure\Database\seeders\ProductSetSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(
            [
                ProductSeeder::class,
                ProductSetSeeder::class,
            ]
        );
    }
}
