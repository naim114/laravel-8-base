<div class="row">
    <div class="form-group mb-3">
        <label for="username">New Username</label>
        <input type="text" value="{{ $user->username }}" class="form-control" placeholder="Enter Username">
    </div>
    <div class="form-group mb-3">
        <label for="new_password">New Password</label>
        <input type="password" value="" class="form-control" placeholder="Enter New Password">
    </div>
    <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="text" value="{{ $user->email }}" class="form-control" placeholder="Enter Current Email">
    </div>
    <div class="form-group mb-3">
        <label for="password">Current Password</label>
        <input type="password" value="" class="form-control" placeholder="Enter Current Password">
    </div>

</div>
<div class="d-flex flex-row-reverse">
    <button type="button" class="btn btn-primary float-right">
        Update Login Details
    </button>
</div>
