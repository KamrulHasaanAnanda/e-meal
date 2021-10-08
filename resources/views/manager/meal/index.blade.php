@extends('layouts.app')

@section('content')
<div class="admin-table">
    <nav class="navbar navbar-light bg-light">
      <form class="form-inline search-form">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 height-3" type="submit">Search</button>
      </form>
    </nav>
    <table class="table table-hover text-center">
        <thead>
          <tr>
            <th scope="col">Meal name</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
            @foreach ($meals as $meal)
                
            <tr>
              <td>{{$meal->name}}</td>
              <td>
                  <img src={{$meal->meal_img}} alt="" style="height: 4rem;
                  width: 5rem" srcset="">
              </td>
             
              <td>
                <a href={{route('manager.meal_edit',[$meal->id])}} class="btn btn-secondary">Edit</a>
                <a href={{route('manager.meal_delete',[$meal->id])}} onClick="return confirm('Are you want to delete?')" class="btn btn-danger">Delete</a>
              </td>
            </tr>
            @endforeach
          <tr>
        </tbody>
      </table>
</div>

@endsection
