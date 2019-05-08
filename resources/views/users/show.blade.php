<?php
  $f = new App\Helpers\Filter;
  $r = new App\Helpers\Role;
  $array = json_decode($record->info, true);
  $contacts = json_decode($array['contact'], true);

?>

@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
      <h4><i class="fa fa-users" aria-hidden="true"></i> Users</h4>
      <p><a href="/users" class="btn btn-outline-primary">users</a></p>
        <div class="cent">
          <div class="row text-left">
            <div class="card card-light form-card col-12">
              <ul class="list-unstyled">
                <li><strong>Email:</strong>  {{ $record->email }}</li>
                <li><strong>Name: </strong> {{ $record->name }}</li>
                <li><strong>Created At:</strong>  {{ $record->created_at }}</li>
                <li><strong>Infomation:</strong>
                  <ul class="list-unstyled">
                    @if(isset($contacts) && count($contacts))
                      @foreach($contacts as $key=>$value)
                        <li>&nbsp&nbsp {{$key}} : {{$value}}</li>
                      @endforeach
                    @endif
                  </ul>
                </li>
              </ul>
              <div class="row">
                
              <a href="/users/delete/{{$record->id}}" class="btn btn-danger"> Delete This User !</a>
              </div>

            </div>
          </div>
        </div>
    </div>
</section>

@endsection