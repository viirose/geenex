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
        <div class="col-sm-4 cent"><img src="img/etf.jpg" class="lf" alt=""></div>
        <div class="col-sm-8">
            <div class="row"><img src="img/logo.svg" alt="" class="img-fluid nav-logo"></div>
            
            股票期权合约为上交所统一制定的、规定买方有权在将来特定时间以特定价格买入或者卖出约定股票或者跟踪股票指数的交易型开放式指数基金(ETF)等标的物的标准化合约。<br>
期权是交易双方关于未来买卖权利达成的合约。就个股期权来说，期权的买方(权利方)通过向卖方(义务方)支付一定的费用(权利金)，获得一种权利，即有权在约定的时间以约定的价格向期权卖方买入或卖出约定数量的特定股票或ETF。当然，买方(权利方)也可以选择放弃行使权利。如果买方决定行使权利，卖方就有义务配合。

        </div>
        </div>
    </div>
</section>

<section class="top-sec">
<div class="container">
    <div class="row">

            <!-- Intro Section-->


    <div class="col-lg-12 mx-auto">

        
        
        <h3>50ETF最新资讯 <a href="/articles">(文章中心）</a></h3>
        
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