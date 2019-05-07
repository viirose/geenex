@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container cent">
        <div class="col-12">
        
        <div class="row">
            
        <h4><a href="/products"><i class="fa fa-cube" aria-hidden="true"></i> 产品列表</a> / {{ $record->part_no }}</h4>
        </div>
        <div>
            
          <img src="{{ $record->img ? asset($record->img) : asset('img/sample.jpg') }}" class="img-fluid img-thumbnail">
        </div>

            <h4>{{ $record->name }}</h4>           
          <table class="table table-hover text-left">
            <thead>
              <tr>
                <th>项目</th>
                <th>参数</th>
              </tr>
            </thead>
            <tbody>
            <tr>
                <td>货号</td>
                <td>{{ $record->part_no  }}</td>
              </tr>
              <tr>
                <td>名称</td>
                <td>{{ $record->name  }}</td>
              </tr>
              <tr>
                <td>简介</td>
                <td>{{ $record->remark  }}</td>
              </tr>
              <tr>
                <td>详情</td>
                <td> {!! str_replace("\r\n", "<br>", $record->content) !!}</td>
              </tr>
            </tbody>
          </table>
     
        </div>
    </div>
</section>

@endsection