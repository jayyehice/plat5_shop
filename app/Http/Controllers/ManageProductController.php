<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\AddProductRequest;

class ManageProductController extends Controller
{
    public function addProduct(AddProductRequest $request){
        $product = Product::create($request->all());
        return ['product'=> $product];  
    }
}