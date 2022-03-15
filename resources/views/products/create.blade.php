@extends('layouts.master')
@section('title', 'Add Product')
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
    All Product
    <a href="{{url('products')}}" class="btn btn-danger float-end">Back</a>
</h4>
</div>
                <div class="card-body">
    <form action="{{ url('products') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-gruop mb-3">
        <label for="">Product name</label>
    <input type="text" class="form-control" require name="_name"  placeholder="Input product name">
  </div>
  <div class="form-gruop mb-3">
  <label for="">Price</label>
    <input type="text" class="form-control" require name="_price"  placeholder="Input product Price ">
  </div>
  <div class="form-gruop mb-3">
  <label for="">Image(File Upload)</label>
    <input type="file" class="form-control"  name="image"  placeholder="Input product image ">
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
