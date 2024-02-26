<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset('ad_asset/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('ad_asset/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ad_asset/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ad_asset/plugins/iCheck/flat/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('ad_asset/plugins/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('ad_asset/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">
    <link rel="stylesheet" href="{{ asset('ad_asset/plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('ad_asset/plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <link rel="stylesheet" href="{{ asset('ad_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('ad_asset/dist/img/user2-160x160.jpg') }}" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs">{{ auth()->user()->name }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ asset('ad_asset/dist/img/user2-160x160.jpg') }}" class="img-circle"
                            alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ auth()->user()->name }}</p>
                        <a href="{{ route('admin.logout') }}"><i class="fa fa-circle text-success"></i> Logout</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="">
                        <a href="{{ route('admin.index') }}">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <small class="label pull-right bg-green">new</small>
                        </a>
                    </li>

                    <li
                        class="treeview {{ request()->routeIs('category.index') || request()->routeIs('category.create') ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-list"></i>
                            <span>Category</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ request()->routeIs('category.index') ? 'active' : '' }}"><a
                                    href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i>List</a></li>
                            <li class="{{ request()->routeIs('category.create') ? 'active' : '' }}"><a
                                    href="{{ route('category.create') }}"><i class="fa fa-circle-o"></i>Create</a></li>
                        </ul>

                    <li
                        class="treeview {{ request()->routeIs('customer.index') || request()->routeIs('customer.create') ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Customer</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ request()->routeIs('customer.index') ? 'active' : '' }}"><a
                                    href="{{ route('customer.index') }}"><i class="fa fa-circle-o"></i>List</a></li>
                            <li class="{{ request()->routeIs('customer.create') ? 'active' : '' }}"><a
                                    href="{{ route('customer.create') }}"><i class="fa fa-circle-o"></i>Create</a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="treeview {{ request()->routeIs('product.index') || request()->routeIs('product.create') ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-th"></i>
                            <span>Product</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ request()->routeIs('product.index') ? 'active' : '' }}"><a
                                    href="{{ route('product.index') }}"><i class="fa fa-circle-o"></i>List</a></li>
                            <li class="{{ request()->routeIs('product.create') ? 'active' : '' }}"><a
                                    href="{{ route('product.create') }}"><i class="fa fa-circle-o"></i>Create</a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="treeview {{ request()->routeIs('banner.index') || request()->routeIs('banner.create') ? 'active' : '' }}">
                        <a href="#">
                            <i class="fa fa-image"></i>
                            <span>Banners</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ request()->routeIs('banner.index') ? 'active' : '' }}"><a
                                    href="{{ route('banner.index') }}"><i class="fa fa-circle-o"></i>List</a></li>
                            <li class="{{ request()->routeIs('banner.create') ? 'active' : '' }}"><a
                                    href="{{ route('banner.create') }}"><i class="fa fa-circle-o"></i>Create</a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="treeview {{ request()->routeIs('order.index') ||
                        request()->fullUrlIs(route('order.filter') . '?status=0') ||
                        request()->fullUrlIs(route('order.filter') . '?status=1') ||
                        request()->fullUrlIs(route('order.filter') . '?status=2') ||
                        request()->fullUrlIs(route('order.filter') . '?status=3')
                            ? 'active'
                            : '' }}">
                        <a href="#">
                            <i class="fa fa-list"></i>
                            <span>Order</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="{{ request()->routeIs('order.index') ? 'active' : '' }}"><a
                                    href="{{ route('order.index') }}"><i class="fa fa-circle-o"></i>All Order</a>
                            </li>
                            <li
                                class="{{ request()->fullUrlIs(route('order.filter') . '?status=0') ? 'active' : '' }}">
                                <a href="{{ route('order.filter') }}?status=0">
                                    <i class="fa fa-circle-o"></i>Unconfimred
                                </a>
                            </li>
                            <li
                                class="{{ request()->fullUrlIs(route('order.filter') . '?status=1') ? 'active' : '' }}">
                                <a href="{{ route('order.filter') }}?status=1">
                                    <i class="fa fa-circle-o"></i>Confirmed
                                </a>
                            </li>
                            <li
                                class="{{ request()->fullUrlIs(route('order.filter') . '?status=2') ? 'active' : '' }}">
                                <a href="{{ route('order.filter') }}?status=2">
                                    <i class="fa fa-circle-o"></i>Delivered
                                </a>
                            </li>
                            <li
                                class="{{ request()->fullUrlIs(route('order.filter') . '?status=3') ? 'active' : '' }}">
                                <a href="{{ route('order.filter') }}?status=3">
                                    <i class="fa fa-circle-o"></i>Cancelled
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    @yield('title')
                </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="box">
                    <div class="box-body">
                        @if (Session::has('ok'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('ok') }}
                            </div>
                        @endif
                        @if (Session::has('no'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('no') }}
                            </div>
                        @endif
                        @yield('main')
                    </div>
            </section>
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.3
            </div>
            <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All
            rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Report panel usage
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Allow mail redirect
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Expose author name in posts
                                <input type="checkbox" class="pull-right" checked>
                            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Show me as online
                                <input type="checkbox" class="pull-right" checked>
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Turn off notifications
                                <input type="checkbox" class="pull-right">
                            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Delete chat history
                                <a href="javascript:void(0)" class="text-red pull-right"><i
                                        class="fa fa-trash-o"></i></a>
                            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <div class="control-sidebar-bg"></div>
    </div>
    <script src="{{ asset('ad_asset/plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>
    <script src="{{ asset('https://code.jquery.com/ui/1.11.4/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ asset('ad_asset/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset('ad_asset/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('ad_asset/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('ad_asset/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('ad_asset/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('ad_asset/plugins/knob/jquery.knob.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="{{ asset('ad_asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('ad_asset/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('ad_asset/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ asset('ad_asset/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('ad_asset/plugins/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('ad_asset/dist/js/app.min.js') }}"></script>
    {{-- <script src="{{ asset('ad_asset/dist/js/pages/dashboard.js') }}"></script> --}}
    <script src="{{ asset('ad_asset/dist/js/demo.js') }}"></script>
    @yield('js')
    @yield('css')
    @yield('js_donut')
</body>

</html>
