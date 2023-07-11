@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('content')
    <div class="px-4 text-lg border-r border-gray-400 tracking-wider">
        429
    </div>

    <div class="ml-4 text-lg uppercase tracking-wider">
        <strong>{{ __('Too Many Requests') }}</strong>
    </div>
@endsection
