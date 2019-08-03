@extends('nav')

@section('content')
<section>
  <div class="cent"><img src="{{ asset('img/lee.jpg') }}"  alt="..." class="huge-img img-fluid"></div>
</section>

<section class="top-sec">
      <div class="container">
        <div>
          <div><h4><a href="/">首页</a>/文章中心</h4></div>
          @if(count($records))
          <div class="list-group">
            @foreach($records as $record)
            <a href="/articles/show/{{ $record->id }}" class="list-group-item list-group-item-action">
              <img src="img/{{$record->type}}1.jpg" class="article">
              {{ str_limit($record->title, 30) }}
              <small class="text-secondary">{{ $record->created_at }}</small>
            </a>
            <a href="/delete/{{ $record->id }}" >删除！</a>

            @endforeach
          </div>
          @else
            <div class="alert alert-info">
              暂无新文章
            </div>
          @endif
      </div>
      <div><p></p>{!! $records->render() !!}</div>
        
      </div>
</section>
@endsection