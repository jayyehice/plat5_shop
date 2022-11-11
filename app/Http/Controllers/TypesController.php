<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypesController extends Controller
{
    public function getAllTypes()
    {
        $types = Type::all();
        return ['types' => $types];
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
