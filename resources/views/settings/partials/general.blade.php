<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    <div class="form-group">
        <h5>Application Name</h5>
        <input type="text" name="app_name" class="form-control mt-3 mb-3" placeholder="Enter Application Name"
            value="{{ trans('app.app-name') }}">
        <h5>Copyright URL</h5>
        <input type="text" name="copyright" class="form-control mt-3 mb-3" placeholder="Enter Copyright URL"
            value="{{ trans('app.copyright') }}">
        <h5>Privacy & Policy URL</h5>
        <input type="text" name="privacy_policy" class="form-control mt-3 mb-3"
            placeholder="Enter Privacy & Policy URL" value="{{ trans('app.privacy-policy') }}">
        <h5>Terms & Conditions URL</h5>
        <input type="text" name="terms_conditions" class="form-control mt-3 mb-3"
            placeholder="Enter Terms & Conditions URL" value="{{ trans('app.terms-conditions') }}">
        <div class="d-flex flex-row-reverse mt-3">
            <button type="submit" class="btn btn-primary float-right">
                Save Changes
            </button>
        </div>
    </div>
</form>
