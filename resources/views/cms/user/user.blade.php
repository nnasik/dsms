@extends('layouts.cms')

@section('content')
<div class="content-wrapper" style="min-height: 2646.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User : {{$user->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/users">Users</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if(file_exists('storage/user/dp/'.$user->profile_pic))
                                <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/user/dp/'.$user->profile_pic)}}" alt="User profile picture">
                                @else
                                <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/user/dp.png')}}" alt="User profile picture">
                                @endif
                            </div>

                            <h3 class="profile-username text-center">{{$user->name}}</h3>

                            <p class="text-muted text-center">{{$user->designation}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>NIC</b> <a class="float-right">{{$user->id}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Phone</b> <a class="float-right">{{$user->phone}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{$user->email}}</a>
                                </li>

                                <li class="list-group-item">
                                    <b>Status</b> <a class="float-right">{{$user->status}}</a>
                                </li>

                                <li class="list-group-item p-1">

                                    <b>Signature</b> <a class="float-right">

                                        @if(file_exists('storage/user/sign/'.$user->sign))
                                        <img class="mr-3" src="{{asset('storage/user/sign/'.$user->sign)}}" height="50" srcset="">
                                        @else
                                        <img src="{{asset('storage/user/sign.jpg')}}" height="50" srcset="">
                                        @endif
                                    </a>
                                </li>
                            </ul>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">

                            </div>

                            <h3 class="profile-username text-center">User Account Actions</h3>


                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Status</b>
                                    <div class="float-right">
                                        <form action="/user/action" method="post">
                                            @csrf
                                            <button class="btn btn-primary" type="submit" name="action" value="Activate User">Activate User</button>
                                            <button class="btn btn-danger" type="submit" name="action" value="Deactivate User">Deactivate User</button>
                                        </form>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <b>Password</b>
                                    <div class="float-right">
                                        <button class="btn btn-primary" type="submit" name="action" value="Activate User">Reset Password</button>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <b>Profile Picture</b>
                                    <a class="float-right">
                                        <button class="btn btn-warning" type="submit" name="action" value="Activate User">Upload Profile Picture</button>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Signature</b>
                                    <a class="float-right">
                                        <button class="btn btn-warning" type="submit" name="action" value="Activate User">Upload Signature</button>
                                    </a>
                                </li>

                            </ul>


                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @include('cms.profile.password_update_modal')
</div>
<script>
    function openDP() {
        $("#dp").trigger("click");
    }

    function uploadDP() {
        $("#user-dp-submit").trigger("click");
    }

    function openSign() {
        $("#sign").trigger("click");
    }

    function uploadSign() {
        $("#user-sign-submit").trigger("click");
    }
</script>
@endsection