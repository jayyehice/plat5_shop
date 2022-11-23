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
        $products = Product::where('name', 'like', '%'.$keyword.'%')->orwhere('description', 'like', '%'.$keyword.'%')->get()->makeHidden('types');
        $types = $products->flatMap->types->unique('id')->values();

        return ['products' => $products, 'types' => $types];
    }

    public function filterProducts()
    {
        $products = Product::whereHas('types', function ($query) {
            $query->where('kind', '顏色')->whereIn('name', request('types'));
        })->whereHas('types', function ($query) {
            $query->where('kind', '口味')->whereIn('name', request('types'));
        })->get();
        
        return ['products' => $products];
    }
}