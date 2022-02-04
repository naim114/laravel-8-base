<form method="POST" action="{{ route('settings.color') }}">
    @csrf
    <h4 class="mb-4">Application Colors</h4>

    <div class="row align-items-center">
        <div class="col-md-4">
            <h5>Primary Color: </h5>
        </div>
        <div class="col-md-8">
            <input type="color" value="{{ trans('app.color.primary.hex') }}" name="primary_color"
                class="m-2">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-4">
            <h5>Secondary Color: </h5>
        </div>
        <div class="col-md-8">
            <input type="color" value="{{ trans('app.color.secondary.hex') }}" name="secondary_color"
                class="m-2" value="">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-4">
            <h5>Success Color: </h5>
        </div>
        <div class="col-md-8">
            <input type="color" value="{{ trans('app.color.success.hex') }}" name="success_color"
                class="m-2" value="">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-4">
            <h5>Info Color: </h5>
        </div>
        <div class="col-md-8">
            <input type="color" value="{{ trans('app.color.info.hex') }}" name="info_color" class="m-2"
                value="">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-4">
            <h5>Warning Color: </h5>
        </div>
        <div class="col-md-8">
            <input type="color" value="{{ trans('app.color.warning.hex') }}" name="warning_color"
                class="m-2" value="">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-4">
            <h5>Danger Color: </h5>
        </div>
        <div class="col-md-8">
            <input type="color" value="{{ trans('app.color.danger.hex') }}" name="danger_color" class="m-2"
                value="">
        </div>
    </div>

    <div class="d-flex flex-row-reverse mt-3">
        <button type="submit" class="btn btn-primary float-right">
            Save Changes
        </button>
        <a class="btn btn-warning float-right openDefaultColorModal" style="margin-right: 10px">
            Back to Default
        </a>
    </div>
</form>
