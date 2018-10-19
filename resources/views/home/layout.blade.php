
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Indicators | Control Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ url('css/admin.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">




    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{route('admin')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>IND</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Indicators</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


                </ul>

                <!-- Control Sidebar Toggle Button -->

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->


                        <!-- Notifications: style can be found in dropdown.less -->

                        <!-- Tasks: style can be found in dropdown.less -->

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                <span class="hidden-xs">{{Auth::user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">


                                    <p>
                                        {{Auth::user()->name}}
                                        <small>Administrator</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">

                                    <a href="{{ url('/home') }}">Home</a>



                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    @auth

                                        <div class="pull-right">
                                            <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>


                                    @else
                                        <a href="{{ route('login') }}">Login</a>
                                        <a href="{{ route('register') }}">Register</a>
                                    @endauth
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MAIN NAVIGATION</li>

                @if(Auth::user() && Auth::user()->group_id == 99 or Auth::user() && Auth::user()->group_id == 84235)
                    <li>
                        <a href="{{route('admin')}}">
                            <i class="fa fa-dashboard"></i> <span>Users</span>
                        </a>
                    </li>
                @endif
                @if(Auth::user() && Auth::user()->group_id == 99 or Auth::user() && Auth::user()->group_id == 84235)
                    <li>
                        <a href="{{route('links.index')}}">
                            <i class="fa fa-dashboard"></i> <span>Links</span>

                        </a>

                    </li>
                @endif
                <li>
                    <a href="{{route('home')}}">
                        <i class="fa fa-dashboard"></i> <span>Indicators Redis <b style="color: #9f191f"> *Alpha</b></span>
                    </a>
                </li>


            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Control Panel

            </h1>

        </section>

        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <!--<footer class="main-footer">

    </footer>
-->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- Links Modal-->
<div class="modal" id="modalLinks" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Links</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="linksContent">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- ./Links Modal-->
<!-- Scripts -->
<script src="{{ url('js/admin.js') }}"></script>
<script src="{{ url('js/redis.js') }}"></script>

<!-- page script -->
<script>


    $(function () {

        $.fn.dataTable.ext.order['dom-checkbox'] = function  ( settings, col )
        {
            return this.api().column( col, {order:'index'} ).nodes().map( function ( td, i ) {
                return $('input', td).prop('checked') ? '1' : '0';
            } );
        }


        $('#Delta').DataTable({
            stateSave: true,
            "columns": [
                null,
                null,
                null,
                { "orderDataType": "dom-text-numeric" },
                { "orderDataType": "dom-text-numeric" },
                { "orderDataType": "dom-text-numeric" },
                { "orderDataType": "dom-text-numeric" },
                { "orderDataType": "dom-text-numeric" },
                { "orderDataType": "dom-text-numeric" },
                { "orderDataType": "dom-text-numeric" },
                { "orderDataType": "dom-text-numeric" },
                { "orderDataType": "dom-text-numeric" },
                { "orderDataType": "dom-text-numeric" },
                { "orderDataType": "dom-text-numeric" }


            ]
        })



    })


</script>
@yield('script')
</body>
</html>
