<div class="row">
    <div class="col-lg-3">
        <div class="card-box bg-blue">
            <div class="inner">
                <h3>{{ $users_count }}</h3>
                <p>Overall Users Count</p>
            </div>
            <div class="icon">
                <i class="fa fa-users" aria-hidden="true"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="card-box bg-green">
            <div class="inner">
                <h3>{{ $users_this_month }}</h3>
                <p>New Users This Month</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card-box bg-red">
            <div class="inner">
                <h3>{{ $banned_users }}</h3>
                <p>Banned Users</p>
            </div>
            <div class="icon">
                <i class="fa fa-ban"></i>
            </div>
        </div>
    </div>
</div>
