<?php
$f = new App\Helpers\Filter;
?>
@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
      <h4><a href="/products"><i class="fa fa-cube" aria-hidden="true"></i> Products </a> / {{ $record->part_no }}</h4>
  
        <div class="cent">
          <div class="row text-left">
            <div class="card card-light form-card col-12">
              <div class="cent">
                <img class="img-fluid" src="{{ $record->img ? asset($record->img) : asset('img/sample.jpg')  }}">
              </div>
              <p></p>
              <table>
                <tbody>
                  <tr>
                    <td>GENNEX Ref.</td>
                    <td>G{{ $f->show($record->brand->info, 'code', '-') }}{{ $f->show($record->category->master->master->info, 'code', '-') }}{{ $f->show($record->category->master->info, 'code', '-') }}{{ $f->show($record->category->info, 'code', '-') }}{{ $record->id }}</td>
                  </tr>
                  <tr>
                    <td>Part Name</td>
                    <td>{!! $f->fit($record->name) !!}</td>
                  </tr>
                  <tr>
                    <td>Part Nr.</td>
                    <td>{!! $f->fit($record->part_no) !!}</td>
                  </tr>
                  <tr>
                    <td>Part for</td>
                    <td>{{ $record->brand->key }}</td>
                  </tr>
                  <tr>
                    <td>Material Group</td>
                    <td>
                      {{ $record->category->master->master->key }} -
                      {{ $record->category->master->key }} -
                      {{ $record->category->key }} 
                    </td>
                  </tr>
                  <tr>
                    <td>Availability</td>
                    <td>{{ $record->availability->key }}</td>
                  </tr>
                  <tr>
                    <td>Weight</td>
                    <td>{{ $record->weight }}</td>
                  </tr>
                  <tr>
                    <td>Remark</td>
                    <td>{!! $f->fit($record->remark) !!}</td>
                  </tr>
                </tbody>
              </table>

                <p></p>


            </div>
          </div>
        </div>
    </div>


      <!-- 模态框 -->
  <div class="modal fade" id="email_send">
        <form action="/products/send"  method="post">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        <h3>Email to a Friend</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
   
        <div class="modal-body">
          @csrf
            <input type="hidden" name="id" id="product_id">
            <div class="form-group"  >
              <label for="email" class="control-label">Email</label>
              <input class="form-control" minlength="2" maxlength="32" name="email" type="text" id="email">
            </div>
        </div>
   
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">close</button>
          <button class="btn btn-sm btn-outline-primary" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> send email</button>
        </div>
   
      </div>
    </div>
          </form>
  </div>

    <script>

      function send(id) {
        $("#email_send").modal();
        $("#product_id").val(id);
      }

    </script>
</section>

@endsection