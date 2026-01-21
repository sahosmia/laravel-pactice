<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Models\Brand;
use Illuminate\Support\Str;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Apple', 'logo' => 'apple.png'],
            ['name' => 'Samsung', 'logo' => 'samsung.png'],
            ['name' => 'Sony', 'logo' => 'sony.png'],
            ['name' => 'LG', 'logo' => 'lg.png'],
            ['name' => 'Xiaomi', 'logo' => 'xiaomi.png'],
            ['name' => 'Dell', 'logo' => 'dell.png'],
            ['name' => 'HP', 'logo' => 'hp.png'],
            ['name' => 'Asus', 'logo' => 'asus.png'],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name'   => $brand['name'],
                'slug'   => Str::slug($brand['name']),
                'logo'   => $brand['logo'],
                'status' => 1,
            ]);
        }
    }
}
