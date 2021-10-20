@extends('layouts.dashboard-master')

@section('page-title', trans('app.users'))
@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('dashboard') }}">User</a> /
    <a>Manage</a>
@stop

@section('content')
    <p>List of user here</p>
@stop
