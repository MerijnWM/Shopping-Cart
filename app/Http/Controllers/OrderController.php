<?php

namespace App\Http\Controllers;

use Session;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function create(Request $request)
    {
    	$request->user()->authorizeRoles(['Customer', 'Admin']);

    	$shoppingCart = Session::get('cart');
    	return view('order', ['cart' => $shoppingCart ]); 
    }

    public function store(Request $request)
    {
    	$order = new Order;
    	
        $order->user_id = $request->user()->id;
        $order->streetname = $request->streetname;
        $order->housenumber = $request->housenumber;
        $order->postalcode = $request->postalcode;

        $order->save();
    }
}
