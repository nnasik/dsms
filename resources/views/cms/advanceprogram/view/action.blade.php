<div class="card card-default color-palette-box mt-3">
    <div class="card-header">
        <h3 class="card-title text-bold">
            Actions
        </h3>
    </div>
    <div class="card-body">
        <div class="col-12">
            <div>
                @can('ap.ap')
                @if(($advance_program->status=='Created' || $advance_program->status=='Not Correct') && $advance_program->user==Auth::user()->id)
                <form action="/ap/submit" method="post">
                    @csrf
                    <input type="hidden" name="advance_program_id" value="{{$advance_program->id}}">
                    <div class="row my-2">
                        <div class="col-12 col-lg-8">Edit Advance Programme</div>
                        <div class="col-12 col-lg-4">
                            <a href="/ap/header/{{$advance_program->id}}" class="btn btn btn-warning" style="width: 100%;"><i class="fa fa-edit"></i> Edit</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-8">Submit for approval</div>
                        <div class="col-12 col-lg-4">
                            <button type="submit" class="btn btn btn-primary" style="width: 100%;"><i class="fa fa-paper-plane"></i> Submit</button>
                        </div>
                    </div>
                </form>
                @endif

                @if($advance_program->status=='Approved')
                <div class="row">
                    <div class="col-12 col-lg-8">Download / View</div>
                    <div class="col-6 col-lg-2"><a class="btn btn btn-success" style="width: 100%;"><i class="fa fa-download"></i> Download PDF</a></div>
                    <div class="col-6 col-lg-2"><a class="btn btn btn-danger" style="width: 100%;"><i class="fa fa-file"></i> Download PDF</a></div>
                </div>
                @endif

                @endcan

                @can('ap.check')
                @if($advance_program->status=='Submitted')
                <form action="/ap/checkap" method="post">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="note" value="Checked with Calender. Found Correct.">
                        <input type="hidden" name="advance_program_id" value="{{$advance_program->id}}">
                        <div class="col-12 col-lg-8">Checked with Calender. Found Correct.</div>
                        <div class="col-6 col-lg-2 col-md-4 ">
                            <button type="submit" class="btn btn btn-success" style="width: 100%;" name="action" value="Correct">
                                <i class="fa fa-check"></i>  Correct
                            </button>
                        </div>
                        <div class="col-6 col-lg-2 col-md-4 ">
                            <button type="button" class="btn btn btn-danger" style="width: 100%;" data-toggle="modal" data-target="#modal-ap-check">
                                <i class="fa fa-times"></i>  Not Correct
                            </button>
                        </div>
                    </div>
                </form>
                @endif
                @endcan


                @can('ap.recommend')
                @if($advance_program->status=='Checked')
                <form action="/ap/recommendap" method="post">
                    @csrf
                    <input type="hidden" name="note" value="Advance Programme Recommended.">
                    <input type="hidden" name="advance_program_id" value="{{$advance_program->id}}">
                    <div class="row">
                        <div class="col-12 col-lg-8">Recommend / Not Recommend Advance Programme</div>
                        <div class="col-6 col-lg-2"><button type="submit" name="action" value="Recommended" class="btn btn btn-success" style="width: 100%;"><i class="fa fa-check"></i>  Recommend</button></div>
                        <div class="col-6 col-lg-2"><button class="btn btn btn-danger" style="width: 100%;"><i class="fa fa-times"></i>  Not Recommend</button></div>
                    </div>
                </form>
                @endif
                @endcan


                @can('ap.approve')
                @if($advance_program->status=='Recommended')
                <form action="/ap/approveap" method="post">
                    @csrf
                    <input type="hidden" name="note" value="Advance Programme Approved.">
                    <input type="hidden" name="advance_program_id" value="{{$advance_program->id}}">
                    <div class="row">
                        <div class="col-12 col-lg-8">Approve / Not Approve Advance Programme</div>
                        <div class="col-6 col-lg-2"><button type="submit" name="action" value="Approved" class="btn btn btn-success" style="width: 100%;"><i class="fa fa-check"></i> Approve</button></div>
                        <div class="col-6 col-lg-2"><button class="btn btn btn-danger" style="width: 100%;"><i class="fa fa-times"></i> Not Approve</button></div>
                    </div>
                </form>
                @endif
                @endcan
            </div>
        </div>
    </div>
</div>