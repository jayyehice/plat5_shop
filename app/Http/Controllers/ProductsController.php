<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;

class ProductsController extends Controller
{
    public function getAllProducts()
    {
        $products = Product::all();
        return ['products' => $products];
    }
    

    public function getAllTypes()
    {
        $types = Type::all();
        return ['types' => $types];
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



    public function filterProducts(Request $request)
    {
        $type_parameters = $request->types;
        $querys = Type::query();
        $products = [];
        $types = [];

        foreach($type_parameters as $type_parameter){
            $querys = $querys->orwhere('name', $type_parameter);
        }

        $querys = $querys->get();


        foreach($querys as $query){

            foreach($query->products as $product){
                unset($product["pivot"]);
                array_push($products, $product);
            }

            unset($query["products"]);
            array_push($types, $query);
        }

        $products = array_diff_assoc ( $products, array_unique($products) );
        $products = array_values($products);

        return ['products' => $products, 'types' => $types];
    }
}
