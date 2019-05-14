<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
	public function show($category)
    {
    	dd($category);
		$products = Category::find(2)->products;
    	dd($products);
    	$products = Product::whereIn('id', '=',  $product_category->id)->all();
        return view('home', ['products' => $products, 'active' => $category]);
    }
}