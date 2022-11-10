<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::all();
        return ['products' => $products];
    }
}
