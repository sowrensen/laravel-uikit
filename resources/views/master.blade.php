<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>{!! config('uikit.title_prefix') !!}@yield('title', config('uikit.title')){!! config('uikit.title_suffix') !!}</title>

    {{-- Favicon --}}
    @if(config('uikit.favicon', null))
        <link rel="icon" href="{{ asset(config('uikit.favicon')) }}" type="image/x-icon"/>
    @endif

    {{-- Fonts --}}
    @if(config('uikit.font', null))
        <link href="{{ config('uikit.font') }}" rel="stylesheet">
    @endif

    {{-- Styles --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    {{-- Custom styles --}}
    @yield('uikitstyles')
</head>
<body>
<div id="app">
    @yield('body')
</div>

{{-- Scripts --}}
<script src="{{ mix('js/app.js') }}"></script>

{{-- Custom scripts --}}
@yield('uikitscripts')
</body>
</html>
