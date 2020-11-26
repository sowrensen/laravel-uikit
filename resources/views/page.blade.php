@extends('uikit::master')

@section('uikitstyles')
    @stack('css')
    @yield('css')
@stop

@section('body')
    {{-- Top navigation bar --}}
    @include('uikit::partials.navbar.navbar-top')

    {{-- Off-canvas element to show sidebar in mobile displays --}}
    @include('uikit::partials.sidebar.sidebar-mobile')

    {{-- Grid layout for sidebar and main content --}}
    <div uk-grid class="uk-grid-collapse uk-height-viewport">

        {{-- Sidebar in non-mobile displays --}}
        <aside class="uk-visible@m uk-sidebar {{ config('uikit.sidebar.theme', 'dark') == 'dark' ? 'uk-sidebar-dark uk-light' : 'uk-sidebar-light' }}"
               id="sidebar">
            @include('uikit::partials.sidebar.sidebar-main')
        </aside>

        {{-- App content --}}
        <div class="uk-width-expand uk-flex uk-flex-column uk-flex-between ease-in-out extra-padding" id="wrapper">
            <div class="uk-padding uk-flex-1">
                @yield('content')
            </div>

            {{-- Footer --}}
            @include('uikit::partials.footer.footer-main')
        </div>
    </div>
@endsection

@section('uikitscripts')
    @stack('js')
    @yield('js')
@stop
