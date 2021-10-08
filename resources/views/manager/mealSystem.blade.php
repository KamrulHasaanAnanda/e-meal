@extends('layouts.app')

@section('content')
<div class="meal-system my-2">
    <div class="meal-head ml-2">
        <a class="meals-add " href={{route('manager.meal_add')}}> Add Meals</a>
        <a class="meals-add ml-3" href={{route('manager.meal')}}> Meals</a>
        @if (!empty($meal_schedule[0]))     
        <div><h3 style="font-weight: bold" class="ml-2 mt-3">Meals ongoing from <span class="start">
            {{$meal_schedule[0]->start}}
        </span>  to <span class="start"> {{$meal_schedule[0]->end}} </span></h3>
    
       </div>
        <a class="meals-add ml-3" href={{route('manager.meal_stop',[$meal_schedule[0]->id])}}>Stop Meals</a>        
        @endif
    </div>
    @if (!empty($meal_schedule[0]))
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
                <th scope="col ml-2">meal</th>
                <th scope="col ml-2">Action</th>


              </tr>
            </thead>
            <tbody>
                @foreach ($show_dates as $date)
                    {{-- @php
                        dd($date);
                    @endphp --}}
                <tr>
                    <form action={{route('manager.meal_assign',[$date->id])}} method="post">
                        @csrf
                        <td>{{$date->date}}</td>
                        @if (!empty($date->user))
                            <td>
                                Assigned to <span class="meal-table-h3">{{$date->user->name}}</span>
                            </td>  

                            <td>
                              <span class="meal-table-h3">{{$date->meal->name}}</span>
                            </td>
                            <td>
                              <a  class="btn btn-secondary">Assign to another User</a>

                            </td>
                                                                        
                        @else
                            
                        <td>
                            <select class="meal-select" name="user_id">
                                <option selected>Please Select a user</option>
                                    @foreach ($users as $user)
                                    <option value={{$user->id}}>{{
                                        $user->name
                                    }}</option>
                                @endforeach
                                </select>
                            </td>     
                        <td>
                            
                                <select class="meal-select" name="meal_id">
                                 <option selected>Please Select a meal</option>
                                    @foreach ($meals as $meal)
                                    <option value={{$meal->id}}>{{
                                        $meal->name
                                    }}</option>
                                @endforeach
                                </select>
                        </td>
                        <td>
                            <input class="btn btn-secondary" type="submit" value="Submit">
                        </td>
                        @endif
                        
                    </form>
                </tr>
                @endforeach
             
            </tbody>
          </table>
    </div>
        
    @endif

    @if (empty($meal_schedule[0]))
    <form class="mx-3" action={{route('manager.store_meal_system')}} method="POST" enctype="multipart/form-data" style="margin-top: 2rem">
        @csrf
        <div class="form-group forms">
            <div class="d-none" id="message">
                <div class="alert alert-danger alert-success fade show" role="alert">
                    <strong>You can't select previous date</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <label for="Enter your name" style="font-size:large;
            font-weight: bold">Select when to Start meal</label>
                <input id="start_date" type="date" name="start" value="<?php echo date('Y-m-d'); ?>" onchange="checkStartDate()"/>
                <input id="current_date" type="hidden" value="<?php echo date('Y-m-d'); ?>" />
            </div>
        
            <div class="form-group forms">
                
                <div class="d-none">
                
                    <div class="alert alert-danger alert-success fade show" role="alert">
                        <strong>You can't select previous date</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <label for="Enter your name" style="font-size:large;
                font-weight: bold">Select when to End meal</label>
                <input id="end_date" type="date" name="end" value="<?php echo date('Y-m-d'); ?>" onchange="checkEndDate()"/>
            </div>
            <button type="submit" class="btn btn-big">Start</button>

    </form>
    
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