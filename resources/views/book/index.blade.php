@extends('layouts.main')

@section('title', __('book.title'))

@section('content')

<div class="mx-5">
    <h1>{{ __('book.title') }}</h1>

    <div class="row">
        <div class="col-lg-2">
            <a class="btn btn-secondary w-100 text-capitalize"
                href="/">{{ __('_actions.back') }}</a>
        </div>

        <div class="col-lg-2">
            <a class="btn btn-primary w-100"
                href="{{ route('book.create') }}">{{ __('_actions.btn_create') }}</a>
        </div>

        <div class="col-lg-3 row">
            <form action="{{ route('book.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="{{ __('_actions.type_here') }}"
                        aria-label="{{ __('_actions.type_here') }}" name="search" value="{{ $search ?? '' }}"
                        aria-describedby="button-search" autocomplete="off">
                    <button class="btn btn-outline-secondary" type="submit" id="button-search">
                        {{ __('_actions.btn_search') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if ($books->isEmpty())
        <div class="alert alert-info my-3 mx-0" role="info">
            <i class="bi bi-info-circle"></i> {{ __('book.empty') }}
        </div>

    @else
    <div class="row text-center">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('book.table.id') }}</th>
                    <th>{{ __('book.table.name') }}</th>
                    <th>{{ __('book.table.author_name') }}</th>
                    <th>{{ __('book.table.register_number') }}</th>
                    <th>{{ __('book.table.genre') }}</th>
                    <th>{{ __('_actions.table.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books ?? [] as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author_name }}</td>
                        <td>{{ $book->register_number }}</td>
                        <td>{{ __("book.genres.{$book->genre}") }}</td>
                        <td>
                            <div class="d-inline-flex">
                                <a class="btn btn-secondary mx-1" href="{{ route('book.edit', $book->id) }}">
                                    {{ __('_actions.table.edit') }}
                                </a>
                                {{-- sometimes a soft delete?  --}}
                                <form action="{{ route('book.delete', $book->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger mx-1" type="submit">
                                        {{ __('_actions.table.delete') }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>

@endsection
