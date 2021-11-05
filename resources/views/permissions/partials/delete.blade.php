<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('permissions.delete') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">
                        Delete Permission
                    </h5>
                </div>
                <div class="modal-body">
                    <p id="textBanModal"></p>
                    <input name="id" type="text" id="deleteModalId" hidden>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeDeleteModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
