<?php
    $m = new App\Helpers\Mail;
?>
<div>
    == 新咨询 ==<br> 
    来自: {{ Auth::user()->email }}<br>
    用户: {{ Auth::user()->name }}
</div>

<div>
    信息: {{ $form->message }}
</div>

@if($m->productList())
    产品:<br>
    ------------<br>
    <div>
        @foreach($m->productList() as $record)
            {{ $record->part_no }} / {{ $record->name }} <br>
        @endforeach
    </div>
    -----------<br>
@endif