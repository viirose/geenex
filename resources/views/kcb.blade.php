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
<section class="top-sec">
    <div class="container">
        <div class="row">
        <div class="col-sm-4 cent"><img src="img/kcb.jpg" class="lf" alt=""></div>
        <div class="col-sm-8">
            <div class="row"><img src="img/logo.svg" alt="" class="img-fluid nav-logo"></div>
            
            科创板（Science and technology innovation board）由国家主席习近平于2018年11月5日在首届中国国际进口博览会开幕式上宣布设立，是独立于现有主板市场的新设板块，并在该板块内进行注册制试点。
            设立科创板并试点注册制是提升服务科技创新企业能力、增强市场包容性、强化市场功能的一项资本市场重大改革举措。通过发行、交易、退市、投资者适当性、证券公司资本约束等新制度以及引入中长期资金等配套措施，增量试点、循序渐进，新增资金与试点进展同步匹配，力争在科创板实现投融资平衡、一二级市场平衡、公司的新老股东利益平衡，并促进现有市场形成良好预期。
            2019年1月30日，中国证监会发布《关于在上海证券交易所设立科创板并试点注册制的实施意见》。6月13日，科创板正式开板。华兴源创抢得科创板第一股，6月27日进行网上申购。7月22日，科创板开市。
        </div>
        </div>
    </div>
</section>

<section class="top-sec">
<div class="container">
    <div class="row">

            <!-- Intro Section-->


    <div class="col-lg-12 mx-auto">

        
        
        <h3>科创版最新资讯 <a href="/articles">(文章中心）</a></h3>
        
                <div>
                        @if(isset($records) && count($records))
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
        
        
    </div>
    </div>
</div>
</section>

@endsection