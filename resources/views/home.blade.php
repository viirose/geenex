@extends('nav')

@section('content')
    <!-- Hero Section-->
    <section class="hero">
      <div class="container mb-5">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h3 class="hero-heading mb-0">专注网络基础设施二十年!</h3>
            <div class="row">
              <div class="col-lg-10">
                <p class="lead text-muted mt-4 mb-4">20年的专注，让我们对综合布线和机柜系统有了更深层次的理解和追求; 从原材料到加工设备到生产工艺管理，我们精益求精，用工匠精神打造每一件“匠森”产品， 目的就是为了彰显您的每一个精品工程。</p>
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
    <section>
      <div class="container mb-5">
      <blockquote class="blockquote mb-5 text-left">
        20年的专注，让我们对综合布线产品和机柜系统有了更深层次的理解和追求，因此匠森（GUNTLESON）品牌应运而生！
我们正努力做得更好：
超高品质：从原材料到加工设备到生产工艺及质量管理，我们精益求精，用工匠精神打造每一件“匠森（GUNTLESON）”产品，目的就是为了彰显您的每一个精品工程。
贴合需求：根据多年的产品研发和使用经验，我们的团队立志于提供更加符合现场使用需求的全新产品及布线管理软件，为您的施工和管理创造最佳条件。
高性价比：在确保产品高品质的同时，我们压缩成本，减少流通环节，目标是为您创造更多价值。
技术服务：好的产品需要加上好的施工，从售前、售中到售后，我们由专业的技术人员为您提供服务。
匠森产品目前已经高标准的服务于包括政府，医疗，机场，学校，地铁，工厂，酒店等众多行业。2019年匠森（GUNTLESON）全系列产品安徽生产基地将正式投产，我们将一如既往的植根于该领域并不断进步。我们也希望您可以扫描产品包装二维码或者登录网站为我们提供宝贵的意见，我们真挚地表示感谢！
      </blockquote>
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