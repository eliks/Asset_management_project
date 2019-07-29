<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
        <a href="index.html" class="site_title">UG Assets Manager</a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
        <img src="{{asset('gm/production/images/img.jpg')}}" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
        <span>Welcome,</span>
        <h2>John Doe</h2>
        </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
        <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Dashboard </a></li>
        <li><a><i class="fa fa-cubes"></i> Assets <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="{{route('assets.index')}}">All Assets</a></li>
                <li><a href="{{route('assets.create')}}">New Asset</a></li>
                <li><a href="{{route('assets.index')}}">Asset Types</a></li>
            </ul>
            </li>
            <li><a><i class="fa fa-wrench"></i> Maintenance <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="form.html">General Form</a></li>
                <li><a href="form_advanced.html">Advanced Components</a></li>
                <li><a href="form_validation.html">Form Validation</a></li>
                <li><a href="form_wizards.html">Form Wizard</a></li>
                <li><a href="form_upload.html">Form Upload</a></li>
                <li><a href="form_buttons.html">Form Buttons</a></li>
            </ul>
            </li>
            <li><a><i class="fa fa-map-marker"></i> Locations <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="general_elements.html">General Elements</a></li>
                <li><a href="media_gallery.html">Media Gallery</a></li>
                <li><a href="typography.html">Typography</a></li>
                <li><a href="icons.html">Icons</a></li>
                <li><a href="glyphicons.html">Glyphicons</a></li>
                <li><a href="widgets.html">Widgets</a></li>
                <li><a href="invoice.html">Invoice</a></li>
                <li><a href="inbox.html">Inbox</a></li>
                <li><a href="calendar.html">Calendar</a></li>
            </ul>
            </li>
            <li><a><i class="fa fa-newspaper-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="tables.html">Tables</a></li>
                <li><a href="tables_dynamic.html">Table Dynamic</a></li>
            </ul>
            </li>
        </ul>
        </div>
        <div class="menu_section">
        <h3>Configurations</h3>
        <ul class="nav side-menu">
            <li><a href="#"><i class="fa fa-cube"></i> Asset Types </a></li>
            <li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="#">All Users</a></li>
                <li><a href="#">New User</a></li>
                <li><a href="#">User Types</a></li>
            </ul>
            </li>
            <li><a><i class="fa fa-ticket"></i> More <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a href="#">Asset Type Fields</a></li>
                <li><a href="#">Location Types</a></li>
            </ul>
            </li>
        </ul>
        </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
        <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
        </a>
        <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
        </a>
    </div>
    <!-- /menu footer buttons -->
    </div>
</div>