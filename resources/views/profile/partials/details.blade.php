<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="full_name">Full Name</label>
            <input type="text" value="{{ $user->full_name }}" class="form-control" placeholder="Enter Full Name">
        </div>
        <div class="form-group mb-3">
            <label for="phone">Phone Number</label>
            <input type="text" value="{{ $user->phone }}" class="form-control" placeholder="Enter Phone Number">
        </div>
        <div class="form-group mb-3">
            <label for="full_name">Country</label>
            <select class="form-control">
                <option value="{{ null }}" selected>Please select a country</option>
                @foreach ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="birthday">Date of Birth</label>
            <input type="date" value="{{ $user->birthday }}" class="form-control" placeholder="Enter Date of Birth">
        </div>
        <div class="form-group mb-3">
            <label for="address">Address</label>
            <input type="text" value="{{ $user->address }}" class="form-control" placeholder="Enter Address">
        </div>
    </div>
</div>
<div class="d-flex flex-row-reverse">
    <button type="button" class="btn btn-primary float-right">
        Update Profile Details
    </button>
</div>
