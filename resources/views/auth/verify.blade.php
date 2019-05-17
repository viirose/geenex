@extends('../nav')

@section('content')
<div class="row top-pad"></div>
<section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('We’ve sent you an email with a verification link, please check your email and proceed.') }}
                    {{ __('No email received?') }}, <a href="{{ route('verification.resend') }}">{{ __('Please send me the verification link again!') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
