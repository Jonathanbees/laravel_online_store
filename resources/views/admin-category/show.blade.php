@extends('layouts.app')

@section('title', $viewData['category']->getName().' - Online Store')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h4>{{ __('Category Details') }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>{{ __('ID:') }}</strong> {{ $viewData['category']->getId() }}</p>
                    <p><strong>{{ __('Name:') }}</strong> {{ $viewData['category']->getName() }}</p>
                    <p><strong>{{ __('Description:') }}</strong> {{ $viewData['category']->getDescription() }}</p>
                </div>
                <div class="card-footer text-center">
                    <form action="{{ route('admin-category.destroy', ['id'=> $viewData['category']->getId()]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection