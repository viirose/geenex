<?php
  $f = new App\Helpers\Filter;
?>
@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
        <h3><i class="fa fa-bookmark-o" aria-hidden="true"></i> 分类</h3>
        <p><a href="javascript:create(1)" class="btn btn-outline-primary btn-sm">+ 增加 </a></p>
        <div class="card">
          <div class="card-body">
              @if(isset($records) && count($records))
                <ul class="list-unstyled">
                @foreach($records as $level_1)
                  <li>
                    <a href="javascript:edit({{$level_1->id}})">
                      <strong><i class="fa fa-bookmark" aria-hidden="true"></i> {{ $level_1->key }} </strong>
                    </a> 
                    <span>(编码: {{ $f->show($level_1->info, 'code') }})</span>
                    <a href="javascript:create({{$level_1->id}})" class="badge badge-warning"> + 增加</a>
                    @if(count($level_1->subs))
                    <ul class="list-unstyled">
                      @foreach($level_1->subs as $level_2)
                        <li>&nbsp <i class="fa fa-angle-right" aria-hidden="true"></i> <a href="javascript:edit({{$level_2->id}})"><strong>{{ $level_2->key }}</strong></a> 
                          <span>(编码: {{ $f->show($level_2->info, 'code') }})</span>
                          <a href="javascript:create({{$level_2->id}})" class="badge badge-success"> + 增加</a>
                          @if($level_2->subs->count())
                            <ul class="list-unstyled">
                              @foreach($level_2->subs as $level_3)
                                <li>&nbsp &nbsp - <a href="javascript:edit({{$level_3->id}})">{{ $level_3->key }}</a>
                                  <span>(编码: {{ $f->show($level_3->info, 'code') }})</span>
                                </li>
                              @endforeach
                              
                            </ul>
                          @endif
                        </li>
                      @endforeach
                    </ul>
                    @endif
                  <li>
                @endforeach
                </ul>
              @else
                <div class="alert alert-info">(空)</div>
              @endif
          </div>
        </div>
    </div>
</section>

   
  <!-- create -->
  <div class="modal fade" id="new_type">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <strong>分类</strong>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
   <form method="post" action="/conf/categories/do">
        <div class="modal-body">

          @csrf
          <input type="hidden" name="id" id="edit_id">
          <input type="hidden" name="parent_id" id="parent_id">
          <div class="form-group"  >
            <label for="name" class="control-label">名称</label>
            <input class="form-control" minlength="2" maxlength="32" name="name" type="text" id="name">
          </div>
          <div class="form-group"  >
            <label for="code" class="control-label">编码</label>
            <input class="form-control" minlength="1" maxlength="1" name="code" type="text" id="code">
          </div>

        </div>
   
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary btn-sm" data-dismiss="modal">关闭</button>
          <button type="submit" class="btn btn-primary btn-sm">确定</button>
        </div>
   </form>

      </div>
    </div>
  </div>

<script>
  function clear() {
    $("#edit_id").val('');
    $("#parent_id").val('');
    $("#name").val('');
    $("#code").val('');
  }

  function create(parent_id) {
      clear();
      $("#parent_id").val(parent_id);
      $("#new_type").modal();
  }

  function edit(id) {
      clear();
      $("#edit_id").val(id);
      $("#new_type").modal();
  }

</script>

@endsection















