@extends('layouts.cms')

@section('content')
<div class="content-wrapper" style="min-height: 2646.44px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$heading}} - Advance Programmes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"><a href="/ap">AP</a></li>
                        <li class="breadcrumb-item active">Advance Programms</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row m-0">
                <!--
                <div class="col-12">
                    <form action="simple-results.html">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Search Name / NIC">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
-->

                @if(isset($aps))
                @foreach($aps as $ap)
                <div class="col-lg-4 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mt-3">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <h2 class="lead mb-0"><b>{{$ap->heading}}</b></h2>
                                    <p class="text-muted mt-0">{{$ap->owner->name}} - {{$ap->owner->designation}}</p>
                                </div>
                                <div class="col-3 text-center">
                                    @if(file_exists('storage/user/dp/'.$ap->owner->profile_pic))
                                    <img class="img-circle img-fluid" src="{{asset('storage/user/dp/'.$ap->owner->profile_pic)}}" alt="user-avatar">
                                    @else
                                    <img class="img-circle img-fluid" src="{{asset('storage/user/dp.png')}}" alt="user-avatar">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                @can('ap.approve')
                                @if($ap->status=='Recommended')
                                <form action="/ap/approveap" method="post" class="btn">
                                    @csrf
                                    <input type="hidden" name="note" value="Advance Programme Approved.">
                                    <input type="hidden" name="advance_program_id" value="{{$ap->id}}">
                                    <button type="submit" name="action" value="Approved" class="btn btn-success">
                                        <i class="fas fa-check"></i> Approve Advance Programme
                                    </button>
                                </form>
                                @endif
                                @endcan

                                @can('ap.recommend')
                                @if($ap->status=='Checked')
                                <form action="/ap/recommendap" method="post" class="btn">
                                    @csrf
                                    <input type="hidden" name="note" value="Advance Programme Recommended.">
                                    <input type="hidden" name="advance_program_id" value="{{$ap->id}}">
                                    <button type="submit" name="action" value="Recommended" class="btn btn-sm btn-success">
                                        <i class="fas fa-check"></i> Recommend Advance Programme
                                    </button>
                                </form>
                                @endif
                                @endcan

                                <a href="/ap/view/{{$ap->id}}" class="btn btn-primary">
                                    <i class="fas fa-eye"></i> View
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

                @if(isset($notSubmittedUsers))
                @foreach($notSubmittedUsers as $user)
                <div class="col-lg-4 col-sm-6 col-md-4 d-flex align-items-stretch flex-column mt-3">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <h2 class="lead mb-0"><b>{{$user->name}}</b></h2>
                                    <p class="text-muted mt-0">{{$user->designation}}</p>
                                </div>
                                <div class="col-3 text-center">
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
                                <btn class="btn btn-sm btn-primary">
                                    <i class="fas fa-comment"></i>  Ask to submit Advance Programme
                                </btn>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif


            </div>
            <!-- /.col -->
        </div><!-- /.container-fluid -->
    </section>
</div>
@endsection