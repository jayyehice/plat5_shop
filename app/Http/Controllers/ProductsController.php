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
    
    public function searchProducts(Request $request)
    {
        $keyword = $request->keyword;
        $querys = Product::where('name', 'like', "%".$keyword."%")->orwhere('description', 'like', '%'.$keyword.'%')->get();
        $products = [];
        $types = [];

        foreach($querys as $query){

            foreach($query->types as $type){
                unset($type["pivot"]);
                array_push($types, $type);
            }

            unset($query["types"]);
            array_push($products, $query);

        }

        $types = array_unique($types);
        $types = array_values($types);

        return ['products' => $products, 'types' => $types];
    }
}
