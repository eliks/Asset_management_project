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
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_content1" data-isotope='{ "itemSelector": ".profile_details" }'>
                    <div class="row">
                      

                      <div class="clearfix"></div>
                    @foreach($users->sortBy('username') as $user)
                      <div class="col-md-4 col-sm-4 col-xs-12 profile_details" >
                        <div class="well profile_view">
                            <span class="ref" style="display: none;">{{strtoupper($user->username.' '.$user->email.' '.$user->type->name)}}</span>
                          <div class="col-sm-12">
                            <h4 class="brief"><i>{{$user->type ? $user->type->name : ''}}</i></h4>
                            <div class="left col-xs-8">
                              <h2 class="ref">{{$user->username}}</h2>
                              
                              <ul class="list-unstyled">
                                <li><i class="fa fa-envelope"></i> {{$user->email}}</li>
                                <li><i class="fa fa-building"></i> Locations: {{count($user->locations)}}
                                    
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-chevron-down"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    @foreach($user->locations as $location)
                                    <li><a href="{{route('location.show', ['id'=>$location->id])}}">{{$location->name}}</a></li>
                                    @endforeach
                                </ul>
                                </li>
                               
                              </ul>
                            </div>
                            <div class="right col-xs-4 text-center">
                              <img src="{{asset('gm/production/images/user.png')}}" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom">
                            
                            <div class="col-xs-12  emphasis">
                              <a href="{{route('users.edit', ['id'=>$user->id])}}"><button type="button" class="btn btn-info btn-xs"> <i class="fa fa-user">
                                </i> <i class="fa fa-edit"></i> </button></a>
                                <a href="{{route('users.destroy', ['id' => $user->id])}}" onclick="event.preventDefault(); confirm('Are you sure you want to delete User?', document.getElementById('delete-user-form-{{$user->id}}').submit());"><button type="button" class="btn btn-danger btn-xs"> <i class="fa fa-trash">
                                </i></button></a>

                                 <form id="delete-user-form-{{$user->id}}" action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST" style="display: none;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>
                                 
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
                    <div class="clearfix"></div>
          </div>
        </div>
        <!-- /page content -->
<!-- /page content -->
@endsection