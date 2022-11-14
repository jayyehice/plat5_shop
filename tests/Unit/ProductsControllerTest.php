<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use App\Models\Product;
use App\Http\Controllers\ProductsController;

class ProductsControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $product_data = [
        'name'=> 'pineapple',
        'description'=> '鳳梨',
        'price'=>80
    ];

    public function setUp(): void
    {
        Product::create($this->product_data);
        parent::setUp();
    }

    public function testGetAllProducts()
    {
        $this->get('products/getAllProducts')->assertOk()->assertJson(['products' => $this->product_data]);
    }

}
