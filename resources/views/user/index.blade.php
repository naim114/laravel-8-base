@extends('layouts.dashboard-master')

@section('page-title', trans('app.users'))
@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('users') }}">{{ trans('app.administration') }}</a> /
    <a>{{ trans('app.users') }}</a>
@stop

@section('content')
    <div class="container">
        <button class="btn btn-primary mb-2 addButton">
            + Add User
        </button>
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
                                src="{{ $user->avatar ?? asset(url('assets/img/default-profile-picture.png')) }}">
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
                                @if (has_permission('users.activity'))
                                    <li><a class="dropdown-item"
                                            href="{{ route('users.view', ['action' => 'activity', 'id' => $user->id]) }}">Activity
                                            Log</a>
                                    </li>
                                @endif
                                <li><a class="dropdown-item"
                                        href="{{ route('users.view', ['action' => 'profile', 'id' => $user->id]) }}">View
                                        User</a></li>
                                <li><a class="dropdown-item "
                                        href="{{ route('users.view', ['action' => 'edit', 'id' => $user->id]) }}">Edit
                                        User</a></li>
                                <li><button class="dropdown-item text-warning banButton" data-id="{{ $user->id }}"
                                        data-username="{{ $user->username }}"
                                        data-action="{{ $user->status == 'Active' ? 'Banned' : 'Active' }}"><b>{{ $user->status == 'Active' ? 'Ban User' : 'Activate User' }}</b></button>
                                </li>
                                <li><button class="dropdown-item text-danger deleteButton"
                                        data-id="{{ $user->id }}"><b>Delete
                                            User</b></button></li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    <!-- Add Modal -->
    @include('user.partials.add')

    <!-- Ban/Unban Modal -->
    @include('user.partials.ban')

    <!-- Delete Modal -->
    @include('user.partials.delete')

@stop

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        });

        // add modal
        $(".addButton").click(function() {
            $('#addModal').modal('show');
        });

        $(".closeAddModal").click(function() {
            $('#addModal').modal('hide');
        });

        // ban modal
        $(".banButton").click(function() {
            $('#banModal').modal('show');

            var username = $(this).data('username');
            var action = $(this).data('action');
            var id = $(this).data('id');

            $('#titleBanModal').text(action == 'Banned' ? 'Ban user' : 'Activate user');
            $('#textBanModal').text('Are you sure you want to change ' + username + ' status to ' + action);

            $('#idBanModal').val(id);
            $('#statusBanModal').val(action);
        });

        $(".closeBanModal").click(function() {
            $('#banModal').modal('hide');
        });

        // delete modal
        $(".deleteButton").click(function() {
            $('#deleteModal').modal('show');

            var id = $(this).data('id');
            $('#idDeleteModal').val(id);
        });

        $(".closeDeleteModal").click(function() {
            $('#deleteModal').modal('hide');
        });
    </script>
@endsection
