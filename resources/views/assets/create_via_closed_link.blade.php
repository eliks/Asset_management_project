@extends('layouts.dashboard-form')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            <h3>Add New Asset <small>Asset registration via closed link</small></h3>
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
                @if (count($errors) > 0)
                    <div class="error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-horizontal form-label-left" action="{{route ('assets.store_via_closed_link', ['token'=>$token])}}" method="POST">
                  {{csrf_field()}}
                   <div class="box-body">
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Name</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="name" class="form-control" placeholder="Enter Asset's name..." value="{{old('name')}}">
                         <!-- @error('name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong></strong>
                                </span>
                         @enderror -->
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Tag</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="tag" class="form-control"  placeholder="Enter Asset's tag..." value="{{old('tag')}}">
                         <!-- @error('tag')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong></strong>
                            </span>
                         @enderror -->
                    </div>
                    </div>
                     <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Type</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="type_id">
                            @foreach(\App\AssetType::all() as $asset)
                                <option value="{{$asset->id }}">{{$asset->name}}</option>
                            @endforeach
                        </select>
                        <!-- @error('type_id')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong></strong>
                            </span>
                         @enderror -->
                    </div>
                    </div>
            
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset Location</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control" name="location_id">
                             @foreach($locations as $location)
                                <option value="{{$location->id}}">{{$location->name}}</option>
                            @endforeach
                        </select>
                        <!-- @error('location_id')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong></strong>
                            </span>
                         @enderror -->
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Brand</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="brand" class="form-control" placeholder="Enter Asset's brand..." value="{{old('brand')}}">
                         <!-- @error('brand')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong></strong>
                            </span>
                        @enderror -->
                    </div>
                    </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Asset's Custodian</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                         <input type="text" name="user_name" class="form-control" placeholder="Enter Custodian's name..." value="{{old('user_name')}}">
                         <!-- @error('user_name')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong></strong>
                            </span>
                        @enderror -->
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Commenced</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="date" name="date_commenced"class="form-control" value="date commenced" value="{{old('date_commenced')}}">
                         <!-- @error('date_commenced')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong></strong>
                            </span>
                        @enderror -->
                    </div>
                    </div>
                   
                     <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Acquired</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="date" name="date_acquired"  class="form-control" id="autocomplete-custom-append" placeholder="date acquired" value="{{old('date_acquired')}}">
                         <!-- @error('date_acquired')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong></strong>
                            </span>
                        @enderror -->
                    </div>
                    </div>



                      <div class="form-group">
                <!--   <div class="col-sm-offset-2 col-sm-10 mb-3">
                    <div class="checkbox">
                      <label> 
                        <input type="checkbox"> Remember me
                      </label>
                    </div>
                  </div> -->
                  <!-- /.box-body -->
                  <div class="box-footer mt-3">
                    <div class="col-md-4">                      
                      <button type="reset" class="btn btn-warning btn-block">Cancel</button>
                    </div>
                    <div class="col-md-8">                      
                      <button type="submit" class="btn btn-success btn-block pull-right">submit</button>
                    </div>
                  </div>
                  <!-- /.box-footer -->
                </div>
            </div>
                     </form>
                  <!--   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="form-control">
                        <option>Air Conditioner</option>
                        <option>Desktop Computer</option>
                        <option>Laptop Computer</option>
                        <option>Projector</option>
                        <option>Table</option>
                        </select>
                    </div>
                    </div> -->
                   <!--  <div class="form-group"> -->
                    <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Custom</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_single form-control" tabindex="-1">
                        <option></option>
                        <option value="AK">Alaska</option>
                        <option value="HI">Hawaii</option>
                        <option value="CA">California</option>
                        <option value="NV">Nevada</option>
                        <option value="OR">Oregon</option>
                        <option value="WA">Washington</option>
                        <option value="AZ">Arizona</option>
                        <option value="CO">Colorado</option>
                        <option value="ID">Idaho</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NM">New Mexico</option>
                        <option value="ND">North Dakota</option>
                        <option value="UT">Utah</option>
                        <option value="WY">Wyoming</option>
                        <option value="AR">Arkansas</option>
                        <option value="IL">Illinois</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="OK">Oklahoma</option>
                        <option value="SD">South Dakota</option>
                        <option value="TX">Texas</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Grouped</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_group form-control">
                        <optgroup label="Alaskan/Hawaiian Time Zone">
                            <option value="AK">Alaska</option>
                            <option value="HI">Hawaii</option>
                        </optgroup>
                        <optgroup label="Pacific Time Zone">
                            <option value="CA">California</option>
                            <option value="NV">Nevada</option>
                            <option value="OR">Oregon</option>
                            <option value="WA">Washington</option>
                        </optgroup>
                        <optgroup label="Mountain Time Zone">
                            <option value="AZ">Arizona</option>
                            <option value="CO">Colorado</option>
                            <option value="ID">Idaho</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NM">New Mexico</option>
                            <option value="ND">North Dakota</option>
                            <option value="UT">Utah</option>
                            <option value="WY">Wyoming</option>
                        </optgroup>
                        <optgroup label="Central Time Zone">
                            <option value="AL">Alabama</option>
                            <option value="AR">Arkansas</option>
                            <option value="IL">Illinois</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="OK">Oklahoma</option>
                            <option value="SD">South Dakota</option>
                            <option value="TX">Texas</option>
                            <option value="TN">Tennessee</option>
                            <option value="WI">Wisconsin</option>
                        </optgroup>
                        <optgroup label="Eastern Time Zone">
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="IN">Indiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="OH">Ohio</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WV">West Virginia</option>
                        </optgroup>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Multiple</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <select class="select2_multiple form-control" multiple="multiple">
                        <option>Choose option</option>
                        <option>Option one</option>
                        <option>Option two</option>
                        <option>Option three</option>
                        <option>Option four</option>
                        <option>Option five</option>
                        <option>Option six</option>
                        </select>
                    </div>
                    </div>

                    <div class="control-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Input Tags</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <input id="tags_1" type="text" class="tags form-control" value="social, adverts, sales" />
                        <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Checkboxes and radios
                        <br>
                        <small class="text-navy">Normal Bootstrap elements</small>
                    </label>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" value=""> Option one. select more than one options
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" value=""> Option two. select more than one options
                        </label>
                        </div>
                        <div class="radio">
                        <label>
                            <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"> Option one. only select one option
                        </label>
                        </div>
                        <div class="radio">
                        <label>
                            <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios"> Option two. only select one option
                        </label>
                        </div>
                    </div>
                    </div>

                    <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">Checkboxes and radios
                        <br>
                        <small class="text-navy">Normal Bootstrap elements</small>
                    </label>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" class="flat" checked="checked"> Checked
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" class="flat"> Unchecked
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" class="flat" disabled="disabled"> Disabled
                        </label>
                        </div>
                        <div class="checkbox">
                        <label>
                            <input type="checkbox" class="flat" disabled="disabled" checked="checked"> Disabled & checked
                        </label>
                        </div>
                        <div class="radio">
                        <label>
                            <input type="radio" class="flat" checked name="iCheck"> Checked
                        </label>
                        </div>
                        <div class="radio">
                        <label>
                            <input type="radio" class="flat" name="iCheck"> Unchecked
                        </label>
                        </div>
                        <div class="radio">
                        <label>
                            <input type="radio" class="flat" name="iCheck" disabled="disabled"> Disabled
                        </label>
                        </div>
                        <div class="radio">
                        <label>
                            <input type="radio" class="flat" name="iCheck3" disabled="disabled" checked> Disabled & Checked
                        </label>
                        </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Switch</label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="">
                        <label>
                            <input type="checkbox" class="js-switch" checked /> Checked
                        </label>
                        </div>
                        <div class="">
                        <label>
                            <input type="checkbox" class="js-switch" /> Unchecked
                        </label>
                        </div>
                        <div class="">
                        <label>
                            <input type="checkbox" class="js-switch" disabled="disabled" /> Disabled
                        </label>
                        </div>
                        <div class="">
                        <label>
                            <input type="checkbox" class="js-switch" disabled="disabled" checked="checked" /> Disabled Checked
                        </label>
                        </div>
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
</div> -->
<!-- /page content -->
@endsection