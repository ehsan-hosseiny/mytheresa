<?php

namespace Tests\Model;

use App\Models\Category;
use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{

    /** @test */
    public function canHandleCorrectPrice()
    {
        $category = Category::first();
        $product = Product::create([
            'category_id' => $category->id,
            'name' => 'lorem',
            'price' => 1500,
            'discount' => 0
        ]);
        $this->assertEquals( $category->id, $product->category_id );
    }
}
