@if($advance_program->show_footer_text)
<p class="p-1 card-text">{{$advance_program->footer_text}}</p>
@endif

<div class="row p-1">
    @if($advance_program->show_sign)
    <p class="col-4 p-1 card-text">
        ...........................
        <br>
        {{$advance_program->sign}}
    </p>
    @endif

    @if($advance_program->show_recommended)
    <p class="col-4 p-1 card-text">
        ...........................
        <br>
        {{$advance_program->recommended}}
    </p>
    @endif

    @if($advance_program->show_approval)
    <p class="col-4 p-1 card-text">
        ...........................
        <br>
        @php
        echo nl2br($advance_program->approval);
        @endphp
    </p>
    @endif
</div>
@if($advance_program->show_copy_to)
<p class="p-0 card-text">
    <b>Copy To : </b>{{$advance_program->copy_to}}
</p>
@endif