@extends('nav')

@section('content')
    <!-- Hero Section-->
    <section class="hero">
      <div class="container mb-5">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h3 class="hero-heading mb-0">专注机柜系统十五年!</h3>
            <div class="row">
              <div class="col-lg-10">
                <p class="lead text-muted mt-4 mb-4">15年的专注，让我们对机柜系统有了更深层次的理解和追求；从原材料到加工设备到生产工艺管理，我们精益求精，用工匠精神打造每一件“匠森”产品，目的就是为了彰显您的每一个精品工程。</p>
              </div>
            </div>
            <form action="/products/search" method="post" class="subscription-form">
              <div class="form-group">
                @csrf
                <input type="text" name="keywords" placeholder="关键词" class="form-control" value="{{ Session::has('keywords') ? session('keywords') : '' }}">
                <button type="submit" class="btn btn-primary">查询</button>
              </div>
            </form>
          </div>
          <div class="col-lg-6"><img src="img/main.jpg" alt="..." class="hero-image img-fluid d-none d-lg-block"></div>
        </div>
      </div>
    </section>
  
    <!-- Contact Section-->
    <section  id="contact_form">
      <div class="container">
        <header class="section-header">
          <h2 class="mb-2">马上联系
            @if(Auth::check())
            : {{ Auth::user()->email }}
            @endif
          </h2>
        </header>
        <div class="row align-items-center mt-5">
          <div class="col-lg-7">
            
            {!! form($form) !!}

          </div>
          <div class="col-lg-5 contact-details mt-5 mt-lg-0">
            <div class="box">
              <div class="icon d-flex align-items-end"><img src="img/placeholder.svg" alt="" class="img-fluid"></div>
              <h5>地址</h5>
              <p class="text-small font-weight-light">{{ config('site.info.addr') }}</p>
            </div>
            <div class="box">
              <div class="icon d-flex align-items-end"><img src="img/technology.svg" alt="" class="img-fluid"></div>
              <h5>联系电话</h5>

              <p class="text-small font-weight-light">传真: {{ config('site.info.fax') }}</p>
              <strong class="text-muted">电话: {{ config('site.info.tel') }}</strong>
            </div>
            <div class="box">
              <div class="icon d-flex align-items-end"><img src="img/multimedia.svg" alt="" class="img-fluid"></div>
              <h5>邮件</h5>
              <p class="text-small font-weight-light"><strong>{{ config('site.info.email') }} </strong> </p>

            </div>
          </div>
        </div>
      </div>
    </section>

@endsection