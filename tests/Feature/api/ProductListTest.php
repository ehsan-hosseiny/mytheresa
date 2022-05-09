<?php

namespace Tests\Feature\api;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProductListTest extends TestCase
{

    /** @test */
    public function product_list()
    {
        $response = $this->get(route('products'), []);
        $response->assertStatus(Response::HTTP_OK);
    }

    /** @test */
    public function product_list_with_wrong_category()
    {
        $response = $this->withHeaders(['category'=>'test'])->get(route('products'), []);
        $response->assertStatus(Response::HTTP_OK);
        $this->assertEquals( $response->baseResponse->original['data'], null );
    }

    /** @test */
    public function product_list_with_high_min_price()
    {
        $response = $this->withHeaders(['priceLessThan'=>1])->get(route('products'), []);
        $response->assertStatus(Response::HTTP_OK);
        $this->assertEquals( $response->baseResponse->original['data'], null );
    }
}

