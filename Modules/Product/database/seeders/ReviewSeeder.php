<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Models\Product;
use Modules\Product\Models\Review;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $users = User::all();

        if ($users->isEmpty()) {
            // Create a default user if none exist
            $user = User::create([
                'name'     => 'Default User',
                'email'    => 'user@example.com',
                'password' => bcrypt('password'),
            ]);
            $users = collect([$user]);
        }

        foreach ($products as $product) {
            $numReviews = rand(1, 5);
            for ($i = 0; $i < $numReviews; $i++) {
                Review::create([
                    'product_id' => $product->id,
                    'user_id'    => $users->random()->id,
                    'rating'     => rand(3, 5),
                    'comment'    => 'This is a great product! Highly recommended.',
                    'status'     => 'approved',
                ]);
            }
        }
    }
}
