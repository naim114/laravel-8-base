<div class="card">
    <div class="container p-4">
        <div class="col">
            <h4>Latest Registration</h4>
            <ul class="list-group list-group-flush mt-3">
                @foreach ($latest_regis as $user)
                    <li class="list-group-item list-group-item-action">
                        <div class="row">
                            <div class="col-3">
                                <img id="preview" class="rounded-circle img-thumbnail" style="height: 50px; width: 50px"
                                    src="{{ $user->avatar ?? asset(url('assets/img/default-profile-picture.png')) }}">
                            </div>
                            <div class="col-9">
                                <h5>{{ $user->username }}</h5>
                                <small>{{ $user->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
