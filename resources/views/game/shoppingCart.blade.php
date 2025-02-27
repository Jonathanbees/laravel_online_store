@extends('layouts.app')

@section('title', __('Shopping Cart'))

@section('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container mt-4">
    @if(count($viewData['games']) > 0)
        <div class="d-flex justify-content-center mb-3">
            <form action="{{ route('order.create') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">{{ __('Order Now') }}</button>
            </form>
        </div>
        <div class="list-group">
            <div class="list-group-item list-group-item-action active">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-1">{{ __('Game ID') }}</h5>
                    <strong class="text-muted">{{ __('Name') }}</strong>
                    <strong class="text-muted">{{ __('Price') }}</strong>
                </div>
            </div>
            @foreach ($viewData['games'] as $game)
                <a href="{{ route('game.show', ['id' => $game->getId()]) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-1">{{ $game->getId() }}</h5>
                        <small class="text-muted">{{ $game->getName() }}</small>
                        <small class="text-muted">{{ $game->getPrice() }}$</small>
                    </div>
                </a>
            @endforeach
            <div class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-1">{{ __('Total') }}</h5>
                    <strong class="text-muted"></strong>
                    <strong class="text-muted">{{ $viewData['totalPrice'] }}$</strong>
                </div>
            </div>
        </div>
    @else
        <h1 class="text-center">{{ __('Your shopping cart is empty.') }}</h1>
    @endif
</div>
@endsection