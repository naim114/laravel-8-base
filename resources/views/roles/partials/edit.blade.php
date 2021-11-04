<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('roles.edit') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">
                        Edit Role
                    </h5>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" id="editModalName"
                            placeholder="Enter name">
                        <input name="id" type="text" id="editModalId" hidden>
                    </div>
                    <div class="form-group mb-2">
                        <label>Display name</label>
                        <input name="display_name" type="text" class="form-control" id="editModalDisplayName"
                            placeholder="Enter display name">
                    </div>
                    <div class="form-group mb-2">
                        <label>Description</label>
                        <input name="description" type="text" class="form-control" id="editModalDescription"
                            placeholder="Enter description">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeEditModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
