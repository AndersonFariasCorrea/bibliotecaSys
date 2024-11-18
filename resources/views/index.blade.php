@extends('layouts.main')

@section('title', __('home.title'))

@section('content')
<div class="mx-5">
    <h1>{{ __('home.welcome') }}</h1>
    {!! __('home.description') !!}
</div>

<div class="row mt-5 mx-5 text-center">
    <div class="col-lg-4 mb-3">
        <a href="{{ route('loan.index') }}">
            <div class="p-3 action-item">
                <h2>{{ __('loan.title') }}</h2>
                <p>{{ __('loan.description') }}</p>
            </div>
        </a>
    </div>
    <div class="col-lg-4 mb-3">
        <a href="{{ route('user.index') }}">
            <div class="p-3 action-item">
                <h2>{{ __('user.title') }}</h2>
                <p>{{ __('user.description') }}</p>
            </div>
        </a>
    </div>
    <div class="col-lg-4 mb-3">
        <a href="{{ route('book.index') }}">
            <div class="p-3 action-item">
                <h2>{{ __('book.title') }}</h2>
                <p>{{ __('book.description') }}</p>
            </div>
        </a>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
