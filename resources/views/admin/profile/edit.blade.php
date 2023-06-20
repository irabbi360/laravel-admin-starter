@extends('layouts.master')
@section('content')

<div class="card">
    <div class="card-header">
        Edit Profile
    </div>

    <div class="card-body">
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title">Name*</label>
                <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', isset($profile) ? $profile->name : '') }}" required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email*</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', isset($profile) ? $profile->email : '') }}" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <button class="btn btn-primary me-2" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

