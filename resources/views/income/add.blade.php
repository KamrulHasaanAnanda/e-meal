@extends('layouts.app')

@section('content')
<div class="container">
  <div class="add-user">
    <h3 class="add-user-h3 text-center">Send Message to </h3>
    @if (session('success'))
                        
    <div class="alert alert-warning alert-success fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
    @endif
{{-- @php
    dd($send_to);
@endphp --}}
  <form class="add-form" action="{{route('income.income_store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group forms">
      <label for="Enter your name" style="font-size:large;
      font-weight: bold">Select date</label>
      <input type="date" class="form-control" value="<?php echo date('yy-mm-dd');?>" name="date" id="">
    </div>
    <div class="form-group forms">
        <label for="Enter your name" style="font-size:large;
        font-weight: bold">Amount</label>
      <input type="number" name="amount" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter amount">
    </div>
  
    <button type="submit" class="btn btn-big">Submit</button>
  </form>
</div>
</div>
@endsection