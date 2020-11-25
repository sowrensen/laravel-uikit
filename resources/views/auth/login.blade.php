@extends('uikit::master')

@section('title', 'Login')

@section('body')
    <div class="uk-flex uk-height-viewport uk-flex-center uk-flex-middle">
        <form action="{{ url(config('uikit.urls.login_url')) }}" method="post" class="uk-width-1-3@xl uk-width-1-2@m">
            @csrf
            <h1 class="uk-heading-line uk-text-center"><span>{{ config('uikit.brand_name') }}</span></h1>
            <div class="uk-card uk-card-default uk-card-body uk-background-muted">
                <div class="uk-grid-small uk-flex-middle uk-padding-small" uk-grid>
                    <div class="uk-width-auto@m uk-text-center">
                        <img src="{{ asset(config('uikit.brand_logo')) }}"
                             class="uk-border-circle uk-padding-small"
                             style="max-width: 150px; max-height: 150px"
                             alt="{{ config('uikit.navbar.logo.image_alt_text') }}">
                    </div>
                    <div class="uk-width-expand">
                        <div class="uk-margin-small">
                            <input type="text" id="username" name="username" class="uk-input"
                                   placeholder="Email or Phone"
                                   autocomplete="off">
                            @if($errors->has('username'))
                                <small class="uk-text-meta uk-text-danger">{{ $errors->first('username') }}</small>
                            @endif
                        </div>
                        <div class="uk-margin-small">
                            <input type="password" id="password" name="password" class="uk-input" placeholder="Password"
                                   autocomplete="password">
                            @if($errors->has('password'))
                                <small class="uk-text-meta uk-text-danger">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                        <div class="uk-margin-medium-top uk-flex uk-flex-between uk-flex-middle">
                            <button type="submit" class="uk-button uk-button-danger uk-text-bold">Login</button>
                            <div class="uk-flex uk-flex-column">
                                <a href="{{ route('register') }}" class="uk-link-muted uk-text-small">I don't have an
                                    account</a>
                                <a href="{{ route('password.update') }}" class="uk-link-muted uk-text-small">Forgot
                                    password?</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
