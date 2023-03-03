@extends('layouts.app')

@section('content')
<div id="home">
        <div class="container text-center">
            <nav id="menu" data-toggle="offcanvas" data-target=".navmenu">
                <span class="fa fa-bars"></span>
            </nav>
            <div class="content">
                <h4>Welcome.Take a look of our products</h4>
                <hr>
                <div class="header-text btn">
                    <h1><span id="head-title"></span></h1>
                </div>
            </div>
            <div class="col-md-3">
                
                
                <div class="card">
                    <div class="card-header"><h4>Brands</h4></div>
                    <div class="card-body">
                        <label class="d-block">
                            <input type="checkbox" name="categorySort" value=""/>Adidas
                        </label>
                        <label class="d-block">
                            <input type="checkbox" name="categorySort" value=""/>Nike
                        </label>
                        <label class="d-block">
                            <input type="checkbox" name="categorySort" value=""/>Jordan
                        </label>
                    </div>
                </div>
                
                <form action="{{url('/prices')}}" method="get">
                    
                     <div class="card">
                    <div class="card-header"><h4>Prices</h4></div>
                    <div class="card-body">
                        <label class="d-block">
                            <input type="radio" name="priceSort" value="high-to-low" />High to Low
                        </label>
                        <label class="d-block">
                            <input type="radio" name="priceSort" value="low-to-high"/>Low to High
                        </label>
                    </div>
                </div>
                
                </form>
               
                
                
                
                
            </div>
            
            <form action="{{url('search')}}" method="get" class="form-inline" style="float: right">
                <input class="form-control" type="search" name="search" placeholder="search"/>
                <input type="submit" value="Search" class="btn btn-success"/>
            </form>
<div style="width: 100%; height: auto; margin: 50px 0; display: flex; flex-wrap: wrap; justify-content: center;">
   @foreach ($products as $product)
   
   <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
   
        <div style="width: 300px; height: auto; border: 1px solid black; margin: 20px;">
            <div style="width: 100%; height: 280px; background-image: url('assets/products/{{$product->image}}'); 
                        background-size: cover; background-position: center center;"></div>
            <div style="width: 100%; height: auto;">
                <a href="product/{{$product->id}}" style="text-align: center; font-weight: bold; font-style: normal; color: inherit;"><h3 >{{ $product->name}}</h3></a>
                <h4 style="display: flex; justify-content: flex-start; padding: 10px; padding-top: 30px;"> {{ $product->price}}€</h4>
            </div>
            <button class="px-4 py-2 text-white bg-blue-800 rounded" style="background-color:green">Add To Cart</button>
        </div>
        
        </form>
        
    @endforeach
    </div>
    
    @if(method_exists($products,'links'))
    <div class="d-flex justify-content-center">
        {!! $products->links() !!}
    </div>
    @endif
    @if(session('message'))
        <div class="alert alert-success myalert">{{ session('message') }}</div>
    @endif
    <!-- Services Section -->
    <div id="services">
        <div class="container text-center">

            <div class="space"></div>

            
            @auth
                <div class="text-center" style="margin: 30px 0;">
                   
                </div>
            @endauth
            <a href="#works" class="down-btn page-scroll">
                <span class="fa fa-angle-down"></span>
            </a>
        </div>
    </div>
@endsection