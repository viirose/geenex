@extends('nav')

@section('content')

<section>
    
    <div class="container">
        <div class="col-sm-5 cent">
            <div class="card card-light form-card">
            <h4>register</h4>
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
                <input type="submit" value="Send message" class="btn btn-outline-primary btn-sm">
              </div>
            </form> 
            </div>
        </div>
    </div>
</section>

@endsection