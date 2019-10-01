@extends('layouts.dashboard-table')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Asset Registration Links</h3>
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
            <h2>List of Asset Registration Links</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a href="{{route('asset_registration_links.create')}}" class="btn btn-link btn-xs">Create Link</a>
                </li>
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
                    <th>Caption</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Expiry</th>
                    <th>Locations</th>
                    <th>Assets</th>
                    <th>Added By</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>


                <tbody>
                    @foreach($asset_registration_links as $key => $asset_registration_link)
                        <tr>
                            <td>{{1+$key}}.</td>
                            <td>{{$asset_registration_link->caption}}</td>
                            <td>{{$asset_registration_link->description}}</td>
                            <td>{{$asset_registration_link->type ? $asset_registration_link->type->name : ''}}</td>
                            <td>{{$asset_registration_link->expiry_date}}</td>
                            <td>{{count($asset_registration_link->locations)}}</td>
                            <td>{{count($asset_registration_link->assets)}}</td>
                            <td>{{$asset_registration_link->addedBy? $asset_registration_link->addedBy->username : ''}}</td>
                            <td class="text-center">
                                <a href="{{route('asset_registration_links.show', ['id'=>$asset_registration_link->id])}}">
                                    <i class="fa fa-search-plus text-info"></i>
                                </a>
                                <a href="{{route('asset_registration_links.edit', ['id'=>$asset_registration_link->id])}}">
                                    <i class="fa fa-edit text-warning"></i>
                                </a>
                                <a href="{{route('asset_registration_links.destroy', ['id' => $asset_registration_link->id])}}" onclick="event.preventDefault(); confirm('Are you sure you want to delete Asset Registration Link?', document.getElementById('delete-asset-form-{{$asset_registration_link->id}}').submit());">
                                    <i class="fa fa-trash text-danger"></i>
                                </a>

                                <form id="delete-asset_registration_link-form-{{$asset_registration_link->id}}" action="{{ route('asset_registration_links.destroy', ['id' => $asset_registration_link->id]) }}" method="POST" style="display: none;">
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