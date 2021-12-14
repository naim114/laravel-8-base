<form method="POST" enctype="multipart/form-data" action="{{ route('settings.favicon') }}">
    @csrf
    <h5>Favicon</h5>
    <div class="text-center">
        <img id="previewFavicon" class="img-thumbnail mt-3 mb-3" src="{{ asset(trans('app.favicon')) }}"
            style="height: 200px">
        <button type="button" id="changeFaviconButton" class="btn btn-secondary btn-block mt-3 w-100">
            <i class="fa fa-camera pr-2 pl-2"></i>
            Change Favicon
        </button>

        <p id="guideMsgFavicon" class="text-secondary hide">
            * Upload image and update favicon.
        </p>

        <input type="file" id="fileInputFavicon" name="favicon" class="fileFavicon hide" accept="image/*" required>
        <input type="text" class="form-control hide" disabled placeholder="Upload File" id="fileFavicon">
        <button type="button" id="inputFileButtonFavicon"
            class="browseFavicon btn btn-secondary btn-block mt-3 w-100 hide">
            <i class="fa fa-upload pr-2 pl-2"></i>
            Upload Image
        </button>
    </div>
    <button type="submit" class="btn btn-primary btn-block mt-3 mb-5 w-100">
        Update Favicon
    </button>
</form>
