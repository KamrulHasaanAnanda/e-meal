@extends('layouts.app')

@section('content')
<div class="container meal-system mt-3">
    <div>
        <a class="meals-add " href={{route('manager.meal_add')}}> Add Meals</a>
        <a class="meals-add ml-3" href={{route('manager.meal')}}> Meals</a>

    </div>
    <form action="" method="post" style="margin-top: 2rem">
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
                <input id="start_date" type="date" value="<?php echo date('Y-m-d'); ?>" onchange="checkStartDate()"/>
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
                <input id="end_date" type="date" value="<?php echo date('Y-m-d'); ?>" onchange="checkEndDate()"/>
            </div>
            <button type="submit" class="btn btn-big">Submit</button>

    </form>

    </div>
</div>
<script>
    function checkStartDate(){
        let start_date = document.getElementById("start_date");
        let message = document.getElementById("message");
        console.log(`message`, message)
        var g1 = new Date(start_date.value);
        var g2 = new Date();
        if (g1.getTime() < g2.getTime())
            {
                start_date.value = start_date
                message.classList.remove("d-none");

            }else if (g1.getTime() > g2.getTime()){
                console.log("g1 is greater than g2");
                

            } else{
            console.log("both are equal");
            }
        }
        function checkEndDate(){
        let start_date = document.getElementById("start_date");
        let message = document.getElementById("message");
        console.log(`message`, message)
        var g1 = new Date(start_date.value);
        var g2 = new Date();
        if (g1.getTime() < g2.getTime())
            {
                start_date.value = start_date
                message.classList.remove("d-none");

            }else if (g1.getTime() > g2.getTime()){
                console.log("g1 is greater than g2");
                

            } else{
            console.log("both are equal");
            }
        }
</script>
@endsection