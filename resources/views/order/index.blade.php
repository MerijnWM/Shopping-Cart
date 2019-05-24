@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lopende orders</div>

                <div class="card-body">
                    @if(count($orders) != 0 )
                        <div class="row"> 

                        	<table class="table">
                            		<thead>
                            			<th>Besteld</th>
                            			<th>Adres</th>
                            			<th>Postcode</th>                            			
                            			<th>Status</th>
                            		</thead>  

                            @foreach($orders as $order)                            
                            	
                            		<tbody>  
                            			<td>{{$order->created_at->format('d-m-Y')}}</td>                          			
                            			<td>{{$order->streetname . ' ' . $order->housenumber}}</td>  
                            			<td>{{$order->postalcode}}</td>          			
                            			<td>{{$order->status}}</td>
                            			<td><a href="{{url('/order/' . $order->id)}}" class="btn">Details</a></td>
                            		</tbody>

                            @endforeach
                            </table>
                        </div>
                        
                    @else
                        
                            <div class="row"> 
                                <div class="col-sm">
                                  Er zijn geen lopende orders!!
                                </div>                                          
                            </div>                        

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection