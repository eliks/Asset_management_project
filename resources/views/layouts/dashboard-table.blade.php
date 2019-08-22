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
    <!-- iCheck -->
    <link href="{{asset('gm/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('gm/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('gm/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('gm/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('gm/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('gm/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{asset('gm/production/images/favicon.ico')}}"  type="image/x-icon" />

    <!-- Custom Theme Style -->
    <link href="{{asset('gm/build/css/custom.min.css')}}" rel="stylesheet">
    <style type="text/css">
        .profile_details {
            ;
        }
        
        .x_content {
            height: auto!important;
        }
    </style>
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
    <!-- iCheck -->
    <script src="{{asset('gm/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('gm/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('gm/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('gm/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('gm/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('gm/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('gm/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('gm/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('gm/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('gm/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('gm/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('gm/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('gm/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('gm/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('gm/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('gm/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="{{asset('gm/build/js/isotope.pkgd.min.js')}}"></script>


    <!-- Custom Theme Scripts -->
    <script src="{{asset('gm/build/js/custom.min.js')}}"></script>
    <script type="text/javascript">
        var $grid = $('.x_content1').isotope({
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

            $('.profile_details').css({"float": "left !important",
                                          "display": "inline-block !important"});
        }

        
    </script>
  </body>
</html>