@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Profile
    </div>

    <div class="card-body">
        <form action="{{ route("admin.password.update") }}" method="POST" enctype="multipart/form-data" id="permission-update-form">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title">Old Password*</label>
                <input type="password" id="title" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="old password" required>
                @error('old_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">New Password*</label>
                <input type="password" id="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New password" required>
                @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password_confirmation">Confirm Password*</label>
                <input type="password" id="password_confirmation" name="new_password_confirmation" class="form-control" placeholder="Confirm New Password" required>
            </div>
            <div>
                <button class="btn btn-primary me-2" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

