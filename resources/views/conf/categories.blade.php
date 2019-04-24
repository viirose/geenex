@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
        <h3><i class="fa fa-bookmark-o" aria-hidden="true"></i> Categories</h3>
      @if(isset($records) && count($records))
        @foreach($records as $record)
        <br>
        <p><i class="fa fa-bookmark" aria-hidden="true"></i> {{ strtoupper($record->key) }} <a href="javascript:create({{ $record->id }});" class="btn btn-outline-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> new</a></p>
        <div id="accordion">
            @foreach($record->subs as $sub) 

            <div class="card">
              <div class="card-header">
                <a class="card-link" data-toggle="collapse" href="#collapse{{$sub->id}}">
                  {{ strtoupper($sub->key) }}
                </a>
              </div>
              <div id="collapse{{$sub->id}}" class="collapse" data-parent="#accordion">
                <div class="card-body">
                    @foreach($sub->subs as $s)
                        <a class="badge badge-primary" href="javascript:edit({{ $s->id }})">{{ strtoupper($s->key) }}</a> 
                    @endforeach
                    <a class="badge badge-success" href="javascript:create({{ $sub->id }})"> + new</a> 
                </div>
              </div>
            </div>

            @endforeach

          </div>
        @endforeach

        @else
            <div class="alert alert-info">尚无配置</div>
        @endif

    </div>
</section>

   
  <!-- create -->
  <div class="modal fade" id="new_type">
    <div class="modal-dialog">
      <div class="modal-content">
   
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
   
        <div class="modal-body">
          <input type="text" id="conf_key" placeholder="input Category name" onchange="javascript:set_url()">
          <input type="hidden" id="parent_id">
          <input type="hidden" id="edit_id">
        </div>
   
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary btn-sm" data-dismiss="modal">close</button>
          <a id="go" href="#" class="btn btn-primary btn-sm">Confirm</a>
        </div>
   
      </div>
    </div>
  </div>

<script>
    function reset() {
      $("#conf_key").val('');
      $("#edit_id").val('');
    }

  //url
  function set_url() {
    var conf_key = $("#conf_key").val();
    var parent_id = $("#parent_id").val();
    var edit_id = $("#edit_id").val();
    
    conf_key = encodeURI(conf_key);
    var url = '/conf/create/' + conf_key;


    if(parent_id >= 1) {
      url += '/' + parent_id;
    } else if(edit_id >= 1){
      url = '/conf/edit/'+ conf_key +'/'+ edit_id;
    }

    // url = encodeURI(url);
    if($.trim(conf_key) != '') $("#go").attr('href', url);
  }

  function create(parent_id) {
      reset();

      $("#new_type").modal();
      $("#parent_id").val(parent_id);
  }

  function edit(id) {
    reset();
    
      $("#new_type").modal();
      $("#edit_id").val(id);
  }

</script>

@endsection















