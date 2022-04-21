@foreach($my_advance_programs as $ap)

<div class="col-md-3 col-sm-6 col-12">
    <a href="/ap/view/{{$ap->id}}" class="col-md-3 col-sm-6 col-12">
        <div class="info-box">

            @if($ap->status=='Created')
            <span class="info-box-icon bg-indigo">
                <i class="fa fa-calendar"></i>
            </span>
            @elseif($ap->status=='Submitted')
            <span class="info-box-icon bg-dark">
                <i class="fa fa-file"></i>
            </span>
            @elseif($ap->status=='Checked')
            <span class="info-box-icon bg-warning">
                <i class="fa fa-calendar-check"></i>
            </span>
            @elseif($ap->status=='Recommended')
            <span class="info-box-icon bg-info">
                <i class="fa fa-check"></i>
            </span>
            @elseif($ap->status=='Approved')
            <span class="info-box-icon bg-success">
                <i class="fa fa-check-double"></i>
            </span>
            @elseif($ap->status=='Not Correct')
            <span class="info-box-icon bg-danger">
                <i class="fa fa-exclamation-circle"></i>
            </span>
            @elseif($ap->status=='Not Approved')
            <span class="info-box-icon bg-danger">
                <i class="fa fa-times-circle"></i>
            </span>
            @elseif($ap->status=='Not Recommended')
            <span class="info-box-icon bg-danger">
                <i class="fa fa-file"></i>
            </span>
            @else
            <span class="info-box-icon bg-info">

            </span>
            @endif



            <div class="info-box-content">
                <span class="info-box-text">
                    @php
                    $dateObj = DateTime::createFromFormat('!m', $ap->month);
                    echo $dateObj->format('F'); // March
                    @endphp
                    - {{$ap->year}}
                </span>
                <span class="info-box-number">{{$ap->status}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </a>
</div>

@endforeach