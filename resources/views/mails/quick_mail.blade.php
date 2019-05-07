<div>
    == 马上联系 ==<br> 
    来自: 
    @if(Auth::check())
    {{ Auth::user()->email }}
    @else
    未注册用户: <br>
    {{ $form->email }}
    @endif
    <br>
</div>

<div>
    消息: {{ $form->message }}
</div>
