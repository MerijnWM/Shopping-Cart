<?php

namespace App\Http\Controllers;

use App\shoppingCart;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    private $shoppingCart;

    public function __construct()
    {
        $this->shoppingCart = new ShoppingCart; 
    }

    public function index(request $request)
    {       
        return view('cart' , ['cart' => $this->shoppingCart->getCart(), 'totalPrice' => $this->shoppingCart->getTotalPrice()]);
    }

    public function store()
    { 
        $this->shoppingCart->add($_POST['name'], $_POST['amount'], $_POST['price'], $_POST['id']);        

        return redirect()->back()->with('message', $_POST['amount'] .' Toegevoegd aan winkelwagen');;
    }

    public function update($id)
    {       
        $this->shoppingCart->editProductAmount($id, $_POST['amount']);        
        
        return redirect()->back();
    }

    public function destroy($id)
    {   
        $this->shoppingCart->delete($id);        
        
        return redirect()->back();         
    }

}