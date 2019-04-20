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
                <input type="email" name="email" placeholder="keywords here..." class="form-control">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </form>
          </div>
          <div class="col-lg-6"><img src="img/main.jpg" alt="..." class="hero-image img-fluid d-none d-lg-block"></div>
        </div>
      </div>
    </section>
  
    <!-- Integrations Section-->
    <section>
      <div class="container">
        <div class="text-center">
          <h2>Integrations</h2>
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <p class="lead text-muted mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod. eiusmod tempor incididunt ut labore.</p>
            </div>
          </div>
        </div>
        <div class="integrations mt-5">
          <div class="row">
            <div class="col-lg-3">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><img src="img/monitor.svg" alt="..." class="img-fluid"></div>
                <h3 class="h4">Web desgin</h3>
                <p class="text-small font-weight-light">Lorem Ipsum has been the industry's standard dummy text ever.</p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><img src="img/target.svg" alt="..." class="img-fluid"></div>
                <h3 class="h4">Print</h3>
                <p class="text-small font-weight-light">Lorem Ipsum has been the industry's standard dummy text ever.</p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><img src="img/chat.svg" alt="..." class="img-fluid"></div>
                <h3 class="h4">SEO and SEM</h3>
                <p class="text-small font-weight-light">Lorem Ipsum has been the industry's standard dummy text ever.</p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><img src="img/idea.svg" alt="..." class="img-fluid"></div>
                <h3 class="h4">Consulting</h3>
                <p class="text-small font-weight-light">Lorem Ipsum has been the industry's standard dummy text ever.</p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><img src="img/coffee-cup.svg" alt="..." class="img-fluid"></div>
                <h3 class="h4">Email Marketing</h3>
                <p class="text-small font-weight-light">Lorem Ipsum has been the industry's standard dummy text ever.</p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><img src="img/pen.svg" alt="..." class="img-fluid"></div>
                <h3 class="h4">UX &amp; UI</h3>
                <p class="text-small font-weight-light">Lorem Ipsum has been the industry's standard dummy text ever.</p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><img src="img/pen.svg" alt="..." class="img-fluid"></div>
                <h3 class="h4">UX &amp; UI</h3>
                <p class="text-small font-weight-light">Lorem Ipsum has been the industry's standard dummy text ever.</p>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="box text-center">
                <div class="icon d-flex align-items-end"><img src="img/pen.svg" alt="..." class="img-fluid"></div>
                <h3 class="h4">UX &amp; UI</h3>
                <p class="text-small font-weight-light">Lorem Ipsum has been the industry's standard dummy text ever.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Section-->
    <section>
      <div class="container">
        <header class="section-header">
          <h2 class="mb-2">Fill out the form</h2>
          <p class="lead">Please submit your information and we will follow up with you as soon as possible.</p>
        </header>
        <div class="row align-items-center mt-5">
          <div class="col-lg-7">
            <form action="#" class="contact-form text-left">
              <div class="form-group mb-4">
                <label>Name<sup class="text-primary">&#10033;</sup></label>
                <input type="text" name="name" placeholder="e.g. John Smith" class="form-control">
              </div>
              <div class="form-group mb-4">
                <label>Company Email<sup class="text-primary">&#10033;</sup></label>
                <input type="text" name="email" placeholder="name@company.com" class="form-control">
              </div>
              <div class="form-group mb-4">
                <label>Subject<sup class="text-primary">&#10033;</sup></label>
                <input type="text" name="subject" placeholder="Briefly describe your question" class="form-control">
              </div>
              <div class="form-group mb-4">
                <label>Now let's hear the details<sup class="text-primary">&#10033;</sup></label>
                <textarea name="message" placeholder="Let us know what you need" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send message" class="btn btn-primary">
              </div>
            </form>
          </div>
          <div class="col-lg-5 contact-details mt-5 mt-lg-0">
            <div class="box">
              <div class="icon d-flex align-items-end"><img src="img/placeholder.svg" alt="" class="img-fluid"></div>
              <h5>Address</h5>
              <p class="text-small font-weight-light">13/25 New Avenue, New Heaven, 45Y 73J, England, Great Britain</p>
            </div>
            <div class="box">
              <div class="icon d-flex align-items-end"><img src="img/technology.svg" alt="" class="img-fluid"></div>
              <h5>Call center</h5>
              <p class="text-small font-weight-light">This number is toll free if calling from Great Britain otherwise we advise you to use the electronic form of communicatio</p><strong class="text-muted">+33 555 444 333</strong>
            </div>
            <div class="box">
              <div class="icon d-flex align-items-end"><img src="img/multimedia.svg" alt="" class="img-fluid"></div>
              <h5>Electronic support</h5>
              <p class="text-small font-weight-light">Please feel free to write an email to us or to use our electronic ticketing system.</p>
              <ul class="text-left">
                <li><a href="mailto:info@fakeemail.com" class="text-small">info@fakeemail.com</a></li>
                <li><a href="#" class="text-small">Ticketio - our ticketing support platform </a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection