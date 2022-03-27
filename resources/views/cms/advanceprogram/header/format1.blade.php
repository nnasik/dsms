<div class="tab-pane fade show active" id="format-1" role="tabpanel" aria-labelledby="home-tab">
    <form action="/ap/updateheader" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$advance_program->id}}">
    <input type="hidden" name="format" value="format1">
    <!--ROW 1-->
    <div class="row pt-3">
        <div class="col-md-4">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" value="true" name="show_from" id="show_from" @if($advance_program->show_from==true) checked @endif>
                        </div>
                    </div>
                    <textarea class="form-control" id="from" name="from"  placeholder="From" rows="4" >{{$advance_program->from}}</textarea>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" value="true" name="show_to" id="show_to" @if($advance_program->show_to==true) checked @endif>
                        </div>
                    </div>
                    <textarea class="form-control" id="to" name="to" placeholder="To" rows="4">{{$advance_program->to}}</textarea>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" value="true" name="show_through" id="show_through" @if($advance_program->show_through==true) checked @endif>
                        </div>
                    </div>
                    <textarea class="form-control" id="through" name="through" placeholder="Through" rows="4">{{$advance_program->through}}</textarea>
                </div>
            </div>
        </div>
        
    </div>
    
    <!--ROW 2-->
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <input type="checkbox" name="show_heading" id="show_heading"  value="true" @if($advance_program->show_heading==true) checked @endif>
                    </span>
                </div>
                <textarea class="form-control" id="heading" name="heading" placeholder="Heading.." rows="4">@if($advance_program->heading==null)Advance Programme for the Month of {{$advance_program->month_name}} {{$advance_program->year}}@else {{$advance_program->heading}} @endif</textarea>
            </div>
            <!-- /input-group -->
        </div>
    </div>

    <div class="card-footer mt-3 text-right">
        <button type="submit" class="btn btn-primary" id="submit-btn">Save</button>
    </div>       
    </form>
</div>
<!--</Tab - Format 1>-->