@extends('layouts.dashboard-table')

@section('content')
<!-- page content -->
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Users</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" id="search-bar" class="form-control" placeholder="Search for..." onkeyup="filterCards()">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content" data-isotope='{ "itemSelector": ".profile_details" }'>
                    <div class="r6ow">
                      

                      <div class="clearfix"></div>
                    @foreach($users as $user)
                      <div class="col-md-3 col-sm-4 col-xs-12 profile_details" >
                        <div class="well profile_view">
                            <span class="ref" style="display: none;">{{strtoupper($user->username.' '.$user->email)}}</span>
                          <div class="col-sm-12">
                            <h4 class="brief"><i>{{$user->type ? $user->type->name : ''}}</i></h4>
                            <div class="left col-xs-8">
                              <h2 class="ref">{{$user->username}}</h2>
                              
                              <ul class="list-unstyled">
                                <li><i class="fa fa-building"></i>Locations: {{count($user->locations)}} <a class=""><i class="fa fa-chevron-down"></i></a></li>
                                <li><i class="fa fa-envelope"></i>Email:  {{$user->email}}</li>
                              </ul>
                            </div>
                            <div class="right col-xs-4 text-center">
                              <img src="{{asset('gm/production/images/user.png')}}" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom">
                            
                            <div class="col-xs-12 col-sm-6 emphasis">
                            `   <button type="button" class="btn btn-primary btn-md">
                                <i class="fa fa-user"> </i> User Details
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<!-- /page content -->
@endsection