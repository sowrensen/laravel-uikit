@extends('uikit::master')

@section('uikitstyles')
    @stack('css')
    @yield('css')
@stop

@section('body')
    <div class="uk-flex uk-height-viewport uk-flex-center uk-flex-middle">
        <div class="uk-width-1-3@xl uk-width-1-2@m">
            @if(session('status'))
                <div class="uk-alert-success" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>{{ session('status') }}</p>
                </div>
            @endif

            @include('uikit::auth.auth-heading')

            <div class="uk-card {{ config('uikit.auth.card_classes') }}">
                @yield('auth_content')
            </div>
        </div>
    </div>
@endsection

@section('uikitscripts')
    @stack('js')
    @yield('js')
@stop
