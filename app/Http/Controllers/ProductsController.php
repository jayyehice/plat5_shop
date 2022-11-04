<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    //顯示所有資料
    public function getAllProducts()
    {
        $products = Product::all();
        return ['products' => $products];
    }
}
