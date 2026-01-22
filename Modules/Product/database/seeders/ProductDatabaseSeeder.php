<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;

class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            TagSeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
            ProductSeoSeeder::class,
            ProductSpecificationSeeder::class,
            ProductTagSeeder::class,
            ReviewSeeder::class,
        ]);
    }
}
