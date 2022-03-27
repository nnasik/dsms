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
              <li class="breadcrumb-item active">Table</li>
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
                            <a href="/ap/footer/{{$advance_program->id}}" class="btn btn-light text-dark">
                                <i class="fa fa-angle-left"></i>
                            </a>  
                               Table Columns (4/5)</h3>
                            <a href="/ap/calendar/{{$advance_program->id}}" class="text-light float-right border rounded p-1">Calendar <i class="fas fa-angle-right"></i></a>
                        </div>
                        <!-- /.card-header -->
                        <form action="/ap/updatetable" method="POST">
                        <div class="card-body row">
                            
                            @csrf
                            <input type="hidden" name="id" value="{{$advance_program->id}}">
                            <div class="input-group mb-3 col-12 col-md-4 col-lg-4 p-lg-1 p-0">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="show_col_date" id="show_col_date" aria-label="Checkbox for following text input" onchange="colDate()" @if($advance_program->show_col_date==true) checked @endif >
                                    </div>
                                </div>
                                <input type="text" name="col_date" id="col_date" class="form-control" value="{{$advance_program->col_date}}" placeholder="Date">
                            </div>

                            <div class="input-group mb-3 col-12 col-md-4 col-lg-4 p-lg-1 p-0">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="show_col_day" id="show_col_day" aria-label="Checkbox for following text input"  onchange="colDay()" @if($advance_program->show_col_day==true) checked @endif>
                                    </div>
                                </div>
                                <input type="text" name="col_day" id="col_day" class="form-control" value="{{$advance_program->col_day}}" placeholder="Day">
                            </div>

                            <div class="input-group mb-3 col-12 col-md-4 col-lg-4 p-lg-1 p-0">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="show_col_time" id="show_col_time" aria-label="Checkbox for following text input"  onchange="colTime()" @if($advance_program->show_col_time==true) checked @endif>
                                    </div>
                                </div>
                                <input type="text" name="col_time" id="col_time" class="form-control" value="{{$advance_program->col_time}}" placeholder="Time">
                            </div>
                            
                            <div class="input-group mb-3 col-12 col-md-4 col-lg-4 p-lg-1 p-0">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="show_col_nature_of_work" id="show_col_nature_of_work" aria-label="Checkbox for following text input"  onchange="colNatureOfWork()" @if($advance_program->show_col_nature_of_work==true) checked @endif>
                                    </div>
                                </div>
                                <input type="text" name="col_nature_of_work" id="col_nature_of_work" class="form-control" value="{{$advance_program->col_nature_of_work}}" placeholder="Nature of work">
                            </div>
                            
                            <div class="input-group mb-3 col-12 col-md-4 col-lg-4 p-lg-1 p-0">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="show_col_working_place" id="show_col_working_place" aria-label="Checkbox for following text input" onchange="colWorkingPlace()"  @if($advance_program->show_col_working_place==true) checked @endif>
                                    </div>
                                </div>
                                <input type="text" name="col_working_place" id="col_working_place" class="form-control" value="{{$advance_program->col_working_place}}" placeholder="Working Place">
                            </div>

                            <div class="input-group mb-3 col-12 col-md-4 col-lg-4 p-lg-1  p-0">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="show_col_beneficiaries" id="show_col_beneficiaries" aria-label="Checkbox for following text input"  onchange="colBeneficiaries()" @if($advance_program->show_col_beneficiaries==true) checked @endif>
                                    </div>
                                </div>
                                <input type="text" name="col_beneficiaries" id="col_beneficiaries" class="form-control" value="{{$advance_program->col_beneficiaries}}" placeholder="Beneficiaries">
                            </div>

                            <div class="input-group mb-3 col-12 col-md-4 col-lg-4 p-lg-1  p-0">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="show_col_field_no" id="show_col_field_no" aria-label="Checkbox for following text input"  onchange="colFieldNo()" @if($advance_program->show_col_field_no==true) checked @endif>
                                    </div>
                                </div>
                                <input type="text" name="col_field_no" id="col_field_no" class="form-control" value="{{$advance_program->col_field_no}}" placeholder="Field No">
                            </div>
                            <div class="input-group mb-3 col-12 col-md-4 col-lg-4 p-lg-1  p-0">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="show_col_target" id="show_col_target" aria-label="Checkbox for following text input" onchange="colTarget()" @if($advance_program->show_col_target==true) checked @endif>
                                    </div>
                                </div>
                                <input type="text" name="col_target" id="col_target" class="form-control" value="{{$advance_program->col_target}}" placeholder="Target">
                            </div>
                            <div class="input-group mb-3 col-12 col-md-4 col-lg-4 p-lg-1  p-0">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" name="show_col_km" id="show_col_km" aria-label="Checkbox for following text input"  onchange="colKm()" @if($advance_program->show_col_km==true) checked @endif>
                                    </div>
                                </div>
                                <input type="text" name="col_km" id="col_km" class="form-control" value="{{$advance_program->col_km}}" placeholder="Distance">
                            </div>
                        </div>
                        

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary" id="submit-btn">Save</button>
                        </div>  
                        </form>
                        <script>
                            function colDate(){
                                if($('#show_col_date').prop('checked') && $('#col_date').val()==''){
                                    $('#col_date').val('Date');
                                }
                            }
                            function colDay(){
                                if($('#show_col_day').prop('checked') && $('#col_day').val()==''){
                                    $('#col_day').val('Day');
                                }
                            }
                            function colTime(){
                                if($('#show_col_time').prop('checked') && $('#col_time').val()==''){
                                    $('#col_time').val('Time');
                                }
                            }
                            function colNatureOfWork(){
                                if($('#show_col_nature_of_work').prop('checked') && $('#col_nature_of_work').val()==''){
                                    $('#col_nature_of_work').val('Nature of work');
                                }
                            }
                            function colWorkingPlace(){
                                if($('#show_col_working_place').prop('checked') && $('#col_working_place').val()==''){
                                    $('#col_working_place').val('Working Place');
                                }
                            }
                            function colBeneficiaries(){
                                if($('#show_col_beneficiaries').prop('checked') && $('#col_beneficiaries').val()==''){
                                    $('#col_beneficiaries').val('Beneficiaries');
                                }
                            }
                            function colFieldNo(){
                                if($('#show_col_field_no').prop('checked') && $('#col_field_no').val()==''){
                                    $('#col_field_no').val('Field No');
                                }
                            }
                            function colTarget(){
                                if($('#show_col_target').prop('checked') && $('#col_target').val()==''){
                                    $('#col_target').val('Target');
                                }
                            }
                            function colKm(){
                                if($('#show_col_km').prop('checked') && $('#col_km').val()==''){
                                    $('#col_km').val('Distance');
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </section>      
</div>
@endsection