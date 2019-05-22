@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link <?php if($active == 'all'){ echo 'active';} ?>" href="{{ url('/') }}">Alle</a>
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

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                    @if(count($products) != 0 )
                        <div class="row">      

                            @foreach($products as $product)                              

                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">                                            
                                            <img class="card-img-top" src="{{url('img/'. $product->name .'.jpg')}}" style="height: 170px;">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">€{{ $product->price }},- per stuk</p>
                                            <a href="{{url('/product/'. $product->id )}}" class="btn btn-primary">Bekijk</a>
                                        </div>
                                    </div>
                                </div>                              

                            @endforeach
                        </div>
                        
                    @else
                        
                            <div class="row"> 
                                <div class="col-sm">
                                  Er zijn geen producten in deze categorie!!
                                </div>                                          
                            </div>                        

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
