@extends('layouts.main')

@section('title', __('loan.title'))

@section('content')

<div class="mx-5">
    <h1>{{ __('loan.title') }} - {{ __('loan.edit')}}</h1>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2">
            <a class="btn btn-primary text-capitalize w-100" href="{{ route('loan.index') }}">
                {{ __('_actions.back') }}
            </a>
        </div>
    </div>

    <div class="row mt-3">
        @if ($errors->has('status'))
        <div class="coll mx-2 alert alert-danger">
            <i class="bi bi-exclamation-triangle"></i> {{ $errors->first('status') }}
        </div>
        @endif
    </div>
    <div class="row mt-3">
        @if ($errors->has('end_date'))
        <div class="coll mx-2 alert alert-danger">
            <i class="bi bi-exclamation-triangle"></i> {{ $errors->first('end_date') }}
        </div>
        @endif
    </div>

    <form class="mt-5" action="{{ route('loan.update', ['id' => $loan->id]) }}"method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mt-3">
            <label for="book_id">
                <b class="text-danger">* </b>{{ __('loan.book') }}
            </label>
            <select name="book_id" id="book_id" class="form-control" disabled required>
                <option value="{{ $loan->book_id }}" hidden>{{ $loan->book_name }}</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                @endforeach
            </select>
        </div>



        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="user_id">
                        <b class="text-danger">* </b>{{ __('loan.table.user') }}
                    </label>
                    <select name="user_id" id="user_id" class="form-control" disabled required>
                        <option value="{{ $loan->user_id }}" hidden>{{ $loan->user_fullname }}</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label for="end_date">
                        <b class="text-danger">* </b>{{ __('loan.table.end_date') }}
                    </label>
                    <input type="date" name="end_date" id="end_date"
                        value="{{ $loan->end_date }}" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="status">
                        <b class="text-danger">* </b>{{ __('loan.table.status.label') }}
                    </label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="{{ $loan->status }}" hidden>{{ __("loan.table.status.{$loan->status}") }}</option>
                        @foreach($statuses as $status)
                            <option value="{{ $status['value'] }}">{{ $status['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-2 offset-lg-10">
                <button type="submit" class="btn btn-success w-100">
                    {{ __('_actions.btn_save') }}
                </button>
            </div>
        </div>
</div>
@endsection
