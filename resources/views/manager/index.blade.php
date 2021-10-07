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
                                    <a class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Meal System
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="#">Weekly System</a>
                                      <a class="dropdown-item" href="#">Monthly System</a>
                                    </div>
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
