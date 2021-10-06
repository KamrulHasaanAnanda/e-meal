@extends('layouts.app')

@section('content')
<div class="container">
  <div class="add-user">
    <h3 class="add-user-h3 text-center">Add new User</h3>
  <form class="add-form" action="{{route('admin.store_user')}}" method="post">
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