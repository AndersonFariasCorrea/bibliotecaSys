@extends('layouts.main')

@section('title', __('book.title'))

@section('content')

<div class="mx-5">
    <h1>{{ __('book.title') }} - {{ __('book.new')}}</h1>

    <div class="row mb-2">
        <div class="col-lg-2 col-md-2 col-sm-2">
            <a class="btn btn-primary text-capitalize w-100" href="{{ route('book.index') }}">
                {{ __('_actions.back') }}
            </a>
        </div>
    </div>

    <div class="row">
        @if ($errors->has('register_number'))
        <div class="coll mx-2 alert alert-danger">
            <i class="bi bi-exclamation-triangle"></i> {{ $errors->first('register_number') }}
        </div>
        @endif
        @if ($errors->has('genre'))
            <div class="coll mx-2 alert alert-danger">
                <i class="bi bi-exclamation-triangle"></i> {{ $errors->first('genre') }}
            </div>
        @endif
    </div>

    <form class="mt-2 text-left" action="{{ route('book.store') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="name">
                <b class="text-danger">* </b>{{ __('book.table.name') }}
            </label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>

        <div class="form-group mt-3">
            <label for="author_name">
                <b class="text-danger">* </b>{{ __('book.table.author_name') }}
            </label>
            <input class="form-control" type="text" name="author_name" id="author_name"  required>
        </div>

        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="genre" class="form-label">
                        <b class="text-danger">* </b>{{ __('book.table.genre')}}
                    </label>
                    <select class="form-control" name="genre" id="genre"  required>
                        <option value="" hidden>{{ __('_actions.select') }}</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre['value'] }}">{{ $genre['name'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="register_number" class="form-label">
                        <b class="text-danger">* </b>{{ __('book.table.register_number') }}
                    </label>
                    <input class="form-control" type="text" name="register_number"
                        id="register_number" pattern="[A-Za-z0-9]+"  required>
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
