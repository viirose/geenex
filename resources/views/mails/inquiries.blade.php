<?php
    $m = new App\Helpers\Mail;
?>
<div>
    == New Inquiry ==<br> 
    From: {{ Auth::user()->email }}<br>
    Customer: {{ Auth::user()->name }}
</div>

<div>
    message: {{ $form->message }}
</div>

@if($m->productList())
    products:<br>
    ------------<br>
    <div>
        @foreach($m->productList() as $record)
            {{ $record->part_no }} / {{ $record->name }} <br>
        @endforeach
    </div>
    -----------<br>
@endif