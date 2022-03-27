@extends('layouts.cms')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-12 text-right">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="/ap">Advance Program</a></li>
                        <li class="breadcrumb-item active">{{$advance_program->month_name}} {{$advance_program->year}}
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
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

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    @if($advance_program->show_col_date)
                                    <th>{{$advance_program->col_date}}</th>
                                    @endif
                                    @if($advance_program->show_col_day)
                                    <th>{{$advance_program->col_day}}</th>
                                    @endif
                                    @if($advance_program->show_col_time)
                                    <th>{{$advance_program->col_time}}</th>
                                    @endif
                                    @if($advance_program->show_col_nature_of_work)
                                    <th>{{$advance_program->col_nature_of_work}}</th>
                                    @endif
                                    @if($advance_program->show_col_working_place)
                                    <th>{{$advance_program->col_working_place}}</th>
                                    @endif
                                    @if($advance_program->show_col_beneficiaries)
                                    <th>{{$advance_program->col_beneficiaries}}</th>
                                    @endif
                                    @if($advance_program->show_col_field_no)
                                    <th>{{$advance_program->col_field_no}}</th>
                                    @endif
                                    @if($advance_program->show_col_target)
                                    <th>{{$advance_program->col_target}}</th>
                                    @endif
                                    @if($advance_program->show_col_km)
                                    <th>{{$advance_program->col_km}}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($days as $day)
                                <tr @if($day->is_working_day==0) style="background-color:rgba(255,255,0,0.15)" @endif>
                                    @if($advance_program->show_col_date)
                                    <td class="text-nowrap">{{$day->pivot->date}}</td>
                                    @endif

                                    @if($advance_program->show_col_day)
                                    <td class="text-nowrap">{{$day->pivot->day}}</td>
                                    @endif

                                    @if($advance_program->show_col_time)
                                    <td class="text-nowrap">{{$day->pivot->time}}</td>
                                    @endif

                                    @if($advance_program->show_col_nature_of_work)
                                    <td>{{$day->pivot->nature_of_work}}</td>
                                    @endif

                                    @if($advance_program->show_col_working_place)
                                    <td>{{$day->pivot->working_place}}</td>
                                    @endif

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

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
            </div>

            <div class="card card-default color-palette-box mt-3">
                <div class="card-header">
                    <h3 class="card-title text-bold">
                        Actions
                    </h3>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <table>
                            <tr>
                                <td>Submit for approval</td>
                                <td colspan="2">
                                    <button class="btn btn btn-primary" style="width: 100%;">
                                        <i class="fa fa-paper-plane"></i>
                                    </button></td>
                            </tr>
                            <tr>
                                <td>Checked with Calender & Found Correct</td>
                                <td class="pr-4">
                                    <button class="btn btn btn-success"><i class="fa fa-check"></i></button>
                                </td>
                                <td>
                                    <button class="btn btn btn-danger"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="pr-4">Recommend / Not Recommend Advance Programme</td>
                                <td>
                                    <button class="btn btn btn-success"><i class="fa fa-check"></i></button>
                                </td>
                                <td>
                                    <button class="btn btn btn-danger"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>Approve / Not Approve Advance Programme</td>
                                <td>
                                    <button class="btn btn btn-success"><i class="fa fa-check"></i></button>
                                </td>
                                <td>
                                    <button class="btn btn btn-danger"><i class="fa fa-times"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</div>

@endsection
