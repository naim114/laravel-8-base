<div class="text-center">
    <form method="POST" enctype="multipart/form-data" action="{{ route('profile.avatar') }}">
        @csrf
        <img id="preview" class="rounded-circle img-thumbnail" style="height: 150px; width: 150px"
            src="{{ $user->avatar ?? asset(url('assets/img/default-profile-picture.png')) }}">

        <h5 class="text-muted mt-2">{{ $user->username ?? 'No Username' }}</h5>

        <button type="button" id="changeAvatarButton" class="btn btn-secondary btn-block mt-3 w-100">
            <i class="fa fa-camera pr-2 pl-2"></i>
            Change Avatar
        </button>

        <p id="guideMsg" class="text-secondary hide">* Upload image and save changes to change profile picture</p>

        <input type="file" id="fileInput" name="avatar" class="file hide" accept="image/*" required>
        <input type="text" class="form-control hide" disabled placeholder="Upload File" id="file">
        <button type="button" id="inputFileButton" class="browse btn btn-secondary btn-block mt-3 w-100 hide">
            <i class="fa fa-upload pr-2 pl-2"></i>
            Upload Image
        </button>

        <button type="button" id="cancelChangeAvatarButton" class="btn btn-outline-danger btn-block mt-3 w-100 hide">
            <i class="fa fa-times pr-2 pl-2"></i>
            Cancel Changes
        </button>

        <button type="submit" id="submitAvatarButton" class="btn btn-primary btn-block mt-3 w-100 hide">
            <i class="fa fa-camera pr-2 pl-2"></i>
            Save Changes
        </button>
    </form>
</div>
