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
                                <div class="dropdown">
                                    {{$meal_assign[0]->user->name}} you have been assigned on {{$meal_assign[0]->date}} to buy
                                  </div>
                              </h3> 
                           </div>
                        </div>
                        <div class="col-md-6">
                            <div class="colums">
                                
                                <h3 class="c-point">
                                    <a href={{route('admin.userList')}}>
                                       Costing
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
                                    <a href={{route('admin.userList')}}>
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
