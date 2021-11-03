<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('users.delete') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">
                        Delete Account
                    </h5>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this account? To retrieve this data back please contact the
                    developers.
                    <input id="idDeleteModal" name="id" hidden />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeDeleteModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
