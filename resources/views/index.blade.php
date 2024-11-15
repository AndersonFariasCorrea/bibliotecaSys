@extends('layouts.main')

@section('title', __('home.title'))

@section('content')
    <h1>{{ __('home.welcome') }}</h1>
    <p>{{ __('home.description') }}</p>

    <div class="container text-center">
        <div class="row">
            <div class="col-lg-4 mb-3">
                <a href="#">{{-- <a href="{{ route('loans.index') }}"> --}}
                    <div class="p-3 action-item">
                        <h2>{{ __('loans.title') }}</h2>
                        <p>{{ __('loans.description') }}</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <a href="#">{{-- <a href="{{ route('users.index')}}"> --}}
                    <div class="p-3 action-item">
                        <h2>{{ __('users.title') }}</h2>
                        <p>{{ __('users.description') }}</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <a href="#">{{-- <a href="{{ route('books.index')}}"> --}}
                    <div class="p-3 action-item">
                        <h2>{{ __('books.title') }}</h2>
                        <p>{{ __('books.description') }}</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 mb-3">
                <a href="#">{{-- <a href="{{ route('genders.index')}}"> --}}
                    <div class="p-3 action-item">
                        <h2>{{ __('genders.title') }}</h2>
                        <p>{{ __('genders.description') }}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
