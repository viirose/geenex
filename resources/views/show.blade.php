@extends('nav')

@section('content')

<section>
  <div class="cent"><img src="{{ asset('img/lee.jpg') }}"  alt="..." class="huge-img img-fluid"></div>
</section>

<section class="top-sec">
      <div class="container text-left">
        <div><h4><a href="/">首页</a>/<a href="/articles">文章中心</a></h4></div>
        <p></p>
        <p></p>
        <div>
          @if(isset($record))
          <strong>
            <span class="text-primary"><i class="fa fa-line-chart" aria-hidden="true"></i> </span>
            {{ $record->title }}
            <p></p>
          </strong>
          <div class="list-group">
            <pre>{{ $record->content }}</pre>
          </div>

          @endif
      </div>
        
      </div>
</section>
@endsection