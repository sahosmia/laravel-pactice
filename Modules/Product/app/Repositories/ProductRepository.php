<?php
namespace Modules\Product\App\Repositories;

use Modules\Product\Models\Product;

class ProductRepository
{
    public function getAll(){
        $products = Product::get();
        return $products;
    }
}
