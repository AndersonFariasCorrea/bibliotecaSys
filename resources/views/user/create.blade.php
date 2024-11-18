@extends('layouts.main')

@section('title', __('user.title'))

@section('content')

<div class="mx-5">
    <h1>{{ __('user.title') }} - {{ __('user.new')}}</h1>

    <div class="row mb-2">
        <div class="col-lg-2 col-md-2 col-sm-2">
            <a class="btn btn-primary text-capitalize w-100" href="{{ route('user.index') }}">
                {{ __('_actions.back') }}
            </a>
        </div>
    </div>

    <div class="row">
        @if ($errors->has('email'))
        <div class="coll mx-2 alert alert-danger">
            <i class="bi bi-exclamation-triangle"></i> {{ $errors->first('email') }}
        </div>
        @endif
    </div>

    <form class="mt-2 text-left" action="{{ route('user.create') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="fullname">
                <b class="text-danger">* </b>{{ __('user.fullname') }}
            </label>
            <input class="form-control" type="text" name="fullname" id="fullname">
        </div>

        <div class="form-group mt-3">
            <label for="email">
                <b class="text-danger">* </b>{{ __('user.email') }}
            </label>
            <input class="form-control" type="email" name="email" id="email">
        </div>

        <div class="row my-5">
            <div class="col-lg-2 offset-lg-10">
                <button type="submit" class="btn btn-success w-100">{{ __('_actions.btn_save') }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
