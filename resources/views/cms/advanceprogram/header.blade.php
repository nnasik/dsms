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
                        <li class="breadcrumb-item active">Header</li>
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
                                <a href="/ap" class="btn btn-light text-dark">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                                   Header Details (2/5)
                            </h3>
                            <a href="/ap/footer/{{$advance_program->id}}" class="text-light float-right border rounded p-1">Footer <i class="fas fa-angle-right"></i></a>
                        </div>
                        <!-- /.card-header -->

                        <!-- Tab Start -->
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#format-1" role="tab" aria-controls="home" aria-selected="true">F1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#format-2" role="tab" aria-controls="profile" aria-selected="false">F2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">F3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Custom</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <!--<Tab - Format 1>-->
                                @include('cms.advanceprogram.new.header.format1')
                                <!--<Tab - Format 2>-->
                                @include('cms.advanceprogram.new.header.format2')
                                <!--<Tab - Format 3>-->
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                                <!--</Tab - Format 3>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>
@endsection