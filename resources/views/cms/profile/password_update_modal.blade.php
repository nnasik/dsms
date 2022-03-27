<div class="modal fade" id="modal-password-change" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Change Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="/profile/updatepassword" method="post">
            @csrf
        <div class="modal-body">
            <div class="row mb-3">
                <label for="current_password" class="col-md-6 col-form-label text-md-end">{{ __('Current Password') }}</label>

                <div class="col-md-6">
                    <input id="current_password" type="password" class="form-control @error('password') is-invalid @enderror" name="current_password" required autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-3">
                <label for="password" class="col-md-6 col-form-label text-md-end">{{ __('New Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="new_password" required autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-3">
                <label for="password-confirm" class="col-md-6 col-form-label text-md-end">{{ __('Confirm New Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="confirm_password" required autocomplete="new-password">
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Change Password</button>
        </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>