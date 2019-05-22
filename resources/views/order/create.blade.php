@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fas fa-shopping-cart"></i></div>

                <div class="card-body">
                    
                    @if($cart->getTotalPrice() == 0)

                        <div class="row"> 
                            <div class="col-sm">
                              Er zijn geen producten in je winkelwagen!!
                            </div>                                          
                        </div>

                    @else

                         @foreach($cart->getCart() as $product)
                            <div class="row">                                                           
                                <div class="col-4">
                                    {{ $product['name'] }}
                                </div> 
                                <div class="col-3">                                     
                                    € {{ $product['price'] }},- per stuk                          
                                </div>
                                <div class="col-3">
                                    {{ Form::open(array('url' => '/cart/' . $product['id'], 'class' => 'form-row')) }}
                                    {{ Form::number('amount', $product['amount'], ['class' => 'form-control col-6']) }}
                                    {{ Form::hidden('_method', 'PUT') }}
                                    {{ Form::hidden('id', $product['id'])}}                                    
                                    {{ Form::button('bewerk', array('class'=>'btn-sm col-6', 'type'=>'submit')) }}
                                    {{ Form::close() }}                                                               
                                </div>                               
                                                                 
                                <div class="col-2">
                                    {{ Form::open(array('url' => 'cart/' . $product['id'], 'class' => 'float-right'))}}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('verwijder', array('class' => 'btn-sm')) }}
                                    {{ Form::close() }}                                                              
                                </div>                
                            </div>
                        @endforeach 

                    @endif

                </div>
                <div class="card-footer text-muted">
                    <div class="row">                   
                        <div class="col-3">
                            Total :  € <? if(count($cart) != 0){echo $cart->getTotalPrice();} else{echo 0;} ?>,-
                        </div>
                        <div class="col-9 m-auto">
                                {{ Form::open(array('url' => '/order', 'class' => 'form-row')) }}
                                {{ Form::label('streetname', 'Straatnaam') }}
                                {{ Form::text('streetname','', ['class' => 'form-control','required' => 'required']) }}
                                {{ Form::label('housenumber', 'Huisnummer') }}
                                {{ Form::number('housenumber','', ['class' =>'form-control','required' =>'required']) }}
                                {{ Form::label('postalcode', 'Postcode') }}
                                {{ Form::text('postalcode','', ['class' => 'form-control', 'required' => 'required']) }}
                                {{ Form::button('Bevestigen', array('class'=>'btn btn-primary form-control', 'type'=>'submit')) }}
                                {{ Form::close() }}                                                               
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection