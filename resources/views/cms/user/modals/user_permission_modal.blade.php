<div class="modal fade" id="modal-user-permission" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">User Permissions</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="/user/addpermission" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{$user->id}}">
        <div class="modal-body">
            <div class="row mb-3">
                <label for="permission" class="col-md-4 col-form-label text-md-end">{{ __('Permission') }}</label>
                <div class="col-md-8">
                    <select class="form-control" name="permission" id="permission">
                        @foreach($permissions as $permission)
                        <option value="{{$permission->name}}">{{$permission->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add Permission</button>
        </div>
        </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>