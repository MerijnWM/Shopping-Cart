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
    	$categories = Category::where('name', '=', $category)->first();

		$products = Category::find($categories->id)->products;	
    	
        return view('products', ['products' => $products, 'active' => $category]);
    }
}