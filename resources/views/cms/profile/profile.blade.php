@extends('layouts.cms')

@section('content')
<div class="content-wrapper" style="min-height: 2646.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if(file_exists('storage/user/dp/'.$user->profile_pic))
                                <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/user/dp/'.$user->profile_pic)}}" alt="User profile picture">
                                @else
                                <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/user/dp.png')}}" alt="User profile picture">
                                @endif

                                <btn id="label-user-dp" onclick="openDP()" class="text-light"><i id="user-dp" class="fa fa-camera"></i></btn>

                                <style>
                                    #label-user-dp {
                                        position: absolute;
                                        text-align: center;
                                        top: 90px;
                                        left: 0px;
                                        right: 0px;
                                        z-index: 20;
                                    }

                                    #user-dp:hover {
                                        cursor: pointer;
                                    }
                                </style>
                                <div class="d-none">
                                    <form id="" action="/profile/updatedp" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <!-- {{ csrf_field() }} -->
                                        <input type="file" name="dp" id="dp" accept="image/png, image/jpg, image/jpeg" onchange="uploadDP()">
                                        <input type="submit" id="user-dp-submit">
                                    </form>
                                </div>
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
                                <li class="list-group-item p-1">

                                    <b>Signature</b> <a class="float-right">
                                        <div class="d-none">
                                            <form id="-user-sign-form" action="/profile/updatesign" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <!-- {{ csrf_field() }} -->
                                                <input type="file" name="sign" id="sign" accept="image/png, image/jpg, image/jpeg" onchange="uploadSign()">
                                                <input type="submit" id="user-sign-submit">
                                            </form>
                                        </div>
                                        @if(file_exists('storage/user/sign/'.$user->sign))
                                        <img class="mr-3" src="{{asset('storage/user/sign/'.$user->sign)}}" height="50" srcset="">
                                        @else
                                        <img src="{{asset('storage/user/sign.jpg')}}" height="50" srcset="">
                                        @endif

                                        <div id="label-user-sign" class="text-dark"><i id="user-sign" onclick="openSign()" class="fa fa-camera"></i></div>
                                        <style>
                                            #label-user-sign {
                                                position: absolute;
                                                text-align: center;
                                                top: 15px;
                                                right: 0px;
                                                z-index: 20;
                                            }

                                            #user-sign:hover {
                                                cursor: pointer;
                                            }
                                        </style>
                                    </a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary float-right">Update Info</a>
                            <button type="button" class="btn btn-primary float-right mr-1" data-toggle="modal" data-target="#modal-password-change">Change Password</button>
                            </button>

                            <form action="/user/updatedp" method="post"></form>
                        </div>
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