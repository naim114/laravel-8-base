@extends('layouts.dashboard-master')

@section('page-title', trans('app.role-list'))
@section('user-name', Auth::user()->username)

@section('breadcrumb')
    <a href="{{ route('roles') }}">{{ trans('app.roles-permissions') }}</a> /
    <a href="{{ route('permissions') }}">{{ trans('app.permissions') }}</a> /
    <a>{{ trans('app.role-list') }}</a>
@stop

@section('content')
    <div class="container">
        <button class="btn btn-primary mb-2 addButton">
            + Add Role to List
        </button>

        <table id="permissionsTable" class="table table-striped table-hover table-responsive">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Display Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $role)
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <a data-id="{{ $role->id }}" data-name="{{ $role->name }}" class="nav-link deleteButton">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    {{-- Add Modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('permissions_role.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">
                            Add Role to List
                        </h5>
                    </div>
                    <div class="modal-body">
                        Choose role to add to the list

                        <select name="role_id" class="mt-2 form-control" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                            @endforeach
                        </select>
                        <input name="permission_id" value="{{ $permission->id }}" hidden />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeAddModal" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Delete Modal --}}
    @include('permissions.partials.permission-role.delete')

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

        // delete modal
        $(".deleteButton").click(function() {
            $('#deleteModal').modal('show');

            var id = $(this).data('id');
            var name = $(this).data('name');

            $('#deleteModalRoleId').val(id);
            $('#textDeleteModal').text('Are you sure you want to delete role ' + name +
                ' from this permission list?');
        });

        $(".closeDeleteModal").click(function() {
            $('#deleteModal').modal('hide');
        });
    </script>
@stop
