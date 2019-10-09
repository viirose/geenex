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
        <div class="col-sm-4 cent"><img src="img/sc.jpg" class="lf" alt=""></div>
        <div class="col-sm-8">
            <div class="row"><img src="img/logo.svg" alt="" class="img-fluid nav-logo"></div>
            
            软件开发定制：<br>
我公司是根据客户的所有需求，对软件进行独立自主开发(以下简称软件自主开发)或二次开发，并以软件开发为主营业务的公司。软件开发公司的业务流程大致为:需求确认--概要设计--详细设计--编程--单元测试--集成测试--系统测试--维护。<br><br>

补充1:需求确认由需求分析师完成，概要设计、详细设计由系统架构师和软件设计师共同完成，后期软件的开发和测试由程序员和软件测试人员完成。<br><br>

补充2:需求分析师负责和客户谈需求,软件设计师根据系统架构师决定的整个系统架构制作系统原型，程序员和软件测试人员负责软件的开发与测试,维护人员负责软件产品完成后的安装与维护工作，维护人员要在软件成品的运作期间排除故障，使软件能平稳正常工作，而且也可以扩展软件本身的功能，提高性能，为用户带来明显的经济效益。所以在实际的软件开发过程中并不是从第一步进行到最后一步，而是在任何阶段，在进入下一阶段前一般都会有一步或几步的回溯。如，在测试过程中的问题可能要求修改设计，用户可能会提出一些新的需求等。软件自主开发享有软件著作权。

而二次开发是根据客户的所有需求对现有的软件产品进行功能模块或代码的修改与增减，花费最少的精力与代价使之契合用户的需求，同时对二次开发所产生的软件产品负有软件测试与维护的义务，但不具备软件著作权。



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
                        <div>
                                {!! $records->render() !!}
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