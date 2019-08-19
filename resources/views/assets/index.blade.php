@extends('layouts.dashboard-table')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Assets</h3>
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
            <h2>List of Assets</h2>
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
                    <th>Name</th>
                    <th>Tag</th>
                    <th>Type</th>
                    <th>Brand</th>
                    <th>Location</th>
                    <th>User</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>


                <tbody>
                    @foreach($assets as $key => $asset)
                        <tr>
                            <td>{{1+$key}}.</td>
                            <td>{{$asset->name}}</td>
                            <td>{{$asset->tag}}</td>
                            <td>{{$asset->type ? $asset->type->name : ''}}</td>
                            <td>{{$asset->brand}}</td>
                            <td>{{$asset->location? $asset->location->name : ''}}</td>
                            <td>{{$asset->user_name}}</td>
                            <td class="text-center">
                                <a href="{{route('assets.show', ['id'=>$asset->id])}}">
                                    <i class="fa fa-search-plus text-info"></i>
                                </a>
                                <a href="{{route('assets.edit', ['id'=>$asset->id])}}">
                                    <i class="fa fa-edit text-warning"></i>
                                </a>
                                <a href="{{route('assets.destroy', ['id' => $asset->id])}}" onclick="event.preventDefault(); confirm('Are you sure you want to delete Asset?', document.getElementById('delete-asset-form-{{$asset->id}}').submit());">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>

                                <form id="delete-asset-form-{{$asset->id}}" action="{{ route('assets.destroy', ['id' => $asset->id]) }}" method="POST" style="display: none;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                </form>
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