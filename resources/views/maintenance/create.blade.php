@extends('layouts.dashboard-form')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Maintenance Activity</h3>
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

            <div class="col-md-7 col-xs-12 col-md-offset-1">
            <div class="x_panel">
                <div class="x_title">
                <h2>Add Maintenance Activity </h2>
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
                <br />

                <form class="form-horizontal form-label-left" action="{{route('maintenance.store')}}" method="POST">
                {{csrf_field()}}

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Name</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" name="asset_id" placeholder="Enter the name of asset">
                        @error ('asset_id')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Description </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" name="description" placeholder="Describe activity performed on asset">
                        @error ('description')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Maintained By </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" name="maintained_by" placeholder="Enter name of technician">
                        @error ('maintained_by')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Maintained At</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="date" name="maintained_at"class="form-control" value="date commenced" value="{{old('date_commenced')}}">
                         @error('maintained_at')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Supervised By </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" name="supervised_by" placeholder="Enter name of supervisor">
                        @error ('supervised_by')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Location </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" class="form-control" name="location" placeholder="Enter where asset was maintained">
                        @error ('location')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Comment </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <textarea type="text" class="form-control" rows="5"  name="comment" placeholder="Describe activity performed on asset"></textarea>
                    </div>
                    </div>

                   
                  

                    


                    <div class="ln_solid"></div>
                    <div class="form-group">
                    <div class="col-md-10 col-sm-9 col-xs-12 col-md-offset-1">
                        <div class="col-md-4">
                            <button type="reset" class="btn btn-warning btn-block">Reset</button>
                        </div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                        </div>
                    </div>
                    </div>

                </form>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>
<!-- /page content -->
@endsection