@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('content')
    <div class="px-4 text-lg border-r border-gray-400 tracking-wider">
        503
    </div>

    <div class="ml-4 text-lg uppercase tracking-wider">
        <strong>{{ __('Service Unavailable') }}</strong>
    </div>
@endsection
