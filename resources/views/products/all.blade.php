<?php
  $f = new App\Helpers\Filter;
  $r = new App\Helpers\Role;
?>
@extends('../nav')

@section('content')
<div class="row top-pad"></div>

   <!-- FAQ Section-->
    <section>
      <div class="container">
        <!-- wordPress installation-->
        <header class="section header mb-5">
          <h3><i class="fa fa-cube" aria-hidden="true"></i> 产品列表 [{{ $products->count() }}] </h3>
          <p class="lead">

            @if(Session::has('keywords') || Session::has('search_category_id') || Session::has('search_brand_id') || Session::has('search_level'))
            <a href="/products/clear_search/all" class="btn btn-outline-primary btn-sm"> 清除查询条件</a>
            @else
            所有产品
            @endif
            

            @if(Session::has('keywords'))
              <a href="/products/clear_search/keywords" class="badge badge-warning">关键词: {{ session('keywords') }}</a>
            @endif

            @if(Session::has('search_category_id'))
              <a href="/products/clear_search/search_category_id" class="badge badge-info">分类: {{ $f->showConf(session('search_category_id')) }}</a>
            @endif

            @if(Session::has('search_level') && Session::has('search_level_id'))
              <a href="/products/clear_search/search_level" class="badge badge-danger">分类: {{ $f->showConf(session('search_level')) }}</a>
            @endif

            @if(Session::has('search_brand_id'))
              <a href="/products/clear_search/search_brand_id" class="badge badge-dark">品牌: {{ $f->showConf(session('search_brand_id')) }}</a>
            @endif

          </p>
        </header>
        <div class="row"> 
          <div class="col-lg-8">   
            <div id="accordion" class="faq accordion accordion-custom pb-5">
            @if(count($products))
            <div class="row">
              @foreach($products as $product)
                <div class="col-12 col-sm-4">
                  <img src="{{ $product->img ? asset($product->img) : asset('img/sample.jpg') }}" class="rounded img-fluid">
                  <p>
                    # {!! $f->fit($product->part_no) !!} <br>
                    <strong>{!! $f->fit($product->name) !!}</strong> <br>
                    {!! $f->fit($product->remark) !!}<br>
                    <a href="/inquiries/add/{{ $product->id }}" class="btn btn-sm btn-outline-primary">咨询</a>
                    <a href="/products/show/{{ $product->id }}" class="btn btn-sm btn-outline-primary">详情</a>
                  </p>
                  
                </div>
              @endforeach
            </div>
            @else
              <div class="alert alert-info cent">
                <h1><i class="fa fa-eye-slash" aria-hidden="true"></i></h1>
                <p>没找到符合的产品</p>
                <a href="/#contact_form" class="btn btn-info btn-sm">马上把您的要求告诉我们</a>
              </div>
            @endif
            <div>{{ $products->links() }}</div>
              
            </div>
          </div>
          <!-- sidebar-->
          <aside class="sidebar col-lg-4 mt-5 mt-lg-0">
            <div class="search mb-4">
              <form action="/products/search" class="search-form" method="post">
                <div class="form-group">
                  @csrf
                  <input type="text" name="keywords" placeholder="关键词" class="form-control" value="{{ Session::has('keywords') ? session('keywords') : '' }}">
                  <button type="submit"> <i class="fa fa-search"></i></button>
                </div>
              </form>
            </div>
            <div class="sidebar-widget mb-4">
              <h3 class="sidebar-widget-heading"><i class="fa fa-bookmark-o" aria-hidden="true"></i> 分类</h3>
              <ul class="list-unstyled pl-0 mt-4">
              @if(count($categories))
                @foreach($categories as $level_1)
                  <li> <a href="/products/search/level1/{{ $level_1->id }}" class="categories-link"><h5><i class="fa fa-bookmark" aria-hidden="true"></i> {{ $level_1->key }} </h5></a></li>
                  @if(count($level_1->subs))
                    @foreach($level_1->subs as $level_2)
                  <li>  &nbsp <a href="/products/search/level2/{{ $level_2->id }}" class="categories-link"><i class="fa fa-angle-right" aria-hidden="true"></i> <strong>{{ $level_2->key }} </strong></a></li>
                      @if(count($level_2->subs))
                         @foreach($level_2->subs as $level_3)
                  <li>  &nbsp&nbsp - <a href="/products/search/category/{{ $level_3->id }}" class="categories-link">{{ $level_3->key }}
                    @if($r->admin())
                   ({{ $level_3->products_count }})
                    @endif
                 </a></li>
                         @endforeach
                      @endif
                    @endforeach
                  @endif
                  <br>
                @endforeach
              @else
                  (空)
              @endif

              </ul>
            </div>
            <div class="sidebar-widget">
              <h4 class="sidebar-widget-heading"><i class="fa fa-tags" aria-hidden="true"></i> 品牌</h4>
              <ul class="list-inline pl-0 mt-4">
              @if(count($brands))
                @foreach($brands as $b)
                  <li class="list-inline-item mr-0"><a href="/products/search/brand/{{ $b->id }}" class="tag-link">{{ $b->key }} 
                    @if($r->admin())
                    <small>({{ $b->brand_products_count }})</small>
                    @endif
                  </a></li>
                @endforeach
              @else
                (空)
              @endif

              </ul>
            </div>
          </aside>
        </div>
      </div>
    </section>

    <!-- 模态框 -->
  <div class="modal fade" id="delete_confirm">
    <div class="modal-dialog">
      <div class="modal-content">
   
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
   
        <div class="modal-body">
          此操作无法恢复
        </div>
   
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">关闭</button>
          <a href="#" class="btn btn-danger btn-sm" id="go">删除!!</a>
        </div>
   
      </div>
    </div>
  </div>

    <script>
      function del(id) {
        $("#delete_confirm").modal();
        
        var url = '/products/delete/' + id;
        $("#go").attr('href', url);
      }
    </script>
@endsection












