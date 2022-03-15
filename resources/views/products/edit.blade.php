@extends('layouts.master')
@section('title', 'Update Product')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session ('status'))

<div class="alert alert-success">{{ session('status') }}</div>
@endif
            <div class="card">
                <div class="card-header">
<h4> 
    Update Product
    <a href="{{url('products')}}" class="btn btn-danger float-end">Back</a>
</h4>

</div>
                <div class="card-body">
    <form action="{{ url('products/'.$product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
            <div class="form-gruop mb-3">
                <label for="">Product image</label>
                <input type="file" class="form-control" name="image" >
                <img src="{{asset('uploads/image/'.$product->image)}}" width="100" height="100" alt="">
        </div>
        <div class="form-gruop mb-3">
        <label for="">Product name</label>
    <input type="text" class="form-control" name="_name"  value="{{$product->name}}">
  </div>
  <div class="form-gruop mb-3">
  <label for="">Price</label>
    <input type="text" class="form-control" name="_price"  value="{{$product->price}}">
  </div>
  <div class="form-gruop mb-3">
  <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
