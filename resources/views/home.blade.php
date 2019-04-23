@extends('nav')

@section('content')
    <!-- Hero Section-->
    <section class="hero">
      <div class="container mb-5">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <h3 class="hero-heading mb-0">Your right source of spare parts</h3>
            <h3 class="hero-heading mb-0">Find It Now</h3>
            <div class="row">
              <div class="col-lg-10">
                <p class="lead text-muted mt-4 mb-4">Type in the manufacturer’s part number or the part’s description to get the list of parts available.</p>
              </div>
            </div>
            <form action="#" class="subscription-form">
              <div class="form-group">
                <input type="email" name="email" placeholder="keywords..." class="form-control">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
          </div>
          <div class="col-lg-6"><img src="img/main.jpg" alt="..." class="hero-image img-fluid d-none d-lg-block"></div>
        </div>
      </div>
    </section>
  
    <!-- Contact Section-->
    <section>
      <div class="container">
        <header class="section-header">
          <h2 class="mb-2">For online requests please use our form below</h2>
          <p class="lead">If you send the data entered in the contact form by clicking on the following button, you agree that we use your details to answer your inquiry or contact us. Disclosure to third parties will generally not take place unless applicable data protection regulations justify a transfer or we are legally obliged to do so. You may revoke your consent at any time with future effect. In case of cancellation your data will be deleted immediately. Your data will otherwise be deleted if we have processed your request or the purpose of the storage is omitted. You can always inform yourself about the data stored about your person. Further information on data protection can be found in the Privacy Policy of this website.
Fields with * are required.
</p>
        </header>
        <div class="row align-items-center mt-5">
          <div class="col-lg-7">
            
            {!! form($form) !!}

          </div>
          <div class="col-lg-5 contact-details mt-5 mt-lg-0">
            <div class="box">
              <div class="icon d-flex align-items-end"><img src="img/placeholder.svg" alt="" class="img-fluid"></div>
              <h5>Address</h5>
              <p class="text-small font-weight-light">JOC-GENNEX Engineering Technology Co., Ltd.
49 South Zhongba Road,
Haian, Jiangsu Province,
China 226600
</p>
            </div>
            <div class="box">
              <div class="icon d-flex align-items-end"><img src="img/technology.svg" alt="" class="img-fluid"></div>
              <h5>Phone</h5>
              <p class="text-small font-weight-light">FAX: +86 513 8180 0823</p><strong class="text-muted">TEL: +86 513 8889 2688</strong>
            </div>
            <div class="box">
              <div class="icon d-flex align-items-end"><img src="img/multimedia.svg" alt="" class="img-fluid"></div>
              <h5>Email support</h5>
              <p class="text-small font-weight-light"><strong>info@joclift.con email </strong> </p>

            </div>
          </div>
        </div>
      </div>
    </section>

@endsection