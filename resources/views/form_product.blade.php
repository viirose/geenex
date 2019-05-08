@extends('nav')

@section('content')

<div class="row top-pad"></div>
<section>
    <div class="container">
        <div class="col-sm-5 cent">
          <div class="row text-left">
            <div class="card card-light form-card col-12">
            <h4><i class="fa fa-{{ $icon }}" aria-hidden="true"></i> {{ $title }}</h4>
            <p><button class="btn btn-sm btn-primary">select category</button></p>
              {!! form($form) !!}
            </div>
          </div>
        </div>
    </div>

  <script src="{{ asset('js/bootnavbar.js') }}"></script>
  <script>
    $(function () {
        $('#bootnavbar').bootnavbar();
    })
</script>
</section>

@endsection