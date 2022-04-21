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
                @include('cms.advanceprogram.view.header')

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    @if($advance_program->show_col_date)
                                    <th class="text-center">{{$advance_program->col_date}}</th>
                                    @endif
                                    @if($advance_program->show_col_day)
                                    <th class="text-center">{{$advance_program->col_day}}</th>
                                    @endif
                                    @if($advance_program->show_col_time)
                                    <th class="text-center">{{$advance_program->col_time}}</th>
                                    @endif
                                    @if($advance_program->show_col_nature_of_work)
                                    <th class="text-center">{{$advance_program->col_nature_of_work}}</th>
                                    @endif
                                    @if($advance_program->show_col_working_place)
                                    <th class="text-center">{{$advance_program->col_working_place}}</th>
                                    @endif
                                    @if($advance_program->show_col_beneficiaries)
                                    <th class="text-center">{{$advance_program->col_beneficiaries}}</th>
                                    @endif
                                    @if($advance_program->show_col_field_no)
                                    <th class="text-center">{{$advance_program->col_field_no}}</th>
                                    @endif
                                    @if($advance_program->show_col_target)
                                    <th class="text-center">{{$advance_program->col_target}}</th>
                                    @endif
                                    @if($advance_program->show_col_km)
                                    <th class="text-center">{{$advance_program->col_km}}</th>
                                    @endif
                                    @can('ap.check')
                                    @if($advance_program->status=='Submitted')
                                    <th class="text-center">Check</th>
                                    @endif
                                    @endcan
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

                                    @if($advance_program->status=='Submitted')
                                    <td class="text-center">
                                        @if($day->pivot->is_correct===NULL)

                                        @elseif($day->pivot->is_correct==true)
                                        <i class="fa fa-lg fa-check-circle text-success"></i>

                                        @elseif($day->pivot->is_correct==false)
                                        <i class="fa fa-lg fa-times-circle text-danger"></i>
                                        @endif


                                        @can('ap.check')
                                        <div id="check-date-{{$day->pivot->date}}" class="@if(isset($day->pivot->is_correct)) d-none @endif">
                                            <button class="btn btn btn-success m-1" onclick="checkDate({{$advance_program->id}},'{{$day->pivot->date}}')"><i class="fa fa-check"></i></button>
                                            <button class="btn btn btn-danger m-1" onclick="addDateNote({{$advance_program->id}},'{{$day->pivot->date}}')"><i class="fa fa-times"></i></button>
                                        </div>
                                        @endcan

                                    </td>
                                    @endif
                                </tr>
                                @if(isset($day->pivot->note))
                                <tr>
                                    <td colspan="5" class="text-danger" style="background-color:rgba(255,0,0,0.2);">
                                        Note : {{$day->pivot->note}}
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                @include('cms.advanceprogram.view.footer')
            </div>
            @include('cms.advanceprogram.view.status')
            @include('cms.advanceprogram.view.action')


    </section>
    @include('cms.advanceprogram.view.history')
</div>
<script>
    function checkDate(advance_program_id, ap_date) {
        $.post("/ap/checkdate", {
                date: ap_date,
                ap_id: advance_program_id,
                _token: '@php echo csrf_token();@endphp'
            },

            function(data, status) {
                if (status == 'success') {
                    $("#check-date-" + data).hide();
                }
            });
    }

    function addDateNote(advance_program_id, ap_date) {
        var prompt_note = prompt("Note :")
        $.post("/ap/adddatenote", {
                date: ap_date,
                ap_id: advance_program_id,
                _token: '@php echo csrf_token();@endphp',
                note: prompt_note
            },

            function(data, status) {
                if (status == 'success') {
                    $("#check-date-" + data).hide();
                }
            });
    }
</script>
@include('cms.advanceprogram.modals.not_correct_ap')
@endsection