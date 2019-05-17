<?php
  $f = new App\Helpers\Filter;
  $r = new App\Helpers\Role;
  $rc = new App\Helpers\Recent;
?>
@extends('../nav')

@section('content')
<div class="row top-pad"></div>

   <!-- FAQ Section-->
    <section>
      <div class="container">
        <!-- wordPress installation-->
        <header class="section header mb-5">
          <h2><i class="fa fa-cube" aria-hidden="true"></i> Products [{{ $products->count() }}] </h2>
          <p class="lead">

            @if(Session::has('keywords') || Session::has('search_category_id') || Session::has('search_brand_id') || Session::has('search_level'))
            <a href="/products/clear_search/all" class="btn btn-outline-primary btn-sm"> clear criteria</a>
            @else
            all products
            @endif
            

            @if(Session::has('keywords'))
              <a href="/products/clear_search/keywords" class="badge badge-warning">Keywords: {{ session('keywords') }}</a>
            @endif

            @if(Session::has('search_category_id'))
              <a href="/products/clear_search/search_category_id" class="badge badge-info">Material Group: {{ $f->showConf(session('search_category_id')) }}</a>
            @endif

            @if(Session::has('search_level') && Session::has('search_level_id'))
              <a href="/products/clear_search/search_level" class="badge badge-danger">Material Group: {{ $f->showConf(session('search_level')) }}</a>
            @endif

            @if(Session::has('search_brand_id'))
              <a href="/products/clear_search/search_brand_id" class="badge badge-dark">Manufacturer: {{ $f->showConf(session('search_brand_id')) }}</a>
            @endif

          </p>
        </header>
        <div class="row"> 
          <div class="col-lg-8">   
            <div id="accordion" class="faq accordion accordion-custom pb-5">
            @if(count($products))
              @foreach($products as $product)
              <div class="card">
                <div id="headingOne" class="card-header">
                  <h4 class="mb-0 accordion-heading">
                    <button data-toggle="collapse" data-target="#collapse{{$product->id}}" aria-expanded="false" aria-controls="collapse{{$product->id}}" class="d-flex align-items-center">
                      <img src="{{ $product->img ? asset($product->img) : asset('img/sample.jpg') }}" class="rounded list-icon">
                      <span class="list-head"><strong>{!! $f->fit($product->part_no) !!}</strong><br>{!! $f->fit($product->name) !!}</span>
                      
                    </button>
                  </h4>
                </div>
                <div id="collapse{{$product->id}}" aria-labelledby="headingOne" data-parent="#accordion" class="collapse">
                  <div class="card-body">
                      <div class="cent">
                        <img src="{{ $product->img ? asset($product->img) : asset('img/sample.jpg') }}" class="rounded img-fluid">
                      </div>
                      <p></p>
                      <table class="text-white">
                        <tbody>
                          <tr>
                            <td><strong>GENNEX&nbspRef.&nbsp</strong> </td>
                            <td>G{{ $f->show($product->brand->info, 'code', '-') }}{{ $f->show($product->category->master->master->info, 'code', '-') }}{{ $f->show($product->category->master->info, 'code', '-') }}{{ $f->show($product->category->info, 'code', '-') }}{{ $product->id }}</td>
                          </tr>
                          <tr>
                            <td><strong>Part&nbspName</strong></td>
                            <td>{!! $f->fit($product->name) !!}</td>
                          </tr>
                          <tr>
                            <td><strong>Part&nbspNr.</strong></td>
                            <td>{!! $f->fit($product->part_no) !!}</td>
                          </tr>
                          <tr>
                            <td><strong>Part&nbspfor</strong></td>
                            <td>{{ $product->brand->key }}</td>
                          </tr>
                          <tr>
                            <td><strong>Material&nbspGroup&nbsp</strong></td>
                            <td>
                              {{ $product->category->master->master->key }} -
                              {{ $product->category->master->key }} -
                              {{ $product->category->key }} 
                            </td>
                          </tr>
                          <tr>
                            <td><strong>Availability</strong></td>
                            <td>{{ $product->availability->key }}</td>
                          </tr>
                          <tr>
                            <td><strong>Weight</strong></td>
                            <td>{{ $product->weight }}</td>
                          </tr>
                          <tr>
                            <td class="align-top"><strong>Remark</strong></td>
                            <td>{!! $f->fit($product->remark) !!}</td>
                          </tr>
                        </tbody>
                      </table>
                      <div class="row">
                        <div class="col-10 col-sm-4 btns"><a href="/products/show/{{$product->id}}" class="btn btn-light btn-sm btn-block">show on new page</a></div>
                        <div class="col-10 col-sm-4 btns"><a href="/inquiries/add/{{$product->id}}" class="btn btn-light btn-sm btn-block">add to My Inquiry</a></div>
                        <div class="col-10 col-sm-4 btns"><a href="javascript:send({{$product->id}})" class="btn btn-outline-light btn-sm btn-block">Email to a friend</a></div>
                      </div>
                      
                      
                      


                      @if(Auth::check() && $r->admin())
                        <ul class="list-unstyled pl-0 mt-4">
                          <li>Created by: {{ $product->creater->name }}</li>
                          <li>Created at: {{ $product->created_at }} [{{ $product->created_at->diffForHumans() }}]</li>
                          <li>Updated at: {{ $product->updated_at }} [{{ $product->updated_at->diffForHumans() }}]</li>
                          <li>
                            <a href="/products/edit/{{ $product->id }}" class="btn btn-outline-light btn-sm">edit</a>
                            <a href="javascript:del({{ $product->id }})" class="btn btn-danger btn-sm">delete!</a>
                          </li>
                        </ul>
                      @endif


                  </div>
                </div>
              </div>
              @endforeach
            @else
              <div class="alert alert-info cent">
                <h1><i class="fa fa-eye-slash" aria-hidden="true"></i></h1>
                <p>No items were found using the following search criteria.</p>
                <a href="/#contact_form" class="btn btn-info btn-sm">Qick Contact</a>
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
                  <input type="text" name="keywords" placeholder="Search" class="form-control" value="{{ Session::has('keywords') ? session('keywords') : '' }}">
                  <button type="submit"> <i class="fa fa-search"></i></button>
                </div>
              </form>
            </div>

            <div class="sidebar-widget mb-4">
              <h3 class="sidebar-widget-heading"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Material Group</h3>
              <ul class="list-unstyled pl-0 mt-4">
              @if(count($categories))
                  <div id="categories_menu">
                @foreach($categories as $level_1)



                  <li> <a href="/products/search/level1/{{ $level_1->id }}" class="categories-link"><h5><i class="fa fa-bookmark" aria-hidden="true"></i> {{ $level_1->key }} </h5></a></li>
                  @if(count($level_1->subs))
                    @foreach($level_1->subs as $level_2)

                  <li>  &nbsp <a href="#collapse_{{ $level_2->id }}" data-toggle="collapse" class="categories-link"><i class="fa fa-angle-right" aria-hidden="true"></i> <strong>{{ $level_2->key }} </strong></a></li>


               <div id="collapse_{{$level_2->id}}" class="collapse" data-parent="#categories_menu">
                      @if(count($level_2->subs))
                         @foreach($level_2->subs as $level_3)
                  <li>  &nbsp&nbsp - <a href="/products/search/category/{{ $level_3->id }}" class="categories-link">{{ $level_3->key }}
                    
                   ({{ $level_3->products_count }})
                  
                 </a></li>
                         @endforeach
                      @else
                      <li><span class="categories-link">&nbsp&nbsp&nbsp&nbsp -- null --</span></li>
                      @endif
              </div>


                    @endforeach
                  @endif
                  <br>
                @endforeach
                  </div>
              @else
                  none
              @endif

              </ul>
            </div>

            <div class="sidebar-widget mb-4">
              <h4 class="sidebar-widget-heading"><i class="fa fa-tags" aria-hidden="true"></i> Sort By Manufacturer</h4>
              <ul class="list-inline pl-0 mt-4">
              @if(count($brands))
                @foreach($brands as $b)
                  <li class="list-inline-item mr-0"><a href="/products/search/brand/{{ $b->id }}" class="tag-link">{{ $b->key }} 
                    
                    <small>({{ $b->brand_products_count }})</small>
                    
                  </a></li>
                @endforeach
              @else
                none
              @endif

              </ul>
            </div>
            @if(count($rc->show()))
            <div class="sidebar-widget mb-4">
              <h4 class="sidebar-widget-heading"><i class="fa fa-history" aria-hidden="true"></i> Recnt Focused</h4>
              <ul class="list-inline pl-0 mt-4">
                @foreach($rc->show() as $key => $val)
                  <li><a href="/products/show/{{ $key }}" class="text-dark">{{ Str::limit($val, 28) }}</a></li>
                @endforeach
              </ul>
            </div>
            @endif

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
          you can NOT cancel this operation!! 
        </div>
   
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">close</button>
          <a href="#" class="btn btn-danger btn-sm" id="go">delete!!</a>
        </div>
   
      </div>
    </div>
  </div>

      <!-- 模态框 -->
  <div class="modal fade" id="email_send">
        <form action="/products/send"  method="post">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h3>Email to A Friend</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
   
        <div class="modal-body">
          @csrf
            <input type="hidden" name="id" id="product_id">
            <div class="form-group"  >
              <label for="email" class="control-label">Recipient Email Address (max 3 recipients)</label>
              <textarea placeholder="friend1@some.com&#10friend2@some.com" class="form-control" name="emails"></textarea>
            </div>
        </div>
   
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">close</button>
          <button class="btn btn-sm btn-outline-primary" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> send email</button>
        </div>
   
      </div>
    </div>
          </form>
  </div>

    <script>
      function del(id) {
        $("#delete_confirm").modal();
        
        var url = '/products/delete/' + id;
        $("#go").attr('href', url);
      }

      function send(id) {
        $("#email_send").modal();
        $("#product_id").val(id);
      }

    </script>
@endsection












