@extends('layouts.dashboard-master')

@section('page-title', trans('app.users'))
@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('users') }}">{{ trans('app.administration') }}</a> /
    <a>{{ trans('app.users') }}</a>
@stop

@section('content')
    <div class="container">
        <table id="usersTable" class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Username</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Registration Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row" class="text-center">
                            <img id="preview" class="rounded-circle img-thumbnail" style="height: 50px; width: 50px"
                                src="{{ $user->avatar ?? url('assets/img/default-profile-picture.png') }}">
                        </th>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td class=" {{ $user->status == 'Active' ? 'text-success' : 'text-danger' }}">
                            <b>{{ $user->status }}</b>
                        </td>
                        <td class="text-center">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item"
                                        href="{{ route('users.user_activity', ['id' => $user->id]) }}">Activity
                                        Log</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('users.view', ['action' => 'profile', 'id' => $user->id]) }}">View
                                        User</a></li>
                                <li><a class="dropdown-item"
                                        href="{{ route('users.view', ['action' => 'edit', 'id' => $user->id]) }}">Edit
                                        User</a></li>
                                <li><a class="dropdown-item text-danger" href="#">Delete User</a></li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop
