<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label>Username</label>
            <input type="text" value="{{ $user->username }}" class="form-control" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="full_name">Full Name</label>
            <input type="text" name="full_name" value="{{ $user->full_name }}" class="form-control" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="phone">Phone Number</label>
            <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="country">Country</label>
            <input type="text" name="country" value="{{ $country->name ?? null }}" class="form-control" disabled>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label>Email</label>
            <input type="text" value="{{ $user->email }}" class="form-control" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="birthday">Date of Birth (MM-DD-YYYY)</label>
            <input type="date" id="bithdayInput" name="birthday" value="{{ $birthday }}" class="form-control"
                min="1800-01-01" disabled>
        </div>
        <div class="form-group mb-3">
            <label for="address">Address</label>
            <input type="text" name="address" value="{{ $user->address }}" class="form-control" disabled>
        </div>
    </div>
</div>
