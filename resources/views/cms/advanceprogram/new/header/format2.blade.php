<div class="tab-pane fade" id="format-2" role="tabpanel" aria-labelledby="profile-tab">
    <form action="/ap/update_header" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$advance_program->id}}">
    <input type="hidden" name="format" value="format1">
    <!--ROW 1-->
    <div class="row pt-3">
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <input type="checkbox" name="is_form_no" value="true" id="is_form_no" @if($advance_program->is_form_no==true) checked @endif>
                    </span>
                </div>
                <input type="text" class="form-control" name="form_no" placeholder="Form No" value="{{$advance_program->form_no}}">
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <input type="checkbox" name="is_logo" id="is_logo"  @if($advance_program->is_logo==true) checked @endif>
                    </span>
                </div>
                <div class="custom-file">
                <input type="file" class="custom-file-input" id="logo" name="logo" accept=".png, .jpeg, .jpg, .gif">
                <label class="custom-file-label" for="exampleInputFile">Logo</label>
                </div>
            </div>
        </div>
    </div>

    <!--ROW 2-->
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <input type="checkbox" >
                    </span>
                </div>
                <textarea class="form-control" id="heading" name="heading" placeholder="Heading" rows="4"></textarea>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <input type="checkbox" >
                    </span>
                </div>
                <textarea class="form-control" id="header_text" name="header_text" placeholder="Header Text" rows="4"></textarea>
            </div>
        </div>
    </div>

    <!--ROW 3-->
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <input type="checkbox">  Name of the Officer
                    </span>
                </div>
                <input type="text" class="form-control" name="name" placeholder="Name of the Officer" value="{{$user_name}}">
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <input type="checkbox">  Designation
                    </span>
                </div>
                <input type="text" class="form-control" name="name" placeholder="Designation" value="{{$user_designation}}">
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <input type="checkbox">  District
                    </span>
                </div>
                <input type="text" class="form-control" name="name" placeholder="District" value="Batticaloa">
            </div>
        </div>
    </div>

    <!--ROW 4-->
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <input type="checkbox">  Division
                    </span>
                </div>
                <input type="text" class="form-control" name="name" placeholder="Division" value="Koralaipattu West">
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <input type="checkbox">  Divisional Secretariat
                    </span>
                </div>
                <input type="text" class="form-control" name="name" placeholder="Divisional Secretariat" value="Koralaipattu West - Oddamavadi">
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                    <input type="checkbox">  Month
                    </span>
                </div>
                <input type="text" class="form-control" name="name" placeholder="Month" readonly value="{{$advance_program->month_name}} {{$advance_program->year}}">
            </div>
        </div>
    </div>
    <div class="card-footer mt-3 text-right">
        <button type="submit" class="btn btn-primary" id="submit-btn">Save</button>
    </div>       
    </form>

</div>
<!--</Tab - Format 2>-->

<script>
    
</script>