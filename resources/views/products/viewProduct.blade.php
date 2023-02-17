@extends('layouts.app')

@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="item-entry">
                    <!--<div style="width: 100%; height: 280px; background-image: url('assets/products/{{$products->image}}'); 
                        background-size: cover; background-position: center center;;"></div>-->
                        <img src="{{asset('/storage/products/'.$products->image) }}" width="100%" height="450px" alt=""/>
                </div>
            </div>
            <div class="col-md-6">
                <h2>{{$products->name}}</h2>
                <p>{{$products->description}}</p>
                <p style="font-size: 30px"><strong>{{$products->price}}€</strong></p>
            </div>
            <input type="submit" value="Add to cart" class="btn btn-success" style="margin-bottom: 30px; margin-left: 575px;"/>
        </div>
        
    </div>
</div>
@endsection