@extends('layouts.base')

@section('body')
    @component('components.navbar')

    @endcomponent

    <div class="mt-5">
        @yield('content')
    </div>

@endsection
