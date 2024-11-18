@extends('layouts.main')

@section('title', __('loan.title'))

@section('content')

<div class="mx-5">
    <h1>{{ __('loan.title') }} - {{ __('loan.new')}}</h1>

    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2">
            <a class="btn btn-primary text-capitalize w-100" href="{{ route('loan.index') }}">
                {{ __('_actions.back') }}
            </a>
        </div>
    </div>

    <div class="row mt-3">
        @if ($errors->has('book_id'))
        <div class="coll mx-2 alert alert-danger">
            <i class="bi bi-exclamation-triangle"></i> {{ $errors->first('book_id') }}
        </div>
        @endif
    </div>

    <form class="mt-5 text-left" action="{{ route('loan.store') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="book_id">
                <b class="text-danger">* </b>{{ __('loan.book') }}
            </label>
            <select name="book_id" id="book_id" class="form-control" required>
                <option value="" hidden>Selecione...</option>
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
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="" hidden>Selecione...</option>
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
                        class="form-control" required>
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
    </form>
</div>
@endsection
