<div class="modal fade" id="modal-ap-check" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Advance Programme is not correct</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="/ap/checkap" method="post">
                @csrf
                <input type="hidden" name="advance_program_id" value="{{$advance_program->id}}">
                <input type="hidden" name="action" value="Not Correct">
                <div class="modal-body">
                    <div class="row mb-3">
                        <label for="permission" class="col-md-2 col-form-label text-md-end">{{ __('Note') }}</label>
                        <div class="col-md-10">
                            <textarea name="note" cols="30" rows="5" class="form-control">I checked your Advance Programme & found the following errors. Please correct them and submit for re-checking.&#13;&#10;Thank you.</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="action" value="Not Correct" class="btn btn-primary">Save & Send</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>