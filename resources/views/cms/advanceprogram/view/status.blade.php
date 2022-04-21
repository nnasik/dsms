<div class="card card-default color-palette-box mt-3">
    <div class="card-header">
        <h3 class="card-title text-bold">
            Status & Notes
        </h3>
    </div>
    <div class="card-body">
        <div class="col-12">
            <div>
                <div class="card-comment">
                    @if($advance_program->approval_note)
                    <div class="post">
                        <div class="user-block">
                            @if(file_exists('storage/user/dp/'.$advance_program->approval_officer->profile_pic))
                            <img src="{{asset('storage/user/dp/'.$advance_program->approval_officer->profile_pic)}}" class="img-circle img-sm " alt="User Image">
                            @else
                            <img src="{{asset('storage/user/dp.png')}}" class="img-circle img-sm" alt="User Image">
                            @endif
                            <span class="username">
                                <a href="#">{{$advance_program->approval_officer->name}}</a>
                            </span>
                            <span class="description">{{$advance_program->approved_on}}</span>
                        </div>
                        <p>
                            @php
                            echo nl2br($advance_program->approval_note);
                            @endphp
                        </p>
                    </div>
                    @endif

                    @if($advance_program->recommendation_note)
                    <div class="post">
                        <div class="user-block">
                            @if(file_exists('storage/user/dp/'.$advance_program->recommending_officer->profile_pic))
                            <img src="{{asset('storage/user/dp/'.$advance_program->recommending_officer->profile_pic)}}" class="img-circle img-sm " alt="User Image">
                            @else
                            <img src="{{asset('storage/user/dp.png')}}" class="img-circle img-sm" alt="User Image">
                            @endif
                            <span class="username">
                                <a href="#">{{$advance_program->recommending_officer->name}}</a>
                            </span>
                            <span class="description">{{$advance_program->recommended_on}}</span>
                        </div>
                        <p>
                            @php
                            echo nl2br($advance_program->recommendation_note);
                            @endphp
                        </p>
                    </div>
                    @endif

                    @if($advance_program->checked_note)
                    <div class="post">
                        <div class="user-block">
                            @if(file_exists('storage/user/dp/'.$advance_program->checking_officer->profile_pic))
                            <img src="{{asset('storage/user/dp/'.$advance_program->checking_officer->profile_pic)}}" class="img-circle img-sm " alt="User Image">
                            @else
                            <img src="{{asset('storage/user/dp.png')}}" class="img-circle img-sm" alt="User Image">
                            @endif
                            <span class="username">
                                <a href="#">{{$advance_program->checking_officer->name}}</a>
                            </span>
                            <span class="description">{{$advance_program->checked_on}}</span>
                        </div>
                        <p>
                            @php
                            echo nl2br($advance_program->checked_note);
                            @endphp
                        </p>
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>