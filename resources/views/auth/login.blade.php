@extends('uikit::master')

@section('title', 'Login')

@section('body')
    <div class="uk-flex uk-height-viewport uk-flex-center uk-flex-middle">
        <div class="uk-width-1-3@xl uk-width-1-2@m">
            <h1 class="uk-heading-line uk-text-center uk-margin-small-bottom">
                <span>
                    <img src="{{ asset(config('uikit.brand_logo')) }}"
                         class="uk-border-circle uk-padding-small"
                         style="max-width: 90px; max-height: 90px"
                         alt="{{ config('uikit.navbar.logo.image_alt_text') }}">
                    {{ config('uikit.brand_name') }}
                </span>
            </h1>
            <form action="{{ url(config('uikit.urls.login_url')) }}" method="post"
                  class="uk-card uk-card-default uk-background-muted">
                @csrf
                <div class="uk-card-body">
                    <div class="uk-form-horizontal">
                        <div class="uk-margin">
                            <label for="username" class="uk-form-label">Username</label>
                            <div class="uk-form-controls">
                                <input type="text" id="username" name="username" class="uk-input"
                                       placeholder="Email or Phone"
                                       autocomplete="off">
                                @if($errors->has('username'))
                                    <small class="uk-text-meta uk-text-danger">{{ $errors->first('username') }}</small>
                                @endif
                            </div>
                        </div>
                        <div class="uk-margin">
                            <label for="password" class="uk-form-label">Password</label>
                            <div class="uk-form-controls">
                                <input type="password" id="password" name="password" class="uk-input"
                                       placeholder="Password"
                                       autocomplete="password">
                                @if($errors->has('password'))
                                    <small class="uk-text-meta uk-text-danger">{{ $errors->first('password') }}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-card-footer uk-flex uk-flex-between uk-flex-middle">
                    <button type="submit" class="uk-button uk-button-danger uk-text-bold">Login</button>
                    <div class="uk-flex uk-flex-column">
                        <a href="{{ route('register') }}" class="uk-link-muted uk-text-small">I don't have an
                            account</a>
                        <a href="{{ route('password.update') }}" class="uk-link-muted uk-text-small">Forgot
                            password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

