<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UG Asset Manager</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('css/blog-home.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #000073;">
    <div class="container">
      <a class="navbar-brand" href="#">University of Ghana Assets Registry</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
        aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Form
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Registered Assets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Locations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Help</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h3 class="mt-5">New Asset Form
          <small>Using Open Registration Link</small>
        </h3>

        <!-- Blog Post -->
        <div class="card mb-4">
          <div class="card-body">
          <form action="{{route('assets.store_via_closed_link', ['token'=>$link_token])}}" method="post">
            {{csrf_field()}}
            <div class="form-group row">
              <label for="serial_number" class="col-sm-4 col-form-label text-right">Serial Number</label>
              <div class="col-sm-7">
                <input type="email" class="form-control" id="serial_number" name="serial_number">
              </div>
            </div>
            <div class="form-group row">
              <label for="name" class="col-sm-4 col-form-label text-right">Asset Name</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="name" name="name">
              </div>
            </div>
            <div class="form-group row">
              <label for="tag" class="col-sm-4 col-form-label text-right">Asset Tag</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="tag">
              </div>
            </div>
            <div class="form-group row">
              <label for="type_id" class="col-sm-4 col-form-label text-right">Asset Type</label>
              <div class="col-sm-7">
                <select class="form-control" name="type_id">
                    @foreach(\App\AssetType::all() as $asset)
                        <option value="{{$asset->id }}">{{$asset->name}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend for="location_id" class="col-form-label col-sm-4 pt-0 text-right">Asset Location</legend>
                <div class="col-sm-7">
                    <select class="form-control" name="location_id">
                          @foreach($locations as $location)
                            <option value="{{$location->id}}">{{$location->name}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
            </fieldset>
            <div class="form-group row">
              <label for="brand" class="col-sm-4 col-form-label text-right">Brand</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="brand" name="brand">
              </div>
            </div>
            <div class="form-group row">
              <label for="user_name" class="col-sm-4 col-form-label text-right">Asset's Custodian</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="user_name" name="user_name">
              </div>
            </div>
            <div class="form-group row">
              <label for="date_commenced" class="col-sm-4 col-form-label text-right">Date Commenced</label>
              <div class="col-sm-7">
                <input type="date" class="form-control" id="date_commenced" name="date_commenced">
              </div>
            </div>
            <div class="form-group row">
              <label for="date_acquired" class="col-sm-4 col-form-label text-right">Date Acquired</label>
              <div class="col-sm-7">
                <input type="date" class="form-control" id="date_acquired" name="date_acquired">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-4">
                <button class="btn btn-block btn-warning" type="reset">Clear</button>
              </div>
              <div class="col-md-8">
                <button type="submit" class="btn btn-success btn-block">Submit</button>
              </div>
            </div>
          </form>
          </div>
          <div class="card-footer text-muted">
            **This form will not be available after <span class="text-info">{{date("l, M d, Y", strtotime($link->expiry_date))}}</span>
          </div>
        </div>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Assigned Locations</h5>
          <div class="card-body">
            <div class="row">
            @foreach($locations as $location)
              <div class="col-lg-6">
                <span class="badge badge-info badge-block">{{$location->name}}</span>
              </div>
            @endforeach
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Registered Assets</h5>
          <div class="card-body">
            <table class="table">
              @if(count($assets) < 1)
                <tr>
                  <td class="text-center">No assets registered yet.</td>
                </tr>
              @endif
              @foreach($assets as $key => $asset)
                <tr>
                  <td>{{1 + $key}}</td>
                  <td>{{$asset->ref}}</td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>