@extends('layouts.dashboard-master')

@section('page-title', trans('app.users.view'))

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('users') }}">{{ trans('app.administration') }}</a> /
    <a href="{{ route('users') }}">{{ trans('app.users') }}</a> /
    <a>{{ trans('app.users.view') }}</a>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 pt-2 pb-2">
                <div class="card">
                    <div class="card-body">
                        @include('user.partials.view.avatar')
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-6 pt-2 pb-2">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5>Profile details</h5>
                    </div>
                    <div class="card-body">
                        @include('user.partials.view.details')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
