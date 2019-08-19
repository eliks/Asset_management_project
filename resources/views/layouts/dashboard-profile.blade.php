<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UG Asset Manager | </title>

    <!-- Bootstrap -->
    <link href="{{asset('gm/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('gm/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('gm/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('gm/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="{{asset('gm/build/css/custom.min.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('gm/production/images/favicon.ico')}}" type="image/x-icon" />

     <!-- <style type="text/css">
        .profile_details {
            ;
        }
        
        .x_content {
            height: auto!important;
        }
    </style> -->

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('layouts.partials.sidebar')

        @include('layouts.partials.nav')

        @yield('content')

        @include('layouts.partials.footer')
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('gm/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('gm/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('gm/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('gm/vendors/nprogress/nprogress.js')}}"></script>
    <!-- morris.js -->
    <script src="{{asset('gm/vendors/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('gm/vendors/morris.js/morris.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('gm/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('gm/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('gm/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{asset('gm/build/js/custom.min.js')}}"></script>
    <!-- <script src="{{asset('gm/build/js/isotope.pkgd.min.js')}}"></script> -->


    <!-- Custom Theme Scripts -->
    <!-- <script src="{{asset('gm/build/js/custom.min.js')}}"></script>
    <script type="text/javascript">
        var $grid = $('.x_content').isotope({
          itemSelector: '.profile_details',
          getSortData: {
            name: '.ref'
          }
        });

        // 

        function filterCards(){
            $grid.isotope({ filter: function() {
              var qstr = $('#search-bar').val().toUpperCase();
              var name = $(this).find('.ref').text();
              console.log(qstr)
              return name.match( qstr );
            } })

            
        }

        
    </script> -->

  </body>
</html>