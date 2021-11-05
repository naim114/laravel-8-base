<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('permissions_role.delete') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">
                        Delete Role from List
                    </h5>
                </div>
                <div class="modal-body">
                    <p id="textDeleteModal"></p>
                    <input name="permission_id" value="{{ $permission->id }}" type="text" id="deleteModalPermissionId"
                        hidden>
                    <input name="role_id" type="text" id="deleteModalRoleId" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeDeleteModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
