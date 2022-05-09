<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = resolve(ProductRepository::class)->show($request->input('category'), $request->input('priceLessThan'));
        return response()->json($data, Response::HTTP_OK);
    }
}
