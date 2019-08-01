@extends('layouts.dashboard-table')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Assets <small>Some examples to get you started</small></h3>
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
            <h2>Default Example <small>Assets</small></h2>
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
            <p class="text-muted font-13 m-b-30">
                DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
            </p>
            <table id="datatable" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#.</th>
                    <th>Name</th>
                    <th>Tag</th>
                    <th>Type</th>
                    <th>Organization</th>
                    <th>Parent</th>
                    <th>User</th>
                    <th class="text-center">No. Assets</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>


                <tbody>
                    @foreach($locations as $key => $location)
                        <tr>
                            <td>{{1+$key}}.</td>
                            <td>{{$location->name}}</td>
                            <td>{{$location->tag}}</td>
                            <td>{{$location->type ? $location->type->name : ''}}</td>
                            <td>{{$location->organization ? $location->organization->name : ''}}</td>
                            <td>{{$location->parent? $location->parent->name : ''}}</td>
                            <td>{{$location->user_name}}</td>
                            <td class="text-center">{{count($location->assets)}}</td>
            
                            <td class="text-center">
                                <a href="{{route('assets.show', ['id'=>$location->id])}}">
                                    <i class="fa fa-search-plus text-info"></i>
                                </a>
                                <a href="{{route('assets.edit', ['id'=>$location->id])}}">
                                    <i class="fa fa-edit text-warning"></i>
                                </a>
                                <a href="#">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>
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