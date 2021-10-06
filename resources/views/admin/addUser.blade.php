@extends('layouts.app')

@section('content')
<div class="container">
  <div class="add-user">
    <h3 class="add-user-h3 text-center">Add new User</h3>
  <form class="add-form">
    <div class="form-group forms">
      <label for="exampleInputEmail1" style="font-size:large;
      font-weight: bolder">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group forms">
      <label for="exampleInputEmail1" style="font-size:large;
      font-weight: bolder">Phone number</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone">
    </div>
    <button type="submit" class="btn btn-big">Submit</button>
  </form>
</div>
</div>
@endsection