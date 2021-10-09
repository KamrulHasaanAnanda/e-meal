@extends('layouts.app')

@section('content')
<div class="admin-table">
    <nav class="navbar navbar-light bg-light">
      <form class="form-inline search-form">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 height-3" type="submit">Search</button>
      </form>
    </nav>
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">User name</th>
            <th scope="col">User mobile</th>
            <th scope="col">Assign</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->userList->mobile}}</td>
              <td>
                <select class="custom-select" name="type">
                  @if ($user->userList->type == "user")
                  <option value="user" selected>User</option>
                  <option value="manager">Manager</option>
                  @elseif($user->userList->type == "manager")
                  <option value="manager" selected>Manager</option>
                  <option value="user">User</option>
                  @else
                  <option value="1" selected>Not selected</option>
                  <option value="manager">Manager</option>
                  <option value="user">User</option>
                  @endif
                </select>
              </td>
              <td>
                {{$user->userList->type}}
              </td>
              @php
                  // dd(Auth::user());
                 
              @endphp
              <td>
                @if (Auth::id() == 1)
                <a href={{route('admin.user_edit',[$user->id])}} class="btn btn-secondary">Edit</a>
                <a href={{route('admin.user_delete',[$user->id])}} onClick="return confirm('Are you want to delete?')" class="btn btn-danger">Delete</a>
                @endif
                <a href={{route('message.message_view',[$user->id])}} class="btn btn-secondary">Contact</a>
              </td>
            </tr>
            @endforeach
          <tr>
        </tbody>
      </table>
</div>

@endsection
