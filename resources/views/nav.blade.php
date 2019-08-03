<?php
  $r = new App\Helpers\Role;
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>科创版+50ETF [财经一线]</title>
    <meta name="keywords" content="科创板,50ETF,ETF,期权,股票,财经一线,系统搭建"/>
    <meta name="description" content="财经一线科创板,50ETF系统搭建和咨询">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Lightbox-->
    <link rel="stylesheet" href="{{ asset('vendor/lightbox2/css/lightbox.css') }}">
    <!-- Custom font icons-->
    <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
<!-- navbar-->
<header class="header">
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container"><a href="./" class="nav-logo"><img src="img/logo.svg" alt="" class="img-fluid"></a>
      <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">Menu<i class="fa fa-bars ml-2"></i></button>
      
      <div id="navbarSupportedContent" class="collapse navbar-collapse pull-left">
        <ul class="navbar-nav ml-auto">
              <!-- Link-->
              <li class="nav-item"> <a href="/" class="nav-link">首页</a></li>
              <li class="nav-item"> <a href="/kcb" class="nav-link">科创版</a></li>
              <!-- Link-->
              <li class="nav-item"> <a href="/etf" class="nav-link">50ETF</a></li>
              <li class="nav-item"> <a href="/sc" class="nav-link">系统搭建</a></li>
              <li class="nav-item"> <a href="/" class="nav-link">联系我们</a></li>
              <li class="nav-item">
                @if(Auth::check())
                  <div class="dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                      {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/pub">文章发布</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/rest_password">修改密码</a>
                      <a class="dropdown-item" href="/quit">退出</a>
                    </div>
                  </div>
                @else

                  <a href="/login" class="nav-link"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                @endif
             </li>
              <!-- Link-->
        </ul>
      </div>
    </div>
  </nav>
</header>



    @yield('content')

    <footer class="footer">

      <div class="copyrights">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
              <p class="copyrights-text mb-3 mb-lg-0">
                <small>版权所有 &copy; 2019.财经一线</small> 
                
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/lightbox2/js/lightbox.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
  <script>
    // ajax csrf
    $(function(){ 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });
    });
</script>
  </body>
</html>