@extends('layouts.dashboard-master')

@section('page-title', trans('app.general'))
@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('settings') }}">{{ trans('app.settings') }}</a> /
    <a>{{ trans('app.general') }}</a>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card p-4">
                    <form method="POST" action="{{ route('settings.app_name') }}">
                        @csrf
                        <div class="form-group">
                            <h5>Application Name</h5>
                            <input type="text" name="app_name" class="form-control mt-3" placeholder="Enter Application Name"
                                value="{{ $app_name }}">
                            <div class="d-flex flex-row-reverse mt-3">
                                <button type="submit" class="btn btn-primary float-right">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
