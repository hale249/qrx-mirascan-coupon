@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('content')
    <div class="px-4 text-lg border-r border-gray-400 tracking-wider">
        403
    </div>

    <div class="ml-4 text-lg uppercase tracking-wider">
        <strong>{{ __($exception->getMessage() ?: 'Forbidden' }}</strong>
    </div>
@endsection
