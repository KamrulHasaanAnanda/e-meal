@extends('layouts.app')

@section('content')
<div class="single-message-blade">
    <h3><span class="span-message my-2">Message:</span><span class="span-m">{{$single_message[0]->message}}</span></h3>
    <img src={{$single_message[0]->image}} alt="" srcset="">
</div>
@endsection
