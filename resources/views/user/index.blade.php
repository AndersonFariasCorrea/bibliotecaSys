@extends('layouts.main')

@section('title', __('user.title'))

@section('content')
<h1>{{ __('user.title') }}</h1>

<div class="mx-5">
    <div class="row">
        <div class="col-lg-2">
            <a class="btn btn-secondary w-100 text-capitalize"
                href="/">{{ __('_actions.back') }}</a>
        </div>

        <div class="col-lg-2">
            <a class="btn btn-primary w-100"
                href="{{ route('user.create') }}">{{ __('_actions.btn_create') }}</a>
        </div>

        <div class="col-lg-3 row">
            <form action="{{ route('user.index') }}" method="GET">
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

    @if ($users->isEmpty())
        <div class="alert alert-info my-3 mx-0" role="info">
            <i class="bi bi-info-circle"></i> {{ __('user.empty') }}
        </div>

    @else
    <div class="row text-center">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('user.table.id') }}</th>
                    <th>{{ __('user.table.fullname') }}</th>
                    <th>{{ __('user.table.email') }}</th>
                    <th>{{ __('_actions.table.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users ?? [] as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="d-inline-flex">
                                <a class="btn btn-secondary mx-1" href="{{ route('user.edit', $user->id) }}">
                                    {{ __('_actions.table.edit') }}
                                </a>
                                {{-- sometimes a soft delete  --}}
                                <form action="{{ route('user.delete', $user->id) }}" method="POST">
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
