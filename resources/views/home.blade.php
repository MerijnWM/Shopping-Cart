@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link <?php if($active == 'all'){ echo 'active';} ?>" href="#">Alle</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($active == 'elektronica'){ echo 'active';} ?>" href="{{ url('/category/elektronica') }}">
                                Elektronica
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($active == 'boeken'){ echo 'active';} ?>" href="{{ url('/category/boeken') }}">
                                Boeken
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($active == 'speelgoed'){ echo 'active';} ?>" href="{{ url('/category/speelgoed') }}">
                                Speelgoed
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($active == 'school'){ echo 'active';} ?>" href="{{ url('/category/school') }}">
                                School
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php if($active == 'sport'){ echo 'active';} ?>" href="{{ url('/category/sport') }}">
                                Sport
                            </a>
                        </li>
                    </ul>
                </div>

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
                                {{ Form::open(array('url' => '/cart', 'class' => 'form-row')) }}
                                    {{ Form::number('amount', '1',['class' => 'form-control col-4']) }}
                                    {{ Form::hidden('name', $product->name)}}
                                    {{ Form::hidden('price', $product->price)}}
                                    {{ Form::hidden('id', $product->id)}}
                                    {{ Form::submit('+',['class' => 'form-control col-2'])}}
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
