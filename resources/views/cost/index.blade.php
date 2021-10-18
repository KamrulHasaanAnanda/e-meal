@extends('layouts.app')

@section('content')
<div class="meal-system my-2">
    <div class="meal-head ml-2">
        <a class="meals-add " href={{route('income.add')}}> Add Income</a>
        {{-- <a class="meals-add ml-3" href={{route('manager.meal')}}> Meals</a> --}}
       
        <div><h3 style="font-weight: bold" class="ml-2 mt-3">Total money<span class="start">
            
       {{$total_income}} </span>  and Total Spend:<span class="start"> {{$total_cost}} </span>money Left: <span class="start"> {{$total_money}} </span> </h3>
    
       </div>
    </div>
    {{-- @php
        dd($costs);
    @endphp --}}
    @if (!empty($costs))
    <div class="meal-table my-2">
        @if (session('success'))
                      
          <div class="alert alert-warning alert-success fade show" role="alert">
              <strong>{{session('success')}}</strong>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          @endif
        <nav class="navbar navbar-light bg-light">
            <form class="form-inline search-form" style="margin-left: auto">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0 height-3" type="submit">Search</button>
            </form>
          </nav>
        <table class="table table-hover c-point">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col ml-2">user</th>
                <th scope="col ml-2">Total cost</th>
                <th scope="col ml-2">Cost by Items</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($costs as $cost)
                <tr>
                  {{-- @php
                      dd($cost->total_cost);
                  @endphp --}}
                        <td>{{$cost->date}}</td>
                        @if ($cost->user)

                        <td>{{$cost->user->name}}</td>
                            
                        @endif
                        <td>
                          <span class="meal-table-h3">{{$cost->total_cost}}</span>
                        </td>
                
                            {{-- <td>
                              <a href={{route('manager.meal_update',[$date->id])}}  class="btn btn-secondary">Assign to another User</a>
                            </td>                                                    --}}
                    
                    
                </tr>
                @endforeach
             
            </tbody>
          </table>
    </div>
        
    @endif
    </div>
</div>

<script>
    function checkStartDate(){
        let start_date = document.getElementById("start_date");
        let current_date = document.getElementById("current_date");
        
        let message = document.getElementById("message");
        // console.log(`current_date`, current_date.value);
        var g1 = new Date(start_date.value);
        var g2 = new Date();
        // console.log(`g2`, g2)

        if (g1.getTime() < g2.getTime())
            {
                document.getElementById("start_date").value = current_date.value;
                // console.log(`start_date`, start_date.value)
                message.classList.remove("d-none");

            }else if (g1.getTime() > g2.getTime()){
                document.getElementById("end_date").value = document.getElementById("start_date").value;
                

            } else{
            console.log("both are equal");
            }
        }

        function checkEndDate(){
        let s_date = document.getElementById("start_date");
        let current_date = document.getElementById("current_date");
        let e_date = document.getElementById("end_date");
        let message = document.getElementById("message");

        var end_date = new Date(e_date.value);
        var start_date = new Date(s_date.value);
        if (end_date.getTime() < start_date.getTime())
            {
                e_date.value = s_date.value
                message.classList.remove("d-none");

            }else if (end_date.getTime() > start_date.getTime()){
                console.log("g1 is greater than g2");
                

            } else{
            console.log("both are equal");
            }
        }
</script>
@endsection