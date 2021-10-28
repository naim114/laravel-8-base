@extends('layouts.dashboard-master')

@section('page-title', trans('app.profile'))

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
    <a href="{{ route('profile') }}">{{ trans('app.account') }}</a> /
    <a>{{ trans('app.profile') }}</a>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 pt-2 pb-2">
                <div class="card">
                    <div class="card-body">
                        @include('profile.partials.avatar')
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 pt-2 pb-2">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Profile details</h5>
                    </div>
                    <div class="card-body">
                        @include('profile.partials.details')
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5>Login details</h5>
                    </div>
                    <div class="card-body">
                        @include('profile.partials.auth')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#fileInput').val(null);
        });

        $(document).on("click", "#changeAvatarButton", function() {
            $("#inputFileButton").removeClass('hide');
            $("#cancelChangeAvatarButton").removeClass('hide');
            $("#submitAvatarButton").removeClass('hide');
            $("#changeAvatarButton").addClass('hide');
        });

        $(document).on("click", "#cancelChangeAvatarButton", function() {
            $("#inputFileButton").addClass('hide');
            $("#cancelChangeAvatarButton").addClass('hide');
            $("#submitAvatarButton").addClass('hide');
            $("#changeAvatarButton").removeClass('hide');
            $('#fileInput').val(null);
        });

        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });

        $('#fileInput').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("preview").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@stop
