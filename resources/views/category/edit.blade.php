@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row  mt-5">

        <a href="{{route('category.index')}}"><button class="btn btn-dark mb-3">Back</button></a>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="col-md-6 mb-3">
        <div class="card">
            <div class="card-header">Edit Category
            </div>
            <div class="card-body">
        <form action="{{route('category.update',$demo->id)}}" method="POST">
            @csrf
           
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Category Name</label>
              <input type="text" class="form-control" value="{{$demo->name}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
             
            </div>
           
            
            <button type="submit" class="btn btn-primary col-12 ">Update</button>
  
          </form>
            </div>
        </div>
    </div>
   
    </div>
</div>
@endsection


