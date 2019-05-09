<?php
  $categories = App\Conf::where('level', 1)
                        ->where('type', 'category')
                        ->get();
?>
@extends('nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
        <div class="col-sm-6 cent">
          <div class="row text-left">
            <div class="card card-light form-card col-12">
            <h4><i class="fa fa-{{ $icon }}" aria-hidden="true"></i> {{ $title }}</h4>

              <br>
              <div class="dropdown">
                  <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    select a category
                  </button>
                  <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">

                    @foreach($categories as $level_1)
                          @if($level_1->subs->count())
                            <li class="dropdown-submenu">
                              <a  class="dropdown-item" tabindex="-1" href="#">{{ $level_1->key }}</a>
                              <ul class="dropdown-menu">
                                @foreach($level_1->subs as $level_2)
                                    @if($level_2->subs->count())
                                    <li class="dropdown-submenu">
                                      <a  class="dropdown-item" tabindex="-1" href="#">{{ $level_2->key }}</a>
                                      <ul class="dropdown-menu">
                                        @foreach($level_2->subs as $level_3)
                                          <li class="dropdown-item"><a class="text-dark" href="javascript:set({{$level_3->id}})">{{ $level_3->key }}</a></li>
                                        @endforeach
                                      </ul>
                                    @else
                                      <li class="dropdown-item"><a href="#">{{ $level_2->key }}</a></li>
                                    @endif
                                  </li>
                                @endforeach
                              </ul>
                            </li>

                          @else
                            <li class="dropdown-item"><a href="#">{{ $level_1->key }}</a></li>
                          @endif
                    @endforeach

                    </ul>
              </div>
              <br>
          

              {!! form($form) !!}
            </div>
          </div>
        </div>
    </div>

<script>
  function set(id) {
    $.ajax({
      url: "/conf/category_info/"+id,
      type: "get",
      success: function (msg) {
        $("#category_text").val(msg); 
        $("#category_id").val(id); 
      },
       error: function () {
        $("#category_text").val('server error');
      }
   });
  }
</script>

</section>

@endsection































