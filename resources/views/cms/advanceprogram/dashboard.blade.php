@extends('layouts.cms')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Advance Programmes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Advance Programmes</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      @can('ap.summary')
      <div class="row">
        <h5 class="m-2">Summary of Advance Programmes - {{$month_name}} {{$year}}</h5>
      </div>

      <!-- Small boxes (Stat box) -->
      <div class="row">
        @include('cms.advanceprogram.dashboard.summary')
      </div>
      <!-- /.row -->
      @endcan

      <div class="row">
        <div class="col-9">
          <h5 class="m-2">My Advance Programmes</h5>
        </div>

        <div class="col-3 float-right">
          <a href="/ap/new" class="btn btn-block btn-success align-right"><i class="fa fa-solid fa-plus"></i> New</a>
        </div>

      </div>

      <!-- Small boxes (Stat box) -->
      <div class="row mt-2 mb-2">
        @include('cms.advanceprogram.dashboard.my')
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection