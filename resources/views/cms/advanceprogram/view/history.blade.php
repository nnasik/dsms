<div class="timeline">
    @foreach($notes as $note)

    <div class="">
        <i class="fa">
            @if(file_exists('storage/user/dp/'.$note->user->profile_pic))
            <img src="{{asset('storage/user/dp/'.$note->user->profile_pic)}}" class="img-circle img-sm " alt="User Image">
            @else
            <img src="{{asset('storage/user/dp.png')}}" class="img-circle img-sm" alt="User Image">
            @endif
        </i>
        <div class="timeline-item">
            <span class="time"><i class="fas fa-clock"></i> {{$note->created_at}}</span>
            <h3 class="timeline-header text-primary">{{$note->user->name}}</h3>
            <div class="timeline-body">
                {{$note->body}}
            </div>
        </div>
    </div>
    @endforeach
    <div>
        <i class="fas fa-clock bg-gray"></i>
    </div>
</div>