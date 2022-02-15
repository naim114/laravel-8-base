@extends('layouts.dashboard-master')

@section('page-title', trans('app.activity'))

@section('custom-head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
@stop

@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('profile') }}">{{ trans('app.account') }}</a> /
    <a>{{ trans('app.activity') }}</a>
@stop

@section('content')
    <div class="container">
        <table id="activityTable" class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Description</th>
                    <th scope="col">IP address</th>
                    <th scope="col">User agent</th>
                    <th scope="col">Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $activity->description }}</td>
                        <td>{{ $activity->ip_address }}</td>
                        <td>{{ $activity->user_agent }}</td>
                        <td>{{ $activity->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });
    </script>
@stop
