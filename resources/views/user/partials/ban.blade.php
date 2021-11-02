<div class="modal fade" id="banModal" tabindex="-1" role="dialog" aria-labelledby="banModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('users.ban') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="banModalLabel">
                        <p id="titleBanModal"></p>
                    </h5>
                </div>
                <div class="modal-body">
                    <p id="textBanModal"></p>
                    <input id="idBanModal" name="id" hidden />
                    <input id="statusBanModal" name="status" hidden />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary closeBanModal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
