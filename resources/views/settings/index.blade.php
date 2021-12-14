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
                    @include('settings.partials.general')
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <div class="card p-4">
                    <div class="form-group">
                        @include('settings.partials.logo')
                        @include('settings.partials.favicon')
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
            $('#fileInputFavicon').val(null);
        });

        // front-end for logo button
        $(document).on("click", "#changeLogoButton", function() {
            $("#inputFileButtonLogo").removeClass('hide');
            $("#cancelChangeLogoButton").removeClass('hide');
            $("#submitLogoButton").removeClass('hide');
            $("#guideMsgLogo").removeClass('hide');

            $("#changeLogoButton").addClass('hide');
        });

        $(document).on("click", "#cancelChangeLogoButton", function() {
            $("#inputFileButtonLogo").addClass('hide');
            $("#cancelChangeLogoButton").addClass('hide');
            $("#submitLogoButton").addClass('hide');
            $("#guideMsgLogo").addClass('hide');

            $("#changeLogoButton").removeClass('hide');
            $('#fileInputLogo').val(null);
        });

        $(document).on("click", ".browseLogo", function() {
            var fileLogo = $(this).parents().find(".fileLogo");
            fileLogo.trigger("click");
        });

        $('#fileInputLogo').change(function(e) {
            var fileName = e.target.files[0].name;
            console.log(fileName);
            $("#fileLogo").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("previewLogo").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });

        // front-end for favicon button
        $(document).on("click", "#changeFaviconButton", function() {
            $("#inputFileButtonFavicon").removeClass('hide');
            $("#cancelChangeFaviconButton").removeClass('hide');
            $("#submitFaviconButton").removeClass('hide');
            $("#guideMsgFavicon").removeClass('hide');

            $("#changeFaviconButton").addClass('hide');
        });

        $(document).on("click", "#cancelChangeFaviconButton", function() {
            $("#inputFileButtonFavicon").addClass('hide');
            $("#cancelChangeFaviconButton").addClass('hide');
            $("#submitFaviconButton").addClass('hide');
            $("#guideMsgFavicon").addClass('hide');

            $("#changeFaviconButton").removeClass('hide');
            $('#fileInputFavicon').val(null);
        });

        $(document).on("click", ".browseFavicon", function() {
            var fileFavicon = $(this).parents().find(".fileFavicon");
            fileFavicon.trigger("click");
        });

        $('#fileInputFavicon').change(function(e) {
            var fileName = e.target.files[0].name;
            console.log(fileName);
            $("#fileFavicon").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("previewFavicon").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@stop
