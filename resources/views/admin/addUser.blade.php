@extends('layouts.app')

@section('content')
<div class="container">
  <div class="add-user">
    <h3 class="add-user-h3 text-center">Add new User</h3>
    @if (session('success'))
                        
    <div class="alert alert-warning alert-success fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
    @endif

  <form class="add-form" action="{{route('admin.store_user')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="form-group forms">
      <label for="Enter your name" style="font-size:large;
      font-weight: bold">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
    </div>
    <div class="form-group forms">
      <label for="exampleInputEmail1" style="font-size:large;
      font-weight: bold">Email address</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group forms">
      <label for="exampleInputEmail1" style="font-size:large;
      font-weight: bold">Phone number</label>
      <input type="text" name="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone">
    </div>
    <button type="submit" class="btn btn-big">Submit</button>
  </form>
</div>
</div>
@endsection