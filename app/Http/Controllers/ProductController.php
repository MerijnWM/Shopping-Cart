<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function index()
    {
    	$products = Product::all();
        return view('products', ['products' => $products, 'active' => 'all']);
    }

    public function show($product_id)
    {
    	$product = Product::where('id', '=', $product_id)->first();
        return view('product', ['product' => $product, 'active' => '1']);
    }
}