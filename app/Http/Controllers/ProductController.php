<?php

namespace App\Http\Controllers;

use App\Repository\InterFaceProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $product;

    public function __construct(InterFaceProductRepository $product){

        $this->product = $product;

    }

    public function index() {

        $products = $this->product->getAllProducts();

        return view('product.index')->with('products', $products);

    }

    public function create(){

        return view('product.create');
    }

    public function store(Request $request){

        $request->validate([

            'img'=>'required' ,
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',

        ]);

        $data = $request->all();

        //upload images

        if($image = $request->file('img')){

            $name = time (). "." .$image->getClientOriginalName();
            $image->move(public_path('images'),$name);
            $data ['img'] = $name;
        }

        $this->product->createProduct($data);


        return redirect('/products');

    }

    public function show($id){

        $product = $this->product->getSingleProduct($id);

        return view('product.show')->with('product', $product);

    }
    public function edit($id){

        $product = $this->product->editProduct($id);

        return view('product.edit')->with('product', $product);

    }

    public function update(Request $request, $id)
    {

        // validate and store data
        // $request->validate([
        //     'picture' => 'required',
        //     'title' => 'required',
        //     'price' => 'required',
        //     'description' => 'required'
        // ]);

        //image upload

        $data = $request->all();


        if($image = $request->file('img')){

            $name = time (). "." .$image->getClientOriginalName();
            $image->move(public_path('images'),$name);
            $data ['img'] = $name;
        }



        $this->product->updateProduct($id, $data);

        return redirect('/products');

    }
}