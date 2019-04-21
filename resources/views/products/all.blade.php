@extends('../nav')

@section('content')
<div class="row top-pad"></div>

   <!-- FAQ Section-->
    <section>
      <div class="container">
        <!-- wordPress installation-->
        <header class="section header mb-5">
          <h2><i class="fa fa-cube" aria-hidden="true"></i> Products</h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
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
                      <img src="{{ $product->img ? asset('storage/app/img/'.$product->id.'.jpg') : asset('img/sample.jpg') }}" class="rounded list-icon">
                      <span class="list-head"><strong>{{ $product->part_no }}</strong><br>{{ $product->name }}</span>
                      
                    </button>
                  </h4>
                </div>
                <div id="collapse{{$product->id}}" aria-labelledby="headingOne" data-parent="#accordion" class="collapse">
                  <div class="card-body">
                      <div class="cent">
                        <img src="{{ $product->img ? asset('storage/app/img/'.$product->id.'.jpg') : asset('img/sample.jpg') }}" class="rounded img-fluid">
                      </div>
                      <ul class="list-unstyled pl-0 mt-4">
                        <li>Part Nr: {{ $product->part_no}}</li>
                        <li>Part Name.: {{ $product->name }}</li>
                        <li>Part for: {{ $product->brand->key }}</li>
                        <li>Availability: {{ $product->availability->key }}</li>
                        <li>Remark: {{ $product->remark }}</li>
                        <li>{{ $product->content }}</li>
                        <li><a href="#" class="btn btn-outline-light btn-sm">add to My Inquiry</a></li>
                      </ul>
                  </div>
                </div>
              </div>
              @endforeach
            @else
              <div class="alert alert-info">none</div>
            @endif

            </div>
          </div>
          <!-- sidebar-->
          <aside class="sidebar col-lg-4 mt-5 mt-lg-0">
            <div class="search mb-4">
              <form action="#" class="search-form">
                <div class="form-group">
                  <input type="search" name="search" placeholder="Search" class="form-control">
                  <button type="submit"> <i class="fa fa-search"></i></button>
                </div>
              </form>
            </div>
            <div class="sidebar-widget mb-4">
              <h4 class="sidebar-widget-heading"><i class="fa fa-bookmark-o" aria-hidden="true"></i> Categories</h4>
              <ul class="list-unstyled pl-0 mt-4">
              @if(count($categories))
                @foreach($categories as $c)
                  <li> <a href="#" class="categories-link"><strong>{{ strtoupper($c->key) }} </strong></a></li>
                  @if(count($c->subs))
                    @foreach($c->subs as $sub)
                  <li>  &nbsp - <a href="#" class="categories-link">{{ strtoupper($sub->key) }} ({{ $sub->products_count }})</a></li>
                    @endforeach
                  @endif
                @endforeach
              @else
                  none
              @endif

              </ul>
            </div>
            <div class="sidebar-widget">
              <h4 class="sidebar-widget-heading"><i class="fa fa-tags" aria-hidden="true"></i> Brands</h4>
              <ul class="list-inline pl-0 mt-4">
              @if(count($brands))
                @foreach($brands as $b)
                  <li class="list-inline-item mr-0"><a href="#" class="tag-link">{{ $b->key }} <small>({{ $b->brand_products_count }})</small></a></li>
                @endforeach
              @else
                none
              @endif

              </ul>
            </div>
          </aside>
        </div>
      </div>
    </section>
@endsection