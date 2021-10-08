@extends('layouts.app')

@section('content')
<div class="container">
    <div class="add-user">
      {{-- <h3 class="add-user-h3 text-center">Edit profile</h3> --}}
      @if (session('success'))
                          
      <div class="alert alert-warning alert-success fade show" role="alert">
          <strong>{{session('success')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif
  
    <form class="add-form" action="{{route('manager.update_meal',[$meal[0]->id])}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group forms">
        <label for="Enter your name" style="font-size:large;
        font-weight: bold">Name</label>
        {{-- @php
            dd($meal[0]->name);
        @endphp --}}
        <input type="text" name="name" value={{$meal[0]->name}} class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
      </div>
      <div class="form-group forms">
        <input type="file" name="meal_img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
      </div>

      <button type="submit" class="btn btn-big">Submit</button>
    </form>
  </div>
  </div>
@endsection