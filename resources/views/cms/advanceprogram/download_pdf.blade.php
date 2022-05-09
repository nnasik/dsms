<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title></title>
    <style>
        td,
        th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body style="font-size: 11pt">
    <!-- Header -->
    @if($advance_program->show_from)
    <p>
        @php echo nl2br($advance_program->from); echo "<br />";
        echo '<i>'.date('Y-m-d',strtotime($advance_program->submitted_on)).'</i>';
        @endphp
    </p>
    @endif @if($advance_program->show_to)
    <p>@php echo nl2br($advance_program->to); @endphp</p>
    @endif @if($advance_program->show_through)
    <p>Through</p>
    <p>@php echo nl2br($advance_program->through); @endphp</p>
    @endif @if($advance_program->show_heading)
    <h3 style="font-size: 12pt;text-align:center;">{{$advance_program->heading}}</h3>
    @endif

    <!-- End of Header -->

    <!--Start of body-->
    <table>
        <thead>
            <tr>
                @if($advance_program->show_col_date)
                <th style="width: 55pt">{{$advance_program->col_date}}</th>
                @endif @if($advance_program->show_col_day)
                <th>
                    {{$advance_program->col_day}}
                </th>
                @endif @if($advance_program->show_col_time)
                <th class="text-center">{{$advance_program->col_time}}</th>
                @endif @if($advance_program->show_col_nature_of_work)
                <th class="text-center">
                    {{$advance_program->col_nature_of_work}}
                </th>
                @endif @if($advance_program->show_col_working_place)
                <th class="text-center">
                    {{$advance_program->col_working_place}}
                </th>
                @endif @if($advance_program->show_col_beneficiaries)
                <th class="text-center">
                    {{$advance_program->col_beneficiaries}}
                </th>
                @endif @if($advance_program->show_col_field_no)
                <th class="text-center">
                    {{$advance_program->col_field_no}}
                </th>
                @endif @if($advance_program->show_col_target)
                <th class="text-center">
                    {{$advance_program->col_target}}
                </th>
                @endif @if($advance_program->show_col_km)
                <th class="text-center">{{$advance_program->col_km}}</th>
                @endif @can('ap.check')
                @if($advance_program->status=='Submitted')
                <th class="text-center">Check</th>
                @endif @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($days as $day)
            <tr @if($day->
                is_working_day==0)
                style="background-color:rgba(255,255,0,0.15)" @endif>
                @if($advance_program->show_col_date)
                <td class="text-nowrap">{{$day->pivot->date}}</td>
                @endif @if($advance_program->show_col_day)
                <td style="text-align: center">{{$day->pivot->day}}</td>
                @endif @if($advance_program->show_col_time)
                <td class="text-nowrap">{{$day->pivot->time}}</td>
                @endif @if($advance_program->show_col_nature_of_work)
                <td>{{$day->pivot->nature_of_work}}</td>
                @endif @if($advance_program->show_col_working_place)
                <td>{{$day->pivot->working_place}}</td>
                @endif
            </tr>
            @if(isset($day->pivot->note))
            <tr>
                <td colspan="5" class="text-danger" style="background-color: rgba(255, 0, 0, 0.2)">
                    Note : {{$day->pivot->note}}
                </td>
            </tr>
            @endif @endforeach
        </tbody>
    </table>
    <!-- End of Body-->

    <!--Footer-->
    @if($advance_program->show_footer_text)
    <p class="p-1 card-text">{{$advance_program->footer_text}}</p>
    @endif

    @if($advance_program->show_copy_to)
    <p class="p-0 card-text">
        <b>Copy To : </b>{{$advance_program->copy_to}}
    </p>
    @endif

    @if($advance_program->footer_text)
    <p>
        <i>{{nl2br($advance_program->footer_text)}}</i>
        <span style="position:relative;float:right;">
            <i>
                {{$advance_program->owner->name}} ({{$advance_program->owner->designation}})
                {{$advance_program->submitted_on}}
            </i>
        </span>
    </p>
    @endif

    @if($advance_program->checked_note)
    <p>
        <i>{{nl2br($advance_program->checked_note)}}</i>
        <span style="position:relative;float:right;">
            <i>
                {{$advance_program->checking_officer->name}} ({{$advance_program->checking_officer->designation}})
                {{$advance_program->checked_on}}
            </i>
        </span>
    </p>
    @endif

    @if($advance_program->recommendation_note)
    <p>
        <i>{{nl2br($advance_program->recommendation_note)}}</i>
        <span style="position:relative;float:right;">
            <i>
                {{$advance_program->recommending_officer->name}} ({{$advance_program->recommending_officer->designation}})
                {{$advance_program->recommended_on}}
            </i>
        </span>
    </p>
    @endif

    @if($advance_program->approval_note)
    <p>
        <i>{{nl2br($advance_program->approval_note)}}</i>
        <span style="position:relative;float:right;">
            <i>
                {{$advance_program->approval_officer->name}} ({{$advance_program->approval_officer->designation}})
                {{$advance_program->approved_on}}
            </i>
        </span>
    </p>
    @endif
    <!--End of Footer-->

    <!--Foot Note-->
    <p style="text-align:center;color:#AAA;font-size:10pt;">This Advance Programme generated on DSMS by {{Auth::user()->name}} ({{Auth::user()->designation}}) on {{NOW()}}</p>
    <!--End Foot Note-->
</body>

</html>