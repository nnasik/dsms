<!-- form start -->
<div class="tab-pane fade show active" id="format-1" role="tabpanel" aria-labelledby="home-tab">
<form action="/ap/updatefooter" method="POST">
    <input type="hidden" name="id" value="{{$advance_program->id}}">
    <input type="hidden" name="format" value="format1">
    @csrf
    <div class="row pt-3">
        <div class="col-md-12">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="show_footer" id="show_footer" onchange="footerText()" @if($advance_program->show_footer_text==true) checked @endif>  Footer
                        </div>
                    </div>
                    <input type="text" class="form-control" id="footer" name="footer" placeholder="Submitted for your approval please." value="{{$advance_program->footer_text}}">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox"  name="show_sign" id="show_sign" onchange="signText()" @if($advance_program->show_sign==true) checked @endif>  Sign
                        </div>
                    </div>
                    <textarea class="form-control" id="sign" name="sign" placeholder="Signature" rows="4">{{$advance_program->sign}}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox"  name="show_recommended" id="show_recommended" onchange="recommendedText()" @if($advance_program->show_recommended==true) checked @endif>  Recommend 
                        </div>
                    </div>
                    <textarea class="form-control" id="recommended" name="recommended" placeholder="Recommended" rows="4">{{$advance_program->recommended}}</textarea>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox"  name="show_approval" id="show_approval" onchange="approvalText()" @if($advance_program->show_approval==true) checked @endif>  Approval
                        </div>
                    </div>
                    <textarea class="form-control" id="approval" name="approval" placeholder="Approved / Not Approved" rows="4">{{$advance_program->approval}}</textarea>
                </div>
            </div>
        </div>
                                    
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <input type="checkbox" name="show_copy_to" id="show_copy_to" @if($advance_program->show_copy_to==true) checked @endif>
                        </div>
                    </div>
                    <textarea class="form-control" id="copy_to" name="copy_to" placeholder="Copy To" rows="4">{{$advance_program->copy_to}}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer mt-2 text-right">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
</div>