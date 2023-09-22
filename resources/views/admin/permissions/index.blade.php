@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="float-start">
                Permission List
            </div>
            @can('permission_create')
                <div class="float-end">
                    <a class="btn btn-success btn-sm text-white" href="{{ route("admin.permissions.create") }}">
                        Add Permission
                    </a>
                </div>
            @endcan
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th width="10"></th>
                        <th>
                            ID
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions as $key => $permission)
                        <tr data-entry-id="{{ $permission->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $permission->id ?? '' }}
                            </td>
                            <td>
                                {{ $permission->name ?? '' }}
                            </td>
                            <td>
                                @can('permission_edit')
                                    <a class="badge bg-info"
                                       href="{{ route('admin.permissions.edit', $permission->id) }}">
                                        Edit
                                    </a>
                                @endcan

                                @can('permission_delete')
                                    <form id="delete-form-{{ $permission->id }}" method="post"
                                          action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                          style="display: none">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                    </form>
                                    <a href="javascript:void(0)" class="badge bg-danger text-white" onclick="
                                        if(confirm('Are you sure, You want to Delete this ??'))
                                        {
                                        event.preventDefault();
                                        document.getElementById('delete-form-{{ $permission->id }}').submit();
                                        }">Delete
                                    </a>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
