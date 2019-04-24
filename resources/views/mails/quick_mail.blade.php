<div>
    == Quick Mail ==<br> 
    From: 
    @if(Auth::check())
    {{ Auth::user()->email }}
    @else
    New Customer: <br>
    {{ $form->email }}
    @endif
    <br>
</div>

<div>
    message: {{ $form->message }}
</div>
