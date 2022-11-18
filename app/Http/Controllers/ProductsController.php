<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
    
    public function searchProducts()
    {
        $keyword = request('keyword');
        $products = Product::where('name', 'like', "%".$keyword."%")->orwhere('description', 'like', '%'.$keyword.'%')->get();
    
        $types = collect($products)->map(function($value){
            return $value->types;
        });
        $types = collect($types)->collapse()->map(function ($value) {
            return collect($value)->forget('pivot');
        })->unique()->values()->all();

        $products = collect($products)->map(function ($product) {
            return collect($product)->forget('types');
        })->all();

        return ['products' => $products, 'types' => $types];
    }

    public function filterProducts()
    {
        $products = collect(request('types'))->map(function ($type){
            return Product::whereHas('types', function($query) use($type){
                $query->where('name', $type);
            })->get();
        })->collapse();

        $products = $products->diffAssoc($products->unique())->values()->all();

        return ['products' => $products];
    }
}