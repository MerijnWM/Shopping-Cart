<?php

namespace App;

class ShoppingCart 
{
	private $cart, $totalPrice;

	public function add($name, $amount, $price, $id)
	{
		//if product is in cart, add to amount
		for($count = 0; $count < count($this->cart); $count++){
        
            if($id == $this->cart[$count]['id']){ 
            	$this->cart[$count]['amount'] += $amount;
                return;
            }
        } 
		$this->cart[] = ['name' => $name, 'amount' => $amount, 'price' => $price, 'id' => $id];
		
	}

	public function editProductAmount($id, $amount)
	{
		for($count = 0; $count < count($this->cart); $count++){
        	
			if($id == $this->cart[$count]['id']){ 

				if($amount == 0){					
					unset($this->cart{$count});

					$this->cart = array_values($this->cart);
					return;
				}else{
					$this->cart[$count]['amount'] = $amount;
					return;
				}
			}
        }         
	}

	public function delete($id)
	{    
		for($count = 0; $count < count($this->cart); $count++){
        
            if($id == $this->cart[$count]['id']){               
                unset($this->cart{$count});
            }
        } 

        $this->cart = array_values($this->cart);
	}

	public function getTotalPrice()
	{
		$this->totalPrice = 0;

		if(empty($this->cart) == false){
			
			foreach($this->cart as $product){
				$this->totalPrice += $product['amount'] * $product['price'];
			}
		}		

		return $this->totalPrice;
	}	

	public function getCart()
	{
		return $this->cart;
	}
}