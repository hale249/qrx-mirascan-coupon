@extends('errors::minimal')
@section('title', __('Unauthorized'))
@section('content')
    <div class="px-4 text-lg border-r border-gray-400 tracking-wider">
        401
    </div>

    <div class="ml-4 text-lg uppercase tracking-wider">
        <strong>{{ __('Unauthorized') }}</strong>
    </div>
@endsection
