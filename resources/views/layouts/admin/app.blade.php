<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>  Blog  | @yield( 'title' )</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <link rel="stylesheet" href="{!! asset('dashboard/styles/vendor.css') !!}">
    <link rel="stylesheet" href="{!! asset('dashboard/styles/metronic.css') !!}">
    <link rel="stylesheet" href="{!! asset('dashboard/styles/main.css') !!}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.4/css/jquery.dataTables.min.css">

    <script src="{!! asset('dashboard/scripts/lib/modernizr/modernizr.js') !!}"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<!--[if lt IE 10]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" upgrade your browser to improve your experience.</p>-->
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner">
        <div class="page-logo"><a href="index.html"></a>
            <div class="menu-toggler sidebar-toggler">
            </div>
        </div><a href="javascript:;" data-toggle="collapse" data-target=".navbar-collapse" class="menu-toggler responsive-toggler"> </a>
        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    @else
                        <li class="dropdown dropdown-user"><a href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" class="dropdown-toggle"><span class="username">{{ Auth::user()->name }}</span><i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();"><i class="icon-key"></i>
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN HEADER & CONTENT DIVIDER-->
<div class="clearfix"></div>
<!-- END HEADER & CONTENT DIVIDER-->
<!-- BEGIN CONTAINER-->
<div class="page-container">
    @include('layouts.admin._sidebar')
    <!-- BEGIN CONTENT-->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY-->
        <div class="page-content">
            @if( \Session::has( 'success' ) )
                <div class="alert alert-success alert-dismissible">
                    <h4><i class="icon fa fa-check"></i> Alert!</h4>
                    {{ \Session::get( 'success' ) }}
                </div>
            @endif
            @if( \Session::has( 'error' ) )
                <div class="alert alert-danger alert-dismissible">
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    {{ \Session::get( 'error' ) }}
                </div>
            @endif
            @if( \Session::has( 'warning' ) )
                <div class="alert alert-warning alert-dismissible">
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    {{ \Session::get( 'warning' ) }}
                </div>
                @endif

                        <!-- BEGIN PAGE HEADER-->
                <h1 class="page-title">@yield('title') <small>@yield( 'slug' )</small></h1>
                @yield( 'content' )
        </div>
    </div>
</div>
<!-- BEGIN FOOTER-->
<footer class="page-footer">
    <div class="page-footer-inner"></div>
    <div class="scroll-to-top"><i class="icon-arrow-up"></i></div>
</footer>
<!-- END FOOTER-->
<script src="{!! asset('dashboard/scripts/lib/require.js') !!}"></script>
<script src="{!! asset('dashboard/scripts/config.js') !!}"></script>
<script src="{!! asset('dashboard/scripts/common.js') !!}"></script>
@yield('footerscripts')
</body>
</html>