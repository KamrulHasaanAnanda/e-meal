@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header header-dash">Total User: <span style="color: red">{{$total_user}}</span></div>

                <div class="card-body">
                    <div class="manager row">

                        <div class="col-md-6">
                           <div class="colums">
                              <h3 class="c-point">
                                <div class="meal-assign" style="
                                font-size: 1rem;
                                color: coral;
                                font-weight: bold;
                                font-family: 'FontAwesome';
                            ">
                                    {{-- @php
                                        dd($meal_assign[0]);
                                    @endphp --}}
                                    @if (!empty($meal_assign[0]))
                                    
                                    <span style="color: red">{{$meal_assign[0]->user->name}}</span> you have been assigned on  <span style="color: red">{{$meal_assign[0]->date}}</span> to buy
                                    <span style="color: red">{{$meal_assign[0]->meal->name}}</span>
                                    @else
                                        No meal assigned
                                    @endif
                                  </div>
                              </h3> 
                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="colums">
                                
                                <h3 class="c-point">
                                    <a href={{route('cost.user')}}>
                                       Cost
                                    </a>
                                    </h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="colums">
                                
                                <h3 class="c-point">
                                    <a href={{route('admin.userList')}}>
                                       Users
                                    </a>
                                    </h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="colums">
                                
                                <h3 class="c-point">
                                    <a href={{route('message.view')}}>
                                       Inbox
                                    </a>
                                </h3>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
