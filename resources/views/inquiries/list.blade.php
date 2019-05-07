@extends('../nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
        <div class="col-sm-7 cent">
            <div class="card card-light form-card">
            <h4><i class="fa fa-list-ul" aria-hidden="true"></i> 我的咨询 [{{ $records->count() }}]</h4>
            <blockquote class="blockquote text-left ">
              <ol class="cart-item">
            @if($records->count())
                @foreach($records as $record)
                <li><a href="/inquiries/delete/{{ $record->id }}" class="badge badge-primary"> {{ $record->part_no }} / {{ $record->name }}</a></li>
                @endforeach
            @else
                <div class="text-center">
                    <p>(空)</p>
                    <a href="/products" class="btn btn-primary btn-sm">查看产品列表</a>
                </div>
                    
                
            @endif

              </ol>
            </blockquote>
            <form action="/inquiries/send" method="post" class="contact-form text-left">
              <div class="form-group mb-4">
                <label>备注</label>
                <textarea name="message" placeholder="可附上您的要求/偏好.." class="form-control"></textarea>
              </div>
              <div class="form-group">
                @csrf
                <input type="submit" value="发送邮件" class="btn btn-outline-primary btn-sm">
                <a href="/inquiries/clear" class="btn btn-outline-danger btn-sm"> 清除内容</a>
              </div>
            </form> 
            </div>
        </div>
    </div>
</section>

@endsection