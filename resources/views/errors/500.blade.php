@extends('errors::minimal')

@section('title', __('Server Error'))
@section('content')
    <div class="px-4 text-lg border-r border-gray-400 tracking-wider">
        500
    </div>

    <div class="ml-4 text-lg uppercase tracking-wider">
        <strong>{{ __('Server Error') }}</strong>
    </div>
@endsection
