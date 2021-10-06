@extends('layouts.dashboard-master')

@section('page-title', trans('app.dashboard'))
@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('dashboard') }}">Dashboard</a> /
    <a>Dashboard</a>
@stop

@section('content')
    <p>Only admin can view this page</p>
@stop
