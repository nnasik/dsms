@extends('layouts.cms')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1 class="m-0">Advance Program - {{$advance_program->month_name}} {{$advance_program->year}} </h1>
          </div><!-- /.col -->
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/ap">Advance Program</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            
                            <h3 class="card-title p-0">
                            <a href="/ap/table/{{$advance_program->id}}" class="btn btn-light text-dark">
                                <i class="fa fa-angle-left"></i>
                            </a>    
                               Calendar (5/5)</h3>
                            <a href="/ap" class="float-right btn btn-outline-light">Adv Programs <i class="fas fa-angle-right"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <form action="/ap/updatecalendar" method="POST">
                        <div class="card-body">
                            @csrf
                            <input type="hidden" name="id" value="{{$advance_program->id}}">

                            @foreach($days as $day)
                            <!--ROW 1-->
                            <div class="row border rounded p-1 mb-2 bg-light">
                                @if($advance_program->show_col_date)
                                <div class="col-lg-2">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <input id="date-{{$day->date}}" name="date-{{$day->date}}" type="text" class="form-control" value="{{$day->date}}" readonly>  
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($advance_program->show_col_day)
                                <div class="col-lg-2">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <input id="day-{{$day->date}}" name="day-{{$day->date}}" type="text" class="form-control" value="{{$day->day}}" readonly>  
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($advance_program->show_col_time)
                                <div class="col-lg-2">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <input id="time-{{$day->date}}" name="time-{{$day->date}}" type="text" class="form-control" value="{{$day->pivot->time}}" placeholder="Time" onfocus="(this.type='time')" onblur="(this.type='text')">  
                                        </div>
                                        
                                    </div>
                                </div>
                                @endif
                                @if($advance_program->show_col_nature_of_work)
                                <div class="col-sm-6 col-lg-5">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <input id="nature-of-work-{{$day->date}}" name="nature-of-work-{{$day->date}}" type="text" class="form-control" value="{{$day->pivot->nature_of_work}}" placeholder="{{$advance_program->col_nature_of_work}}">  
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($advance_program->show_col_working_place)
                                <div class="col-sm-6 col-lg-3">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <input id="place-of-work-{{$day->date}}" name="place-of-work-{{$day->date}}" type="text" class="form-control" value="{{$day->pivot->working_place}}" placeholder="{{$advance_program->col_working_place}}">  
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($advance_program->show_col_beneficiaries)
                                <div class="col-sm-6 col-lg-3">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <input id="beneficiaries-{{$day->date}}" name="beneficiaries-{{$day->date}}" type="text" class="form-control" value="{{$day->pivot->beneficiaries}}" placeholder="{{$advance_program->col_beneficiaries}}">  
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($advance_program->show_col_field_no)
                                <div class="col-sm-6 col-lg-2">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <input id="field_no-{{$day->date}}" name="field_no-{{$day->date}}" type="text" class="form-control" value="{{$day->pivot->field_no}}" placeholder="{{$advance_program->col_field_no}}">  
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($advance_program->show_col_target)
                                <div class="col-sm-6 col-lg-2">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <input id="target-{{$day->date}}" name="target-{{$day->date}}" type="text" class="form-control" value="{{$day->pivot->target}}" placeholder="{{$advance_program->col_target}}">  
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($advance_program->show_col_km)
                                <div class="col-sm-6 col-lg-2">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <input id="km-{{$day->date}}" name="km-{{$day->date}}" type="text" class="form-control" value="{{$day->pivot->km}}" placeholder="{{$advance_program->col_km}}">  
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary" id="submit-btn">Save</button>
                        </div>  
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </section>      
</div>
@endsection