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

    public function index()
    {
        $orders = Order::all();
        return view('order/index', ['orders' => $orders]);
    }

    public function create(Request $request)
    {
    	$shoppingCart = Session::get('cart');
    	return view('order/create', ['cart' => $shoppingCart ]); 
    }

    public function show($order_id)
    {
        $order = Order::where('id', '=', $order_id)->first();
        $products = Order::where('id', '=', $order_id)->first()->products;

        return view('order/view', ['order' => $order, 'products' => $products]);
    }

    public function store(Request $request)
    {
    	$order = new Order;

        $order->user_id = $request->user()->id;
        $order->streetname = $request->streetname;
        $order->housenumber = $request->housenumber;
        $order->postalcode = $request->postalcode; 
        $order->status = 'processing'; 
        
        $order->save() ;
        
        $shoppingCart = Session::get('cart');         
        foreach($shoppingCart->getCart() as $product){
            $order->Products()->attach($product['id'], ['amount'=> $product['amount'] ]);                      
        }   

        session()->forget('cart');
        return redirect()->route('home')->with('message', 'Uw order is succesvol ontvangen');
    }
}
