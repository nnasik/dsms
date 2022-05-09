@if($advance_program->show_from)
<p class="p-1 card-text">
    @php
    echo nl2br($advance_program->from);
    echo "<br>";
    if($advance_program->submitted_on){
    echo date('Y-m-d',strtotime($advance_program->submitted_on));
    }
    else{
    echo date('Y-m-d');
    }
    @endphp
</p>
@endif
@if($advance_program->show_to)
<p class="p-1 card-text">
    @php
    echo nl2br($advance_program->to);
    @endphp
</p>
@endif

@if($advance_program->show_through)
<p class="p-1 card-text">Through</p>
<p class="p-1 card-text">
    @php
    echo nl2br($advance_program->through);
    @endphp
</p>
@endif

@if($advance_program->show_heading)
<h3 class="m-0 p-3 text-center">{{$advance_program->heading}}</h3>
@endif