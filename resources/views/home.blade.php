@extends('nav')

@section('content')
    <!-- Hero Section-->
    <section class="hero">
      <div class="container mb-5">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h2 class="hero-heading mb-0">前沿资讯, 资深分析</h2>
            <div class="row">
              <div class="col-lg-10">
                <p class="lead text-muted mt-4 mb-4">科创版 / 50ETF资深分析师, 为您提供专业信息</p>
              </div>
            </div>
          </div>
          <div class="col-lg-6"><img src="img/illustration-hero.svg" alt="..." class="hero-image img-fluid d-none d-lg-block"></div>
        </div>
      </div>
    </section>
    <!-- Intro Section-->
    <section>
      <div class="container">
        <div class="text-center">
          <div><img src="./img/logo.svg" alt="logo" class="nav-logo"></div>
          <p class="lead text-muted mt-2">财经一线是由资深股市+期权分析师组成的精英团队, 专业为客户提供敏捷的分析, "为客户创造价值" 是财经一线全体成员的信仰, 我们诚挚欢迎广大朋友咨询流, 共享价值和财富!</p>
          <a href="#" class="btn btn-primary">马上联系</a>
        </div>
        <div class="row">
          <div class="col-lg-7 mx-auto mt-5"><img src="img/illustration-1.svg" alt="..." class="intro-image img-fluid"></div>
        </div>
      </div>
    </section>

    <!-- Integrations Section-->
    <section>
      <div class="container">
        <div name="contact" class="text-center">
          <h2>联系我们</h2>
          <p>您可以通过以下方式联系我们, 我们有专人24小时为您服务!</p>
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <p class="lead text-muted mt-2"></p>
            </div>
          </div>
        </div>
        <div class="integrations mt-5">
          <div class="row">
            <div class="col-lg-4">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><img src="img/tel.svg" alt="..." class="img-fluid"></div>
                <h3 class="h4">186 2186 8262</h3>
                <p class="text-small font-weight-light">24小时客服专线</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><img src="img/addr.svg" alt="..." class="img-fluid"></div>
                <h3 class="h4">地址</h3>
                <p class="text-small font-weight-light">上海市普陀区江宁路1157号805</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><img src="img/other.svg" alt="..." class="img-fluid"></div>
                <h3 class="h4">其他联系方式</h3>
                <p class="text-small font-weight-light">QQ:3531731877(支持邮件); 微信号:HZGYJR</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection