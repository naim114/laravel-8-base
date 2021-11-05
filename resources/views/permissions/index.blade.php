@extends('layouts.dashboard-master')

@section('page-title', trans('app.permissions'))
@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('roles') }}">{{ trans('app.roles-permissions') }}</a> /
    <a>{{ trans('app.permissions') }}</a>
@stop

@section('content')
    <div class="container">
        @error('name')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <button class="btn btn-primary mb-2 addButton">
            + Add Permission
        </button>
        <table id="permissionsTable" class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Display Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Removable</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->display_name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>{{ $permission->removable ? 'Yes' : 'No' }}</td>
                        <td>{{ $permission->created_at }}</td>
                        <td>
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false"><i class="fas fa-ellipsis-h fa-fw"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <button data-permission="{{ $permission }}" class="dropdown-item editButton">
                                        Edit Permission
                                    </button>
                                </li>
                                <li>
                                    <a href="{{ route('permissions_role', ['id' => $permission->id]) }}"
                                        class="dropdown-item">
                                        Edit Role List
                                    </a>
                                </li>
                                @if ($permission->removable)
                                    <li>
                                        <button data-permission="{{ $permission }}"
                                            class="dropdown-item text-danger deleteButton">
                                            Delete Permission
                                        </button>
                                    </li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    {{-- Add Modal --}}
    @include('permissions.partials.add')

    {{-- Edit Modal --}}
    @include('permissions.partials.edit')

    {{-- Delete Modal --}}
    @include('permissions.partials.delete')

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

        // edit modal
        $(".editButton").click(function() {
            $('#editModal').modal('show');

            var permission = $(this).data('permission');

            $('#editModalName').val(permission.name);
            $('#editModalId').val(permission.id);
            $('#editModalDisplayName').val(permission.display_name);
            $('#editModalDescription').val(permission.description);

            if (!permission.removable) {
                $("#editModalName").prop('disabled', true);
            } else {
                $("#editModalName").prop('disabled', false);
            }
        });

        $(".closeEditModal").click(function() {
            $('#editModal').modal('hide');
        });

        // delete modal
        $(".deleteButton").click(function() {
            $('#deleteModal').modal('show');

            var permission = $(this).data('permission');

            $('#deleteModalId').val(permission.id);
            $('#textBanModal').text('Are you sure you want to delete permission ' + permission.name +
                ' ?');
        });

        $(".closeDeleteModal").click(function() {
            $('#deleteModal').modal('hide');
        });
    </script>
@stop
