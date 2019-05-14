<?php

namespace App\Http\Controllers;

use App\shoppingCart;
use Session;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $shoppingCart = Session::get('cart');        

        return view('cart' , ['cart' => $shoppingCart]);
    }

    public function store()
    {      
        if (session()->has('cart')) {

            $shoppingCart = Session::get('cart');
        }else{

            $shoppingCart = new ShoppingCart;            
        }  

        $shoppingCart->add($_POST['name'], $_POST['amount'], $_POST['price'], $_POST['id']);        
        Session::put('cart', $shoppingCart);   

        return redirect()->back();
    }

    public function update($id)
    {
        $shoppingCart = Session::get('cart');
     
        $shoppingCart->editProductAmount($id, $_POST['amount']);
        
        Session::put('cart', $shoppingCart); 
        
        return redirect()->back();
    }

    public function destroy($id)
    {   
        $shoppingCart = Session::get('cart');
     
        $shoppingCart->delete($id);
        
        Session::put('cart', $shoppingCart); 
        
        return redirect()->back();         
    }

}