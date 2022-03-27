@extends('layouts.cms')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1 class="m-0">New Advance Program</h1>
          </div><!-- /.col -->
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/ap">Advance Program</a></li>
              <li class="breadcrumb-item active">New</li>
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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Create Advance Programme (1/5)</h3>
                        </div>
                        <!-- /.card-header -->
              
                        <!-- form start -->
                        <form action="/ap/add" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Month
                                                </span>

                                            </div>
                                            
                                            <select class="custom-select form-control" id="month" name="month" onchange="headingText()">
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select>
                                        </div>
                                        <!-- /input-group -->
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                Year
                                                </span>

                                            </div>
                                            
                                            <select class="custom-select form-control" id="year" name="year" onchange="headingText()">
                                                <option value='{{date("Y")-1}}'>{{date("Y")-1}}</option>
                                                <option value='{{date("Y")+0}}'>{{date("Y")+0}}</option>
                                                <option value='{{date("Y")+1}}'>{{date("Y")+1}}</option>
                                            </select>
                                        </div>
                                        <!-- /input-group -->
                                    </div>  
                                </div>

                            <div class="card-footer mt-2 text-right">
                                <button type="submit" class="btn btn-success">Create & Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </section>      
</div>
<script>
    window.onload = function(){
        var today = new Date();
        var thisMonth = today.getMonth() + 1;
        var thisYear = today.getFullYear();

        $('#month').val(thisMonth+1);
        $('#year').val(thisYear);

        if(thisMonth==12) {
            $('#month').val(1);
            $('#year').val(thisYear+1);
        }
    }
</script>
@endsection