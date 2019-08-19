@extends('layouts.dashboard-chart')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="row top_tiles">
         <a href="{{route('assets.index')}}">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-cubes"></i></div>
            <div class="count">{{count(\App\Asset::all())}}</div>
            <h3>Total Assets</h3>
           <p class="text-center">Click to view details</p>
        </div>
         </a>
        </div>
         <a href="{{route('assets.index')}}">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-users"></i></div>
            <div class="count">{{count(\App\User::all())}}</div>
            <h3>Total Users</h3>
            <p class="text-center">Click to view details</p>
        </div>
        </div>
         </a>
         <a href="{{route('location.index')}}">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-map-marker"></i></div>
            <div class="count">{{count(\App\Location::all())}}</div>
            <h3>Total Locations</h3>
            <p class="text-center">Click to view details</p>
        </div>
        </div>
         </a>
         <a href="{{route('maintenance.index')}}">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-wrench"></i></div>
            <div class="count">{{count(\App\MaintenanceActivities::all())}}</div>
            <h3>Maintenance Activities</h3>
            <p class="text-center">Click to view details</p>
        </div>
        </div>
         </a>
    </div>

    <div class="row">
        <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Maintenance Summary <small> Monthly progress</small></h2>

           

            <div class="filter">
               
            </div>
            <div class="clearfix"></div>
            </div>
            <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="demo-container" style="height:280px">
                <div id="chart_plot_02" class="demo-placeholder"></div>
                </div>
               

            </div>

            
            </div>
        </div>
        </div>
    </div>




       
<!-- /page content -->
@endsection