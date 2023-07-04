<?php
namespace App\Repository;

use App\Models\Product;

class ProductRepository implements InterFaceProductRepository{

    public function getAllProducts(){

        return Product::all();
    }
}
?>