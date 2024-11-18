@extends('layouts.main')

@section('title', __('loan.title'))

@section('content')
<h1 class="mx-5">{{ __('loan.title') }}</h1>

<div class="row mx-5">
    <div class="col-lg-2">
        <a class="btn btn-secondary w-100 text-capitalize"
            href="/">{{ __('_actions.back') }}</a>
    </div>
    <div class="col-lg-2">
        <a class="btn btn-primary w-100"
            href="{{ route('loan.create') }}">{{ __('_actions.btn_create') }}</a>
    </div>
    <div class="col-lg-3 row">
        <form action="{{ route('loan.index') }}" method="GET">
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

@if (empty($loans))
    <div class="alert alert-info my-3 mx-0" role="info">
        <i class="bi bi-info-circle"></i> {{ __('loan.empty') }}
    </div>

@else
<div class="row text-center mx-5">
    <table class="table">
        <thead>
            <tr>
                <th>{{ __('loan.table.id') }}</th>
                <th>{{ __('loan.table.user_fullname') }}</th>
                <th>{{ __('loan.table.user_email') }}</th>
                <th>{{ __('loan.table.book_name') }}</th>
                <th>{{ __('loan.table.book_author_name') }}</th>
                <th>{{ __('loan.table.book_genre') }}</th>
                <th>{{ __('loan.table.book_register_number') }}</th>
                <th>{{ __('loan.table.end_date') }}</th>
                <th>{{ __('book.table.status.label') }}</th>
                <th>{{ __('_actions.label') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loans ?? [] as $loan)
                <tr>
                    <td>{{ $loan->id }}</td>
                    <td>{{ $loan->user_fullname }}</td>
                    <td>{{ $loan->user_email }}</td>
                    <td>{{ $loan->book_name }}</td>
                    <td>{{ $loan->book_author_name }}</td>
                    <td>{{ __("book.genres.{$loan->book_genre}") }}</td>
                    <td>{{ $loan->book_register_number }}</td>
                    <td>
                        @if (app()->getLocale() == 'en')
                            {{ \Carbon\Carbon::parse($loan->end_date)->format('m/d/Y') }}
                        @elseif (app()->getLocale() == 'pt_BR')
                            {{ \Carbon\Carbon::parse($loan->end_date)->format('d/m/Y') }}
                        @else
                            {{ $loan->end_date }}
                        @endif
                    </td>
                    <td>{{ __("loan.table.status.{$loan->status}") }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('loan.edit', ['id' => $loan->id]) }}">
                            {{ __('_actions.btn_edit') }}
                        </a>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

@endsection
