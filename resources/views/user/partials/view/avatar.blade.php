<div class="text-center">
    <img id="preview" class="rounded-circle img-thumbnail" style="height: 150px; width: 150px"
        src="{{ $user->avatar ?? asset(url('assets/img/default-profile-picture.png')) }}">

    <h5 class="text-muted mt-2">{{ $user->username ?? 'No Username' }}</h5>
</div>
