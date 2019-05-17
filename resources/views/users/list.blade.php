<?php
  $f = new App\Helpers\Filter;
  $r = new App\Helpers\Role;
?>

@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
      <h4><i class="fa fa-users" aria-hidden="true"></i> Users</h4>
      <p><a href="/users/create" class="btn btn-outline-primary">+ New</a></p>
        <div class="cent">
          <div class="row text-left">
            <div class="card card-light form-card col-12">


            <div class="search mb-4">
              <form action="/users/search" method="post" class="subscription-form">
                <div class="form-group">
                  @csrf
                  <input type="text" name="keywords" placeholder="Search" class="form-control" value="{{ Session::has('keywords_user') ? session('keywords_user') : '' }}">
                  <button type="submit" class="btn btn-primary">Search</button>
                </div>
              </form>
            </div>

            @if(isset($records) && count($records))        
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                @foreach($records as $record)
                <tr class="{{ $r->locked($record->id) ? 'alert-warning' : '' }}">
                  <td>

                    <a href="/users/show/{{$record->id}}">{!! Str::replaceArray(' ', ['&nbsp'], $f->fit($record->name, 'keywords_user')) !!} </a>
                    
                    @if($r->self($record->id))
                      <span class="badge badge-success">me</span>
                    @endif


                  </td>
                  <td>{!! $f->fit($record->email, 'keywords_user') !!}</td>
                  <td>
                    @if($r->locked($record->id))
                      @if($r->gt($record->id))
                        <a href="/users/unlock/{{ $record->id }}" class="badge badge-warning">Locked: <i class="fa fa-lock" aria-hidden="true"></i> </a>
                      @else
                        <span class="badge badge-danger">Locked</span>
                      @endif
                    @else
                      @if($r->gt($record->id))
                        <a href="/users/lock/{{ $record->id }}" class="badge badge-success">Normal: <i class="fa fa-unlock" aria-hidden="true"></i></a>
                      @else
                        <span class="badge badge-success">Normal</span>
                      @endif
                    @endif
                  </td>
                  <td>

                  @if($r->admin())
                    @if(!$r->admin($record->id))

                      @foreach($r->limit($record->id) as $key => $value)
                        <a href="/users/unlimit/{{ $record->id }}/{{ $key }}" class="badge badge-dark"><i class="fa fa-plug" aria-hidden="true"></i> {{ $value }}</a>
                      @endforeach

                      @foreach($r->unlimit($record->id) as $key => $value)
                        <a href="/users/limit/{{ $record->id }}/{{ $key }}" class="badge badge-light">{{ $value }}</a>
                      @endforeach

                    @endif
                  @endif

                    @if($r->admin($record->id))
                      <span class="badge badge-primary">Admin</span>
                    @endif

                    @if(!$r->emailVerified($record->id))
                      <span class="badge badge-danger">Email Not Verified</span>
                    @endif

                    @if(!$r->contactVerified($record->id))
                      <span class="badge badge-warning">No Contact Info</span>
                    @endif
                  </td>
                  <td></td>
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