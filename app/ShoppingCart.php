<?php

namespace App;
use Session;

class ShoppingCart 
{
	private $cart, $totalPrice;

	public function putSessionInCart()
	{
		if(session()->has('cart')){
            $this->cart = Session::get('cart');
        }else{
            $this->cart = [];            
        }      
	}

	public function add($name, $amount, $price, $id)
	{	

		$this->putSessionInCart();
		//loop through cart
		for($count = 0; $count < count($this->cart); $count++){
        	//check if current product is equal to product in request
            if($id == $this->cart[$count]['id']){ 
            	//add to product amount and put in session
            	$this->cart[$count]['amount'] += $amount;
            	Session::put('cart', $this->cart);
                return;
            }
        } 
        // add to cart and put in session
		$this->cart[] = ['name' => $name, 'amount' => $amount, 'price' => $price, 'id' => $id];		
		Session::put('cart', $this->cart);	
		
	}

	public function editProductAmount($id, $amount)
	{
		$this->putSessionInCart();
		//loop through cart
		for($count = 0; $count < count($this->cart); $count++){
        	//check if current product is equal to product in request
			if($id == $this->cart[$count]['id']){ 
				//if amount is 0 delete from cart
				if($amount == 0){
					//delete product from cart			
					unset($this->cart{$count});
					//reorganize cart array
					$this->cart = array_values($this->cart);
					//add to product amount and put in session
					Session::put('cart', $this->cart);
					return;
				}else{
					//add to product amount and put in session
					$this->cart[$count]['amount'] = $amount;
					Session::put('cart', $this->cart);					
				}
			}
        }  
	}

	public function delete($id)
	{    
		$this->putSessionInCart();
		//loop through cart
		for($count = 0; $count < count($this->cart); $count++){
        	//check if current product is equal to product in request
            if($id == $this->cart[$count]['id']){ 
            	//delete product from cart              
                unset($this->cart{$count});
            }
        } 
        //reorganize cart array
        $this->cart = array_values($this->cart);
        //add to product amount and put in session
        Session::put('cart', $this->cart);
	}

	public function getTotalPrice()
	{
		$this->putSessionInCart();
		//reset total price
		$this->totalPrice = 0;
		//check if cart is not empty
		if(empty($this->cart) == false){
			//loop through cart
			foreach($this->cart as $product){
				//add this product amount x price to total price
				$this->totalPrice += $product['amount'] * $product['price'];
			}
		}		
		return $this->totalPrice;
	}	

	public function getCart()
	{	
		$this->putSessionInCart();	
		return $this->cart;
	}
}