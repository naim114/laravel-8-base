<form method="POST" action="{{ route('profile.update_auth') }}">
    @csrf
    <div class="row">
        <div class="form-group mb-3">
            <label for="username">New Username</label>
            <input type="text" name="username" value="{{ $user->username }}" class="form-control"
                placeholder="Enter Username" required>
        </div>
        <div class="form-group mb-3">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" value="" class="form-control" placeholder="Enter New Password"
                required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ $user->email }}" class="form-control"
                placeholder="Enter Current Email" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Current Password</label>
            <input type="password" name="password" value="" class="form-control" placeholder="Enter Current Password"
                required>
        </div>

    </div>
    <div class="d-flex flex-row-reverse">
        <button type="submit" class="btn btn-primary float-right">
            Update Login Details
        </button>
    </div>
</form>
