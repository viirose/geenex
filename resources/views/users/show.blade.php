<?php
  $r = new App\Helpers\Role;
  $f = new App\Helpers\Filter;
?>
@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
      <h4>
        @if($r->admin())
        <a href="/users"><i class="fa fa-users" aria-hidden="true"></i> Users</a> /
        @endif
        <span> {{ $record->name }}</span>
      </h4>
      
        <div class="cent">
          <div class="row text-left">
            <div class="card card-light form-card col-12">
              <ul class="list-unstyled">
                <li><strong>Email:</strong>  {{ $record->email }}</li>
                <li><strong>Name: </strong> {{ $record->name }}</li>
                <li><strong>Created At:</strong>  {{ $record->created_at }}</li>
                <li><strong>Infomation:</strong> <a href="/users/contact/edit/{{ $record->id }}" class="badge badge-success">Update</a>
                  <ul class="list-unstyled">
                    @if(isset($contacts) && count($contacts))
                      @foreach($contacts as $key=>$value)
                        <li>&nbsp&nbsp <strong>{{ $f->getContact($key) }} : </strong>{{$value}}</li>
                      @endforeach
                    @endif
                  </ul>
                </li>
              </ul>
              <div class="row">

              @if($r->gt($record->id))
              <a href="/users/delete/{{$record->id}}" class="btn btn-danger btn-sm"> Delete This User !</a>
              @endif

              @if($r->self($record->id))
              <a href="/users/edit/{{$record->id}}" class="btn btn-primary btn-sm"> eidt</a>
              @endif

              </div>

            </div>
          </div>
        </div>
    </div>
</section>

@endsection