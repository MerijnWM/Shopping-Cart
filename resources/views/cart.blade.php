@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fas fa-shopping-cart"></i></div>

                <div class="card-body">
                    
                    @if(count($cart) == 0)

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
                                <div class="col-2">
                                    {{ Form::open(array('url' => '/cart', 'class' => 'form-row')) }}
                                    {{ Form::number('amount', $product['amount']) }}
                                    {{ Form::hidden('name', $product['name'])}}
                                    {{ Form::hidden('price', $product['price'])}}
                                    {{ Form::hidden('id', $product['id'])}}
                                    {{ Form::submit('+')}}
                                    {{ Form::close() }}                                                               
                                </div>                               
                                                                 
                                <div class="col-3">
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
                    Total :  € <? if(count($cart) != 0){echo $cart->getTotalPrice();} else{echo 0;} ?>,-
                    <a href="#" class="btn btn-primary float-right">Bestel</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection