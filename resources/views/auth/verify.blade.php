@extends('../nav')

@section('content')
<div class="row top-pad"></div>
<section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('验证邮件地址') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('一封包含验证链接的邮件已经发送至您的注册信箱') }}
                        </div>
                    @endif

                    {{ __('您需要在验证邮箱才能继续操作; 验证邮件在您的注册邮箱中,请检查!') }}
                    {{ __('如果您没有收到,') }}, <a href="{{ route('verification.resend') }}">{{ __('点击重新发送.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
