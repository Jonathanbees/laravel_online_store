@extends('layouts.app')

@section('title', __('Edit Custom User'))

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header text-center">
                    <h4>{{ __('Edit User') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin-custom-user.update', ['id' => $viewData['user']->getId()]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name:') }}</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $viewData['user']->getName() }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email:') }}</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ $viewData['user']->getEmail() }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password:') }}</label>
                            <input type="password" id="password" name="password" class="form-control">
                            <small class="form-text text-muted">{{ __('Leave blank to keep the current password.') }}</small>
                        </div>
                        <div class="mb-3">
                            <label for="is_admin" class="form-label">{{ __('Is Admin:') }}</label>
                            <select id="is_admin" name="is_admin" class="form-select" required>
                                <option value="0" {{ !$viewData['user']->getIsAdmin() ? 'selected' : '' }}>{{ __('No') }}</option>
                                <option value="1" {{ $viewData['user']->getIsAdmin() ? 'selected' : '' }}>{{ __('Yes') }}</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection