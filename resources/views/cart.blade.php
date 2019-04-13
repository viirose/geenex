@extends('nav')

@section('content')

<section>
    
    <div class="container">
        <div class="col-sm-7 cent">
            <div class="card card-light form-card">
            <h4><i class="fa fa-cart-plus" aria-hidden="true"></i> Cart</h4>
            <blockquote class="blockquote text-left ">
              <ol class="cart-item">
                <li>part no / some</li>
                <li>part no / some</li>
                <li>part no / some</li>
                <li>part no / some</li>
              </ol>
            </blockquote>
            <form action="#" class="contact-form text-left">
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