<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Models\Product;

class ManageProductController extends Controller
{
    public function addProduct(AddProductRequest $request)
    {
        $product = Product::create($request->all());
        return ['product' => $product];
    }

    public function updateProduct(AddProductRequest $request)
    {
        $updated = Product::findOrFail(request('id'))->update(request()->all());
        return ['updated' => $updated];
    }

    public function deleteProduct(Product $product)
    {
        $deleted = $product->delete();
        return ['deleted' => $deleted];
    }

    public function uploadProductPicture()
    {
        $filename = request('photo')->getClientOriginalName();
        $uploadPicture = request('photo')->storeAs('img', $filename, 'public');
        return ['uploadPicture' => $uploadPicture];
    }
}
