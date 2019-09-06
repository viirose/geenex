@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
        <div class="col-sm-7 cent">
            <div class="card card-light form-card">
            <h4><i class="fa fa-list-ul" aria-hidden="true"></i> My Inquiry [{{ $records->count() }}]</h4>
            <p><a href="/inquiries/show" class="btn btn-outline-primary btn-sm">History</a></p>
            <blockquote class="blockquote text-left ">
              <ol class="cart-item">
            @if($records->count())
                @foreach($records as $record)
                <li><a href="/inquiries/delete/{{ $record->id }}" class="badge badge-primary"> {{ $record->part_no }} / {{ $record->name }}</a></li>
                @endforeach
            @else
                <div class="alert alert-info cent">
                    <p>No items</p>
                    <a href="/products" class="btn btn-info btn-sm">Products</a>
                </div>
            @endif

              </ol>
            </blockquote>
            <form action="/inquiries/send" method="post" class="contact-form text-left">
              <div class="form-group mb-4">
                <label>Message</label>
                <textarea name="message" placeholder="Let us know what you need" class="form-control"></textarea>
              </div>
              <div class="form-group">
                @csrf
                <input type="submit" value="Send message" class="btn btn-outline-primary btn-sm">
                <a href="/inquiries/clear" class="btn btn-outline-danger btn-sm"> clear my Inquiry</a>
              </div>
            </form> 
            </div>
        </div>
    </div>
</section>

@endsection