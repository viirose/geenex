<?php
  $f = new App\Helpers\Filter;
?>
@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
        <h3><i class="fa fa-tags" aria-hidden="true"></i> 品牌</h3>
        <p><a href="javascript:create();" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> 增加</a></p>
        <div class="alert alert-info">
          @if(isset($records) && count($records))
            @foreach($records as $record)
              <h3>
                <a href="javascript:edit({{$record->id}})" class="badge badge-info">
                  {{ $record->key }}
                  <small>编码: {{ $f->show($record->info, 'code') }}</small>
                </a>
              </h3>
            @endforeach
          @else
              null
          @endif
        </div>
    </div>
</section>

   
  <!-- create -->
  <div class="modal fade" id="new_type">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <strong>品牌</strong>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
   <form method="post" action="/conf/brands/do">
        <div class="modal-body">

          @csrf
          <input type="hidden" name="id" id="edit_id">
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
    $("#name").val('');
    $("#code").val('');
  }

  function create() {
      clear();
      $("#new_type").modal();
  }

  function edit(id) {
      clear();
      $("#edit_id").val(id);
      $("#new_type").modal();
  }

</script>

@endsection















