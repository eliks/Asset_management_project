@extends('layouts.dashboard-form')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Add User</h3>
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
                <h2>Form Basic Elements <small>different form elements</small></h2>
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
                @if ($errors->any())
                     @foreach ($errors->all() as $error)
                         <div>{{$error}}</div>
                     @endforeach
                 @endif
                <form class="form-horizontal form-label-left" action="{{route('users.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="username" class="form-control" placeholder="Enter your name...">
                    </div>
                    </div>

                     <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="email" name="email" class="form-control" placeholder="Email address...">
                    </div>
                    </div>
                   
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="password" name= "password" class="form-control" value="" placeholder="Enter password...">
                    </div>
                    </div>
                   
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">User Type</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="type">
                            <option value="1">Administrator</option>
                            <option value="2">Custodian</option>
                            <option value="3">Technician</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">User Location</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_single form-control" tabindex="-1" name="location">
                        <option></option>
                        <option value="1" selected="">Alaska</option>
                        <option value="2">Hawaii</option>
                        <option value="3">California</option>
                        <option value="4">Nevada</option>
                        <option value="5">Oregon</option>
                        <option value="6">Washington</option>
                        <option value="7">Arizona</option>
                        <option value="8">Colorado</option>
                        <option value="9">Idaho</option>
                        <option value="10">Montana</option>
                        <option value="11">Nebraska</option>
                        <option value="12">New Mexico</option>
                        <option value="13">North Dakota</option>
                        <option value="14">Utah</option>
                        <option value="15">Wyoming</option>
                        <option value="16">Arkansas</option>
                        <option value="17">Illinois</option>
                        <option value="18">Iowa</option>
                        <option value="19">Kansas</option>
                        <option value="20">Kentucky</option>
                        <option value="21">Louisiana</option>
                        <option value="22">Minnesota</option>
                        <option value="23">Mississippi</option>
                        <option value="24">Missouri</option>
                        <option value="25">Oklahoma</option>
                        <option value="26">South Dakota</option>
                        <option value="27">Texas</option>
                        </select>
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