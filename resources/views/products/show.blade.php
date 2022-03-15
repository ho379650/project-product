@extends('layouts.master')
@section('title', 'Product Detail')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
<h4> 
    Product Detail
    <a href="{{url('products')}}" class="btn btn-danger float-end">Back</a>
</h4>

</div>
                <div class="card-body">
               
                     Product image: <b> <img src="{{asset('uploads/image/'.$product->image)}}" width="100" height="100" alt=""></b><br>
                     Product name: <b> {{$product->name}}</b><br>
                     Price: <b> {{$product->price}}</b><br>
                     
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
