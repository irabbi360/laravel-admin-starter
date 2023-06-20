@extends('layouts.master')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Role
        </div>
        <form action="{{ route("admin.roles.update", [$role->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="title">Title*</label>
                    <input type="text" id="title" name="name" class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="permissions">Permissions*
                        <span class="btn btn-info btn-sm select-all">Select All</span>
                        <span class="btn btn-info btn-sm deselect-all">Deselect all</span></label>
                    <select name="permissions[]" id="permissions"
                            class="form-control select2 @error('permissions') is-invalid @enderror" multiple="multiple"
                            required>
                        @foreach($permissions as $id => $permissions)
                            <option
                                value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permissions }}</option>
                        @endforeach
                    </select>
                    @error('permissions'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary me-2" type="submit">Update</button>
                <a class="btn btn-secondary" href="{{ route('admin.roles.index') }}">
                    Back to list
                </a>
            </div>
        </form>
    </div>
@endsection


@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

        $(document).ready(function () {
            $('.select-all').click(function () {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', 'selected')
                $select2.trigger('change')
            })
            $('.deselect-all').click(function () {
                let $select2 = $(this).parent().siblings('.select2')
                $select2.find('option').prop('selected', '')
                $select2.trigger('change')
            })

            $(".select2").select2({
                tags: true
            });
        });
    </script>

@endsection
