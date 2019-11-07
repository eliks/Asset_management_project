@extends('layouts.dashboard-profile')

@section('content')

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Asset Details</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search"></div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Activity Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                    	<li>
                        <a title="Edit Asset" href="{{route('assets.edit',['id'=>$asset->id])}}" ><i class="fa fa-edit" class="text-info"></i></a>
                      </li>
                      <li><a href="{{route('assets.show',['id'=>$previous_asset_id])}}"  class="carousel-control-prev" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                      </li>
                      <li><a href="{{route('assets.show',['id'=>$next_asset_id])}}" class="carousel-control-next" role="button" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                      </li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li><a href="{{route('assets.index')}}"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-4 col-sm-4 col-xs-12 profile_left">
                      
                      <h3>{{$asset->name}}</h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> {{$asset->location?$asset->location->name : ''}}
                        </li>

                        <li>
                          <i class="fa fa-user user-profile-icon"></i> {{$asset->user_name}}
                        </li>
                      </ul>

                      <br />

                      <!-- Start Table -->

                      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
           
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
               
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">

            <table id="datatable" class="table table-striped table-bordered">
                <tr>
                    <th>Serial Number</th>
                    <td>{{$asset->serial_number}}</td>
                </tr>
                <tr>
                    <th>Asset Tag</th>
                    <td>{{$asset->tag}}</td>
                </tr>

                <tbody>
                	<tr>
                		<th>Type</th>
                		<td>{{$asset->type ? $asset->type->name : ''}}</td>
                	</tr>
                	<tr>
                		<th>Brand</th>
                		<td>{{$asset->brand}}</td>
                	</tr>
                  <tr>
                    <th>Maintenance Due</th>
                    <td>{{$asset->next_maintenance_date}}</td>
                  </tr>
                </tbody>
            </table>
            </div>
        </div>
        </div>

        <!-- End Table -->

                      <!-- start skills -->
                      <h4>Asset Status</h4>
                      <ul class="list-unstyled user_data">
                        <li>
                          <p>Days to maintenance: {{$asset->number_of_days_to_maintenance . ' ' .  str_plural('Day', $asset->number_of_days_to_maintenance)}}</p>
                         
                          <div class="progress progress_sm">
                            <div class="progress-bar {{$asset->status_colour}}" role="progressbar" data-transitiongoal="{{100-$asset->number_of_days_to_maintenance}}"></div>
                          </div>
                        </li>
                      </ul>

                      <center>
                        <a title="Schedule Next Maintenance" href="{{route('assets.schedule', ['id'=>$asset->id])}}"><button><i class="fa fa-calendar "></i> Schedule Next</button></a>
                        <a title="Add New Maintenance Activity" href="{{route('assets.create-maintenance', ['id'=>$asset->id])}}"><button><i class="fa fa-plus-circle "></i> Add New</button></a>
                      </center>
                       

                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                      

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="true">Maintenance History</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Maintenance Activities</a>
                          </li>


                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Usage</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="home-tab">

                          	<!-- start recent activity -->
                            <ul class="messages">
                              <li>
                              	@foreach($asset->maintenanceActivities as $maintenance)
                                <div class="message_date">
                                <ul class="list-unstyled">
                                    <li><a href=""><p class="month"> <i class="fa fa-wrench"></i> {{$maintenance? $maintenance->maintained_by : ''}}</a></p>
                                    </li>
                                    <li><a href="#maintenance-modal-{{$maintenance->id}}" data-toggle="modal"><p class="month"> <i class="fa fa-search-plus"></i> See Maintenance Details</a></p>                  
                                    </li>


                                </ul>
                                </div>
                                <div class="message_wrapper">
                                  <h4 class="heading">
                                  	{{$maintenance ? $maintenance->description : ''}}
                                  </h4>
                                  <blockquote class="message">
                                  		{{$maintenance ? $maintenance->comment : ''}}
                                  </blockquote>
                                  <br />
                                  <div class="text-info">
                                  <p class="month"> {{$maintenance->created_at}}</p>
                                  </div>
                                  <div class="text-warning">
                                  <p class="month">Supervised by: {{$maintenance->supervised_by}}</p>
                                  </div>
                                  <br>
                                </div>
                                <div id="maintenance-modal-{{$maintenance->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">

                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" id="myModalLabel">Maintenance Details</h4>
                                      </div>
                                      <div class="modal-body">
                                        <table class="table">
                                          <tr>
                                            <th>Description</th>
                                            <td>{{$maintenance->description}}</td>
                                          </tr>
                                          <tr>
                                            <th>Asset</th>
                                            <td>{!! $maintenance->asset_name !!}</td>
                                          </tr>
                                          <tr>
                                            <th>Date Time</th>
                                            <td>{{$maintenance->maintained_at}}</td>
                                          </tr>
                                          <tr>
                                            <th>Maintained By</th>
                                            <td>{{$maintenance->maintained_by}}</td>
                                          </tr>
                                          <tr>
                                            <th>Supervised By</th>
                                            <td>{{$maintenance->supervised_by}}</td>
                                          </tr>
                                          <tr>
                                            <th>Cost</th>
                                            <td>{{$maintenance->cost}}</td>
                                          </tr>
                                          <tr>
                                            <th>Location</th>
                                            <td>{{$maintenance->location}}</td>
                                          </tr>
                                          <tr>
                                            <th>Comment</th>
                                            <td>{{$maintenance->comment}}</td>
                                          </tr>
                                          <tr>
                                            <th>Added By</th>
                                            <td>{{$maintenance->added_by_name_with_link}}</td>
                                          </tr>
                                        </table>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                               @endforeach
                              </li>
                           </ul>

                         
                            
                            <!-- end recent activity -->

                          
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Date Acquired</th>
                                    <td>{{$asset->date_acquired}}</td>
                                </thead>

                                <tbody>
                                  <tr>
                                    <th>First Use</th>
                                    <td>{{$asset->date_commenced}}</td>
                                  </tr>

                                </tbody>

                            </table>
                            <!-- end user projects -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content3" aria-labelledby="profile-tab">
                           
                           <table id="datatable" class="table table-striped table-bordered">
                          
                                <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Supervised By</th>
                                    <th>Date of Maintenance</th>
                                </thead>
                                  @foreach($asset->maintenanceActivities as $maintenance)
                                <tbody>
                                  <tr>
                                    <td>{{$maintenance->description}}</td>
                                    <td>{{$maintenance->supervised_by}}</td>
                                    <td>{{$maintenance->maintained_at}}</td>
                                  </tr>
                                </tbody>
                                @endforeach
                            </table>
                          
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
@endsection