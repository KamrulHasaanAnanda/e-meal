@extends('layouts.app')

@section('content')
<div class="meal-system-user my-2 mx-2">
    <div class="meal-head">
        <div>
            <label>Assigned on:</label> 
            @foreach ($meal_assigned as $meal)
                <h3>{{$meal->date}}=>{{$meal->meal->name}}</h3>
                 {{-- <h5></h5> --}}
            @endforeach

        </div>
    </div>
    <div class="cost">
        <h2>Costings</h2>
        <div class="alert alert-warning alert-dismissible fade show d-none" id="message" role="alert">
            Cost Updated
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>

        @foreach ($meal_assigned as $meal)
        <div class="total-cost my-3">
            <h3>Total Cost on
                {{$meal->date}}:
                 <div class="my-3">
                     <input type="number" name="total_cost" id={{"total_cost".$meal->id}}>
                     <input type="hidden" id="meal_id" name="id" value={{$meal->id}}>
                 
                     {{-- <input type="submit" value="Submit"> --}}
                     <button type="submit" id="addButton" class="btn btn-primary" value="Submit" onclick="updateCost({{$meal->id}})">Submit</button>
                </div>
            </h3>
        </div>
        @endforeach

    </div>
    <script>

        // var moment = require('moment');
            
          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          })
        
        function updateCost(id){
            console.log(`ids`, id)
            let total_cost = $(`#total_cost${id}`).val();
            console.log(`total_cost`, total_cost)

            $.ajax({
                type:"POST",
                dataType:"json",
                data:{
                    "_token": "{{ csrf_token() }}",
                    total_cost:total_cost,
                    id:id
                },
                url:"/cost/update/"+id,
                success:function(response){
                    // total_cost.val() = null
                    if(response){
                        
                        setTimeout(() => {
                            let message = $("#message").removeClass("d-none");
                        }, 3000);
                      // href='{{route('message.single',["+res.id+"])}}'
                     console.log('success' ) 
                    }
                }
            })
        }
        // getAllMessage();
        
        </script>
</div>

@endsection