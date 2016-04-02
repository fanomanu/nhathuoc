<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin - @yield('title')</title>

    <!-- CSS -->
    <!-- Bootstrap -->	        <link rel="stylesheet" href="{{ url('public/admin/css/bootstrap.min.css') }}" type="text/css" />
    <!-- Collapmenu style -->	<link rel="stylesheet" href="{{ url('public/admin/css/collapsemenu-styles.css') }}" type="text/css" />
    <!-- Style -->              <link rel="stylesheet" href="{{ url('public/admin/styles.css') }}" type="text/css" />
    @stack('head-fw')
    <!-- Javascript -->
    <!-- Jquery     -->           <script src="{{ url('public/admin/js/jquery.min.js') }}" type="text/javascript"></script> 
    <!-- Bootstrap  -->           <script src="{{ url('public/admin/js/bootstrap.min.js') }}" type="text/javascript"></script> 
    <!-- Collapmenu  -->          <script src="{{ url('public/admin/js/collapsemenu_script.js') }}" type="text/javascript"></script>
</head>
<body>
    <div class="hero-unit">
            <div class="navbar">  
                <div class="navbar-inner">
                    <div class="col-lg-3" style="padding-bottom: 10px;">
                        <a class="logo" href="#"></a>      
                    </div>
                    <div class="col-lg-9" style="padding-right: 50px;">
                        <div class="pull-right">       
                            <div class="dropdown userinfo">
                                Admin S: 
                                <button class="btn btn-default dropdown-toggle btn-userinfo" data-toggle="dropdown" type="button" id="userdropdownmenu" aria-haspopup="true" aria-expanded="true">
                                    Benfriends
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="userdropdownmenu">
                                    <li><a href="#">Thông tin tài khoản</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Đăng xuất</a></li>
                                </ul>  
                            </div><!-- END dropdown -->          
                        </div>    
                    </div>              
                </div>            
            </div><!-- END navbar -->   
    </div><!-- END hero-unit -->
    <div class="main-unit">
        <div class="row">
            @yield('content')      
        </div>    
    </div><!-- END main-unit -->             
    @include('admin.blocks.footer')
    <!-- My script -->            <script src="{{ url('public/admin/script.js') }}" type="text/javascript"></script>   
    @stack('foot-fw')

    @stack('scripts')
</body>  
</html>
