@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    @foreach($products as $product)

                       <div class="row"> 
                            <div class="col-sm">
                              {{ $product->name }}
                            </div>
                            <div class="col-sm">
                              €{{ $product->price }},- per stuk
                            </div>
                            <div class="col-sm">
                                {{ Form::open(array('url' => '/cart')) }}
                                    {{ Form::number('amount', '1') }}
                                    {{ Form::hidden('name', $product->name)}}
                                    {{ Form::hidden('price', $product->price)}}
                                    {{ Form::hidden('id', $product->id)}}
                                    {{ Form::submit('+')}}
                                {{ Form::close() }}                                
                            </div>                
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
