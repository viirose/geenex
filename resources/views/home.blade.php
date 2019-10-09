@extends('nav')

@section('content')
  <script>
      var _hmt = _hmt || [];
      (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?3e127be7393825998c86dcb08d3477d8";
        var s = document.getElementsByTagName("script")[0]; 
        s.parentNode.insertBefore(hm, s);
      })();
    </script>

<section>
  <div class="cent"><img src="img/lee.jpg" alt="..." class="huge-img img-fluid"></div>
</section>
    

    <!-- Intro Section-->
    <section class="top-sec">
      <div class="container">
        <div class="row">
          <div class="col-sm-4 cent"><img src="img/lou.jpg" alt=""></div>
          <div class="col-sm-8">
              <div class="row"><img src="img/logo.svg" alt="" class="img-fluid nav-logo"></div>
              <h3 class="text-primary">科技创新, 相遇相随</h3>
            科创板交易平台：科创板平台为广大投资者提供零门槛开户，正规合法，系统稳定，资金安全，上海科创板交易平台独家研发软件，敬请广大投资者体验科创板平台交易测试。<br>
            财经一线：投资管理平台，总部位于上海，分支机构及业务范围辐 射全国，是一家专业从事投资管理，资产管理咨询的服务机构平台。 科创板\50ETF期权定位于主流交易产品、资产管理计划、私募股权基金等产品供应商的首选发行渠道和中国 高净值客户的首选产品交易专家，业务以客户服务为核心，、宏观的经济趋势建议，帮助客 户实现财富保值增值的目标
          </div>
        </div>
      </div>
    </section>

    <!-- Integrations Section-->
    <section class="top-sec">
      <div class="container">
        <div>
          <h3>最近更新 <a href="/articles">(查看全部）</a></h3>
          @if(count($records))
          <div class="list-group">
            @foreach($records as $record)
            <a href="/articles/show/{{ $record->id }}" class="list-group-item list-group-item-action">
              <img src="img/{{$record->type}}1.jpg" class="article">
              {{ str_limit($record->title, 30) }}
              <small class="text-secondary">{{ $record->created_at }}</small>
            </a>
            @endforeach

          </div>
          @else
            <div class="alert alert-info">
              暂无新文章
            </div>
          @endif
      </div>
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