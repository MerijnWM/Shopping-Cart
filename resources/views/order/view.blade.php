@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Order Details</div>

                <div class="card-body">
                    
                    <div class="row"> 

                    	<table class="table">

                        		<thead>
                        			<th>Besteld</th>
                        			<th>Adres</th>
                        			<th>Postcode</th>                            			
                        			<th>Status</th>
                                    <th>Producten</th>
                        		</thead>                                                     
                        	
                        		<tbody>  
                        			<td>{{$order->created_at->format('d-m-Y')}}</td>                       			
                        			<td>{{$order->streetname . ' ' . $order->housenumber}}</td>  
                        			<td>{{$order->postalcode}}</td>          			
                        			<td>{{$order->status}}</td> 
                                    <td>
                                        <table class="table">

                                            <thead>
                                                <th>Product</th>
                                                <th>Prijs Per stuk</th>
                                                <th>Aantal</th>                 
                                            </thead>                                                     
                                        
                                            <tbody>
                                                @foreach($products as $product) 
                                                    <tr> 
                                                        <td>{{$product->name}}</td>                               
                                                        <td>€ {{$product->price}},-</td>  
                                                        <td>{{$product->pivot->amount}}</td>   
                                                    </tr>
                                                @endforeach                  
                                                                                
                                            </tbody>
                                    
                                        </table>
                                    </td>                      			
                        		</tbody>
                        </table>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection