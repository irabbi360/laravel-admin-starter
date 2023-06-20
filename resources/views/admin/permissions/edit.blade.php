@extends('layouts.master')
@section('content')

    <div class="card">
        <div class="card-header">
            Edit Permission
        </div>
        <form action="{{ route("admin.permissions.update", [$permission->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-2">
                    <label for="title">Title*</label>
                    <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', isset($permission) ? $permission->name : '') }}" required>
                    @error('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary me-2" type="submit">Update</button>
                <a class="btn btn-secondary" href="{{ route('admin.permissions.index') }}">
                    Back to list
                </a>
            </div>
        </form>
    </div>
@endsection

