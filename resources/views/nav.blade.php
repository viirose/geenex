<?php
  $r = new App\Helpers\Role;

  $menus = App\Conf::where('type','category')->where('level',1)->get();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="机柜,冷通道,PDU,切换器,综合布线,guntleson,匠森,希贝元"/>
    <title>{{ config('site.info.name') }}</title>
    <meta name="description" content="">
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
    <link rel="stylesheet" href="{{ asset('css/style.'.config('site.info.color').'.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

  @if(config('site.info.icon'))
    <link rel="stylesheet" href="{{ asset('css/'.config('site.info.css').'.css') }}">
  @endif
    <!-- Favicon-->
  @if(config('site.info.icon'))
    <link rel="shortcut icon" href="{{ asset('img/'.config('site.info.icon')) }}">  
  @endif
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container"><a href="/" class="navbar-brand"><img src="{{ asset('img/'.config('site.info.logo')) }}" alt="" class="img-fluid"></a>
          <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">Menu<i class="fa fa-bars ml-2"></i></button>
          <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                  <!-- Link-->
                </li>
                  <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">产品中心</a>

                      <div class="dropdown-menu">

                          @foreach($menus as $level1)
                          <div class="dropdown-submenu">
                              <a class="dropdown-item" href="#">{{ $level1->key }}</a>
                              <div class="dropdown-menu" >
                                @foreach($level1->subs as $level2)
                                  <a class="dropdown-item" href="#">{{ $level2->key }}</a>
                                @endforeach
                              </div>
                          </div>
                          @endforeach

                      </div>

                  </li>
                  <!-- Link-->
                  <!-- Link-->

                  <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">|   &nbsp 技术支持
                    @if(Session::has('inquiries') && count(session('inquiries')))
                      <span class="badge badge-danger">{{ count(session('inquiries')) }}</span>
                    @endif
                  </a>
                  <div class="dropdown-menu">
                    <a href="/inquiries" class="dropdown-item"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> 咨询
                      @if(Session::has('inquiries') && count(session('inquiries')))
                        <span class="badge badge-danger">{{ count(session('inquiries')) }}</span>
                      @endif
                    </a>
                    <a href="/downloads" class="dropdown-item"><i class="fa fa-download" aria-hidden="true"></i> 下载</a>
                  </div>

                </li>

                <li class="nav-item"><a href="/projects" class="nav-link">|   &nbsp 案例精选 </a>
                </li>

                  </li>
                  <li class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">|  &nbsp<i class="fa fa-{{ Auth::check() ? 'user-circle-o' : 'user-o' }}" aria-hidden="true"></i> {{ Auth::check() ? Auth::user()->name : '' }} {!! Auth::check() && !$r->emailVerified() ? ' <span class="text-danger">[not verified]</span>' : '' !!}</a>
                    <div class="dropdown-menu">
                    @if (Auth::check())
                      @if($r->root())
                      <a href="/conf/categories" class="dropdown-item"><i class="fa fa-bookmark-o" aria-hidden="true"></i> 产品类型</a>
                      <a href="/conf/brands" class="dropdown-item"><i class="fa fa-tags" aria-hidden="true"></i> 品牌</a>
                      @endif

                      @if($r->admin())
                      <a href="/products/create" class="dropdown-item"><i class="fa fa-cube" aria-hidden="true"></i> 发布产品</a>
                      <a href="/users" class="dropdown-item"><i class="fa fa-users" aria-hidden="true"></i> 用户</a>
                      @endif
                      <a href="/users/reset_password" class="dropdown-item"><i class="fa fa-key" aria-hidden="true"></i> 重置密码</a>
                      <a href="/logout" class="dropdown-item"><i class="fa fa-power-off" aria-hidden="true"></i> 安全退出</a>
                    @else
                      <a href="/login" class="dropdown-item"><i class="fa fa-key" aria-hidden="true"></i> 登录</a>
                      <a href="/register" class="dropdown-item"><i class="fa fa-anchor" aria-hidden="true"></i> 注册</a>
                    @endif
                    </div>

                  </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    @yield('content')


<div class="footer">
  <div class="text-center">
    <p>
      <small>&copy; {{ today()->year }} {{ config('site.info.corp_full_name') }}</small> <br>
      <small><a href="http://beian.miit.gov.cn">{{ config('site.info.beian') }}</a></small>
    </p>
    <p>
      
    </p>
  </div>
</div>

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