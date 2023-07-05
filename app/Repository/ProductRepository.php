<?php
namespace App\Repository;

use App\Models\Product;

class ProductRepository implements InterFaceProductRepository{

    public function getAllProducts(){

        return Product::all();
    }

    public function createProduct(array $data)
    {
        Product::insert([
            'img'=> $data['img'],
            'title'=>$data['title'],
            'price'=>$data['price'],
            'description'=>$data['description']
        ]);
    }

    public function getSingleProduct($id){
        return Product::find($id);
    }

    public function editProduct($id)
    {
        return Product::find($id);

    }
    public function updateProduct($id ,array $data)
    {
        Product::find($id)->update([
            'img'=> $data['img'],
            'title'=>$data['title'],
            'price'=>$data['price'],
            'description'=>$data['description']
        ]);

    }
}
?>