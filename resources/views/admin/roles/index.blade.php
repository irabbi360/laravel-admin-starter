@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header">
            Role List
            @can('role_create')
                <a class="btn btn-success btn-sm text-white float-end" href="{{ route("admin.roles.create") }}">
                    Add New
                </a>
            @endcan
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Permissions
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $key => $role)
                        <tr data-entry-id="{{ $role->id }}">
                            <td>
                                {{ $role->id ?? '' }}
                            </td>
                            <td>
                                {{ $role->name ?? '' }}
                            </td>
                            <td>
                                @foreach($role->permissions as $key => $item)
                                    <span class="badge bg-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('role_show')
                                    <a class="btn btn-xs btn-primary mb-1" href="{{ route('admin.roles.show', $role->id) }}">
                                        View
                                    </a>
                                @endcan

                                @can('role_edit')
                                    <a class="badge bg-info" href="{{ route('admin.roles.edit', $role->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('role_delete')
                                    <a href="javascript:void(0)" class="badge bg-danger text-white" onclick="
                                        if(confirm('Are you sure, You want to Delete this ??'))
                                        {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{ $role->id }}').submit();
                                        }">Delete
                                    </a>
                                    <form id="delete-form-{{ $role->id }}" method="post"
                                          action="{{ route('admin.roles.destroy', $role->id) }}" style="display: none">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            {{ $roles->links() }}
        </div>
    </div>
@endsection
