<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductsController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::all();
        return ['products' => $products];
    }

    public function getActiveProducts()
    {
        $products = Product::activeProducts()->get();
        return ['products' => $products];
    }
}
