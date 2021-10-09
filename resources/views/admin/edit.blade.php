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
  
    <form class="add-form" action="{{route('admin.update_user',[$users[0]->id])}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group forms">
        <label for="Enter your name" style="font-size:large;
        font-weight: bold">Name</label>
        <input type="text" name="name" value={{$users[0]->name}} class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
        @error('name')	
								<span style="color: red">*{{ $message }}</span><br><br>
						@enderror
      </div>
      <div class="form-group forms">
        <label for="exampleInputEmail1" style="font-size:large;
        font-weight: bold">Email address</label>
        <input type="email" name="email" value={{$users[0]->email}} class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        @error('email')	
								<span style="color: red">*{{ $message }}</span><br><br>
						@enderror
      </div>
      <div class="form-group forms">
        <label for="exampleInputEmail1" style="font-size:large;
        font-weight: bold">Phone number</label>
        <input type="text" name="mobile" value={{$users[0]->userList->mobile}} class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone">
      </div>
      <div class="form-group forms">
        <input type="file" name="user_img" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
        @error('user_img')	
								<span style="color: red">*{{ $message }}</span><br><br>
						@enderror
      </div>

      <button type="submit" class="btn btn-big">Submit</button>
    </form>
  </div>
  </div>
@endsection