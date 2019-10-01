@extends('layouts.dashboard-form')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Schedule New Maintenance</h3>
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

                <form class="form-horizontal form-label-left" action="{{route('patch.assets.schedule', ['id' => $asset->id])}}" method="POST">
                    {{method_field('PATCH')}}
                    {{csrf_field()}}

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Name</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="asset_id">
                            @foreach(App\Asset::all() as $asset)
                                <option value="{{$asset->id}}" {{$asset->id == $asset_id? "selected":""}}>{{$asset->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('asset_id'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{$errors->first('message')}}</strong>
                            </span>
                        @endif
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Date</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                         <input type="date" name="next_maintenance_date"class="form-control" value="date commenced" value="{{old('date_commenced')}}">
                        @error('description')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
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