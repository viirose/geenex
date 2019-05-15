<?php
  $f = new App\Helpers\Filter;
  $r = new App\Helpers\Role;
?>

@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
      <h4><i class="fa fa-list-ul" aria-hidden="true"></i> Inquiries</h4>

        <div class="cent">
          <div class="row text-left">
            <div class="card card-light form-card col-12">
              <p><i class="fa fa-user-o" aria-hidden="true"></i> {{ Auth::user()->name }}</p> 
            @if(isset($records) && count($records))        
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Products</th>
                  <th>Message</th>
                </tr>
              </thead>
              <tbody>


                @foreach($records as $record)
                    <tr>
                      <td> {{ $record->created_at }}</td>
                      <td> {!! $f->getProducts($record->product_ids) !!}</td>
                      <td> {{ $record->message }}</td>
                    </tr>
                @endforeach

            </table>
            <div>{{ $records->links() }}</div>
            @else
              <div class="alert alert-info"> No users</div>
            @endif

            </div>
          </div>
        </div>
    </div>
</section>

@endsection