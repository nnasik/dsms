@extends('layouts.cms')

@section('content')
<div class="content-wrapper" style="min-height: 2646.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row m-0">
                <div class="col-12">
                    <form action="simple-results.html">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


                @foreach($users as $user)
                <div class="col-lg-4 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mt-3">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead mb-0"><b>{{$user->name}}</b></h2>
                                    <p class="text-muted mt-0">{{$user->designation}}</p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> email : {{$user->email}}</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : {{$user->phone}}</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    @if(file_exists('storage/user/dp/'.$user->profile_pic))
                                    <img class="img-circle img-fluid" src="{{asset('storage/user/dp/'.$user->profile_pic)}}" alt="user-avatar">
                                    @else
                                    <img class="img-circle img-fluid" src="{{asset('storage/user/dp.png')}}" alt="user-avatar">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="/user/view/{{$user->id}}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View User
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
            <!-- /.col -->
        </div><!-- /.container-fluid -->
    </section>
</div>
@endsection