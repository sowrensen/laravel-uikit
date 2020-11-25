@extends('uikit::auth.auth-main')

@section('title', 'Forgot Password')

@section('auth_content')
    <form action="{{ route(config('uikit.routes.password_email')) }}" method="post">
        @csrf
        <div class="uk-card-body">
            <p class="uk-text-meta">Oops! Seems that you've forgotten your password. No worry, just tell us your email
                and we will send you a password reset link to your email.</p>
            <div class="uk-form-horizontal">
                <label for="email" class="uk-form-label">Email</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-input {{ $errors->has('email') ? 'uk-form-danger' : '' }}"
                           id="email" name="email" placeholder="jon@example.com"
                           value="{{ old('email') }}" autocomplete="off" required>
                    @if($errors->has('email'))
                        <small class="uk-text-meta uk-text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
            </div>
        </div>
        <div class="uk-card-footer uk-flex uk-flex-between uk-flex-middle">
            <button type="submit" class="uk-button uk-button-secondary uk-text-bold">Send Link</button>
            <a href="{{ route(config('uikit.routes.login_route')) }}" class="uk-link-muted uk-text-small">Login</a>
        </div>
    </form>
@endsection
