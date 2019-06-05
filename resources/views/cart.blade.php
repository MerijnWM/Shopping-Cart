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
                                    <a class="btn" href="{{url('/product/'.$product['id'])}}">{{ $product['name'] }}</a>
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
                    Total :  € <? if($cart->getTotalPrice() != 0){echo $cart->getTotalPrice() . '<a href="'. url('/order/create'). '" class="btn btn-primary float-right">Bestel</a>';} else{echo $cart->getTotalPrice();} ?>,-                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection