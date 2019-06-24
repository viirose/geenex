<?php
  $r = new App\Helpers\Role;
?>
@extends('nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
    @if(isset($records) && count($records))
      @foreach($records as $record)
        <div class="col-sm-12 cent">
          <div class="row text-left">
            <div class="card card-light form-card col-12">
              <div class="row">
            <div class="col-sm-4">
              <img src="{{  asset($record->img) }}" class="img-fluid">
            </div>
            <div class="col-sm-8">
              <h3 class="text-primary">
                <i class="fa fa-trophy" aria-hidden="true"></i> {{ $record->title }}
                @if($r->admin())
                  <a href="/projects/delete/{{ $record->id }}" class="btn btn-sm btn-danger"> 删除!</a>
                @endif
              </h3>
              
              <pre class="pr">{!! $record->content !!}</pre>
            </div>
          </div>
            </div>
          </div>
        </div>
        <div class="row top-pad"></div>
      @endforeach
    @else
      <div class="alert alert-info">尚无案例发布,敬请期待!</div>
    @endif

    </div>
</section>

@endsection