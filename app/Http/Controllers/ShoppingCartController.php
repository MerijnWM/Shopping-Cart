<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function store()
    {
        $cart = new ShoppingCart();
        $cart->add($product, $amount);

        return redirect()->back();
    }

    public function delete()
    {

    }
}