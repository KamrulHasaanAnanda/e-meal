@extends('layouts.app')

@section('content')
<div class="admin-table">
    
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
            @foreach ($userList as $user)
                
            <tr>
              <td>{{$user->name}}</td>
              <td>{{$user->userList->mobile}}</td>
              <td>
                <select class="custom-select">
                  <option value="1">Manager</option>
                  <option value="2">User</option>
                </select>
              </td>
              <td>
                
              </td>
              <td>
                <button type="button" class="btn btn-secondary">Secondary</button>
                <button type="button" class="btn btn-danger">Danger</button>
              </td>
            </tr>
            @endforeach
          <tr>
        </tbody>
      </table>
</div>

@endsection
