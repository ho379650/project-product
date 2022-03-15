@extends('layouts.master')
@section('title', 'All Products')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        @if(session ('status'))

<div class="alert alert-success">{{ session('status') }}</div>
@endif
            <div class="card">
                <div class="card-header">
<h4> 
    All Products
    <a href="{{url('products/create')}}" class="btn btn-primary float-end">Add Product</a>
</h4>
</div>
                <div class="card-body">
                    <table class="table table-striped table-Default">
                        <tr>
                             <th>Image</th>
                            <th>Product Name</th>
                            <th>Price</th>
                    <th colspan="3" width="25%">Action</th>     
                        </tr>
                        @foreach($product as $pr)
                    <tr>
                    <td>
                            <img src="{{asset('uploads/image/'.$pr->image)}}" width="100" height="100" alt="">
                        </td>
                        <td> <b> {{$pr->name}}</b></td>
                        <td> <b> {{$pr->price}}</b></td>
                        <td>
                        <form  action="{{url('products/'.$pr->id)}}">
                            @csrf
                            @method('GET')
                            <button type="submit" class="btn btn-primary">Detail</button>
                            </form>
                        </td>
                        <td>
                        <form  action="{{url('products/'.$pr->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                      </td>
                        <td>
                        <form  action="{{url('products/'.$pr->id.'/edit')}}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-warning">Edit</button>
                            </form>
                        </td>
                        
                    </tr>
                  @endforeach
                    </table>
    
                </div>


                
                
            </div>
        </div>
    </div>
</div>
@endsection
