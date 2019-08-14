@extends('layouts.dashboard-profile')

@section('content')

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Location Details</h3>
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
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <ul class="nav navbar-right panel_toolbox">
                    	<li><a href="{{route('location.show', ['id'=>$previous_location_id])}}"  class="carousel-control-prev" role="button" data-slide="prev""><i class="fa fa-chevron-left"></i></a>
                      </li>
                      <li><a href="{{route('location.show', ['id'=>$next_location_id])}}" class="carousel-control-next" role="button" data-slide="next""><i class="fa fa-chevron-right"></i></a>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a href="{{route('location.index')}}"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-4 col-sm-4 col-xs-12 profile_left">
                 
                      <h3><i class="fa fa-map-marker user-profile-icon" ></i> {{$Locations->name}}</h3>
                     
                      <ul class="list-unstyled user_data">
                        <li>
                          <i class="fa fa-bank user-profile-icon"> Organisation:</i> {{$Locations->organisation}}
                        </li>
                        <li>
                          <i class="fa fa-cubes user-profile-icon"> Assets:</i> {{{count($Locations->assets)}}}
                        </li>
                         <li>
                          <i class="fa fa-user user-profile-icon"> Users:</i> {{{count($Locations->user)}}}  
                        </li>
                      </ul>


                      <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Location</a>
                      <br />

                      <!-- Start Table -->

                      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
           
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
               
                <li><a class="close-link" href="{{route('location.index')}}"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">

            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Location Tag</th>
                    <td>{{$Locations->tag}}</td>
                </thead>
              </tr>
                <tbody>
                	<tr>
                		<th>Location Parent</th>
                    <td>{{$Locations->parent->name}}</td>
                	</tr>
                  <tr>
                    <th>Location Address</th>
                    <td>{{$Locations->address}}</td>
                  </tr>
                </tbody>
            </table>
            </div>
        </div>
        </div>

        <!-- End Table -->

                      <!-- start skills -->
                      
                       

                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                      

                     <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Assets in Location</a>
                          </li>


                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Location Custodians</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Location Detail</a>
                          </li>
                        </ul>
                         <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                 
                      @foreach($Locations->assets as $asset)
                      <div class="col-md-5 col-sm-4 col-xs-12 profile_details" >
                        <div class="well profile_view">
                            <span class="ref" style="display: none;">{{strtoupper($asset->name.' '.$asset->type.' '.$asset->brand)}}</span>
                          <div class="col-sm-12">
                            <h4 class="brief"><i></i></h4>
                            <div class="left col-xs-8">
                              <h2 class="ref">{{$asset->name}}</h2>
                              
                              <ul class="list-unstyled">
                                <li><i class="fa fa-th-large"></i> {{$asset->type->name}}</li>
                                <li><i class="fa fa-spinner fa-spin"></i> {{$asset->brand}}</li>        
                              </ul>
                           
                            </div>
                            <div class="right col-xs-4 text-center">
                              <img src="{{asset('gm/production/images/stack-icon.png')}}" alt="" class="img-circle img-responsive">
                            </div>
                          </div>
                          <div class="col-xs-12 bottom">
                            

                            <div class="col-xs-12  emphasis">
                               <ul class="list-unstyled user_data">
                                <li>
                                  <h5>Aset Status</h5>
                                  <p>Days to maintenance: {{$asset->number_of_days_to_maintenance . ' ' .  str_plural('Day', $asset->number_of_days_to_maintenance)}}</p>
                                  <div class="progress progress_sm">
                                    <div class="progress-bar {{$asset->status_colour}}" role="progressbar" data-transitiongoal="{{100-$asset->number_of_days_to_maintenance}}"></div>
                                  </div>
                                </li>
                              </ul>
                              <button type="button" class="btn btn-success btn-xs"> <i class="e">
                                </i> <i class="fa fa-edit"></i> </button>
                              <a href="{{route('assets.show', ['id'=>$asset->id])}}"><button type="button" class="btn btn-primary btn-xs">
                                <i class="fa fa-cube"> </i> Asset Details
                              </button></a>  
                         </div>

                          </div>
                        </div>
                      </div>
                    
                      @endforeach
                     
               
                        
                         </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Custodian's Name</th>
                                  <th>Type</th>
                                  <th class="text-center">Email</th>
                                </tr>
                              </thead>
                             
                              <tbody>
                                @foreach($Locations->user->sortBy('username') as $key=> $user)
                                <tr>
                                  <td>{{1+$key}}</td>
                                  <td>{{$user->username}}</td>
                                  <td>{{$user->type ? $user->type->name : ' '}}</td>
                                  <td class="text-center">{{$user->email}}</td>
                                </tr>
                                @endforeach
                               
                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <p>xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui
                              photo booth letterpress, commodo enim craft beer mlkshk </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </tr>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@endsection