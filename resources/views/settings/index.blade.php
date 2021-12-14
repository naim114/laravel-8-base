@extends('layouts.dashboard-master')

@section('page-title', trans('app.general'))

@section('custom-head')
    <style>
        .hide {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0;
        }

    </style>
@stop

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('settings') }}">{{ trans('app.settings') }}</a> /
    <a>{{ trans('app.general') }}</a>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-2">
                <div class="card p-4">
                    <form method="POST" action="{{ route('settings.update') }}">
                        @csrf
                        <div class="form-group">
                            <h5>Application Name</h5>
                            <input type="text" name="app_name" class="form-control mt-3 mb-3"
                                placeholder="Enter Application Name" value="{{ trans('app.app-name') }}">
                            <h5>Copyright</h5>
                            <input type="text" name="copyright" class="form-control mt-3 mb-3"
                                placeholder="Enter Application Name" value="{{ trans('app.copyright') }}">
                            <h5>Privacy & Policy URL</h5>
                            <input type="text" name="privacy_policy" class="form-control mt-3 mb-3"
                                placeholder="Enter Application Name" value="{{ trans('app.privacy-policy') }}">
                            <h5>Terms & Conditions URL</h5>
                            <input type="text" name="terms_conditions" class="form-control mt-3 mb-3"
                                placeholder="Enter Application Name" value="{{ trans('app.terms-conditions') }}">
                            <div class="d-flex flex-row-reverse mt-3">
                                <button type="submit" class="btn btn-primary float-right">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="card p-4">
                    <div class="form-group">
                        <h5>Logo</h5>
                        <div class="text-center">
                            <img id="previewLogo" class="img-thumbnail mt-3 mb-3" src="{{ asset(trans('app.logo')) }}">
                            <button type="button" id="changeLogoButton" class="btn btn-secondary btn-block mt-3 w-100">
                                <i class="fa fa-camera pr-2 pl-2"></i>
                                Change Logo
                            </button>

                            <p id="guideMsg" class="text-secondary hide">* Upload image and update logo</p>

                            <input type="file" id="fileInputLogo" name="logo" class="fileLogo hide" accept="image/*"
                                required>
                            <input type="text" class="form-control hide" disabled placeholder="Upload File" id="fileLogo">
                            <button type="button" id="inputFileButton"
                                class="browse btn btn-secondary btn-block mt-3 w-100 hide">
                                <i class="fa fa-upload pr-2 pl-2"></i>
                                Upload Image
                            </button>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3 mb-5 w-100">
                            Update Logo
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        // onready function
        $(document).ready(function() {
            // reset fileInputLogo value onready
            $('#fileInputLogo').val(null);

            // reset fileInputFavicon value onready
            $('#fileInputFavicon').val(null);
        });

        // front-end for logo button
        $(document).on("click", "#changeLogoButton", function() {
            $("#inputFileButton").removeClass('hide');
            $("#cancelChangeLogoButton").removeClass('hide');
            $("#submitLogoButton").removeClass('hide');
            $("#guideMsg").removeClass('hide');

            $("#changeLogoButton").addClass('hide');
        });

        $(document).on("click", "#cancelChangeLogoButton", function() {
            $("#inputFileButton").addClass('hide');
            $("#cancelChangeLogoButton").addClass('hide');
            $("#submitLogoButton").addClass('hide');
            $("#guideMsg").addClass('hide');

            $("#changeLogoButton").removeClass('hide');
            $('#fileInputLogo').val(null);
        });

        $(document).on("click", ".browse", function() {
            var fileLogo = $(this).parents().find(".fileLogo");
            fileLogo.trigger("click");
        });

        $('#fileInputLogo').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#fileLogo").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("previewLogo").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@stop
