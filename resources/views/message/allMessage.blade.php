@extends('layouts.app')

@section('content')
<div class="all-message">
    <h3 class="message-h3">
        Messages
    </h3>
    <div class="messages">

    </div>
 

</div>
<script>

// var moment = require('moment');
    
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })

function getAllMessage(){
    $.ajax({
        type:"GET",
        dataType:"json",
        url:"/all-messages",
        success:function(response){
          // href='{{route('message.single',["+res.id+"])}}'
          var data = response.map((res,index)=>{
              console.log(`res`, res);
              let id = res.id;
              console.log(`id`, id)
              return "<a class='single-message my-2 c-point' onclick='getSingleMessage("+id+")'>"+index+":"+"<span>"+res.send_from[0].name+"</span>"+" "+"has send you a message("+moment(res.created_at).fromNow()+")</a>"
            });
            $('.messages').html(data);   
        }
    })
}
getAllMessage();

function getSingleMessage(id){
  window.location.href = "/single-message/"+id;
  // $.ajax({
  //       type:"GET",
  //       dataType:"json",
  //       url:"/single-message/"+id,
  //       success:function(response){
  //         console.log(`response`, response)
  //       }
  //     })
}

</script>
@endsection