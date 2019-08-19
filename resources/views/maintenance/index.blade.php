@extends('layouts.dashboard-table')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Maintenance Activities Peformed</h3>
        </div>

        <div class="title_right">
        <!-- <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
            </span>
            </div>
        </div> -->
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Assets / <small>Maintenance Activity</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Settings 1</a>
                    </li>
                    <li><a href="#">Settings 2</a>
                    </li>
                </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
           
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#.</th>
                    <th>Asset</th>
                    <th>Description</th>
                    <th>Date Maintained </th>
                    
                    <th class="text-center">Actions</th>
                </tr>
                </thead>


                <tbody>
                    @foreach($maintenance as $key => $maintenance)
                        <tr>
                            <td>{{1+$key}}.</td>
                           
                            <td>{{$maintenance->asset_name}}</td>
                            <td>{{$maintenance->description}}</td>
                            <td>{{$maintenance->maintained_at}}</td>
                           
                            
                           <td class="text-center">
                                <a data-toggle="modal" data-target="#maintenance-modal-{{$maintenance->id}}">
                                    <i class="fa fa-search-plus text-info"></i>
                                </a>

                                <a href="{{route('maintenance.edit', ['id'=>$maintenance->id])}}">
                                    <i class="fa fa-edit text-warning"></i>
                                </a>
                                <a href="{{route('maintenance.destroy', ['id' => $maintenance->id])}}" onclick="event.preventDefault(); confirm('Are you sure?', document.getElementById('delete-maintenance-form-{{$maintenance->id}}').submit());">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>

                                     <form id="delete-maintenance-form-{{$maintenance->id}}" action="{{ route('maintenance.destroy', ['id' => $maintenance->id]) }}" method="POST" style="display: none;">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                    </form>


                                  <div class="modal fade bs-example-modal-lg" id="maintenance-modal-{{$maintenance->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-md">
                              <div class="modal-content">

                                 <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                  </button>
                                    <h1 class="modal-title" id="myModalLabel">Maintenance Details</h1>
                                </div>
                                <div class="modal-body">
                                    <h4 class="text-warning">Asset Name: {{$maintenance->asset_name}}</h4>
                                
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <td>{{$maintenance->description}}</td>
                                           </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Maintained by</th>
                                                <td>{{$maintenance->maintained_by}}</td>
                                            </tr>
                                            <tr>
                                                <th>Supervised by</th>
                                                <td>{{$maintenance->supervised_by}}</td>
                                            </tr>
                                            <tr>
                                                <th>Maintained at</th>
                                                <td>{{$maintenance->maintained_at}}</td>
                                            </tr>
                                            <tr>
                                                <th>Maintenance Location</th>
                                                <td>{{$maintenance->location}}</td>
                                            </tr>
                                            <tr>
                                                <th>Comment</th>
                                                <td>{{$maintenance->comment}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                            </td>
                        </tr>

                      
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<!-- /page content -->
@endsection