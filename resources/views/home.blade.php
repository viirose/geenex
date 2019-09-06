@extends('nav')

@section('content')
    <!-- Hero Section-->
    <section class="hero">
      <div class="container mb-5">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h3 class="hero-heading mb-0">A Frofessional Rotational Molding Factory</h3>
            <h3 class="hero-heading mb-0">Find Now</h3>
            <div class="row">
              <div class="col-lg-10">
                <p class="lead text-muted mt-4 mb-4">Input the keyword to get the list of products available. And you are welcome to  contact us for additional services.</p>
              </div>
            </div>
            <form action="/products/search" method="post" class="subscription-form">
              <div class="form-group">
                @csrf
                <input type="text" name="keywords" placeholder="Search" class="form-control" value="{{ Session::has('keywords') ? session('keywords') : '' }}">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
          </div>
          <div class="col-lg-6"><img src="img/main.png" alt="..." class="hero-image img-fluid d-none d-lg-block"></div>
        </div>
      </div>
    </section>
  
    <!-- Contact Section-->
    <section  id="contact_form">
      <div class="container">
        <header class="section-header">
          <h2 class="mb-2">Quick Contact

          </h2>
        </header>
        <div class="row align-items-center mt-5">
          <div class="col-lg-7">
            
            {!! form($form) !!}

          </div>
          <div class="col-lg-5 contact-details mt-5 mt-lg-0">
            <div class="box">
              <div class="icon d-flex align-items-end"><img src="img/placeholder.svg" alt="" class="img-fluid"></div>
              <h5>Address</h5>
              <p class="text-small font-weight-light">Qixiong Industrial Park, Shuyang, Jiangsu Province, China (223600)</p>
            </div>
            <div class="box">
              <div class="icon d-flex align-items-end"><img src="img/technology.svg" alt="" class="img-fluid"></div>
              <h5>Phone</h5>
              <p class="text-small font-weight-light">FAX: +86 527 8777 4118 </p><strong class="text-muted">TEL: +86 527 8352 1018</strong>
            </div>
            <div class="box">
              <div class="icon d-flex align-items-end"><img src="img/multimedia.svg" alt="" class="img-fluid"></div>
              <h5>Email support</h5>
              <p class="text-small font-weight-light"><strong> sales@henjou.com </strong> </p>

            </div>
          </div>
        </div>
      </div>
    </section>

@endsection