<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

use Illuminate\Http\Request;

class ManageProductController extends Controller
{
    public function addProduct(AddProductRequest $request)
    {
        $product = Product::create($request->all());
        return ['product' => $product];
    }

    public function updateProduct(UpdateProductRequest $request)
    {
        $updated = Product::findOrFail(request('id'))->update(request()->all());
        return ['updated' => $updated];
    }

    public function deleteProduct($id)
    {
        $deleted = Product::findOrFail($id)->delete();
        return ['deleted' => $deleted];
    }
}
