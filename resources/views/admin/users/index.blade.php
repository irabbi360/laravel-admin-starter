@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="card-header">
            User List
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
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Roles
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Register At
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>
                                {{ $user->id ?? '' }}
                            </td>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            <td>
                                @foreach($user->getRoleNames() as $key => $item)
                                    <span class="badge bg-info">{{ $item }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($user->status)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Blocked</span>
                                @endif
                            </td>
                            <td>
                                {{ $user->created_at->format('Y-m-d') ?? '' }}
                            </td>
                            <td>
                                @if (auth()->user()->hasRole('Admin'))
                                @if($user->status)
                                    <a href="{{ route('admin.user.banUnban', ['id' => $user->id, 'status' => 0]) }}" class="badge bg-danger">Block</a>
                                @else
                                    <a href="{{ route('admin.user.banUnban', ['id' => $user->id, 'status' => 1]) }}" class="badge bg-info">Unblock</a>
                                @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            {{ $users->links() }}
        </div>
    </div>
@endsection
