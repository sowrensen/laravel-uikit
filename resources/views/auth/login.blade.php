@extends('uikit::auth.auth-main')

@section('title', 'Login')

@section('auth_content')
    <form action="{{ route(config('uikit.routes.login_route')) }}" method="post">
        @csrf
        <div class="uk-card-body">
            <div class="uk-form-horizontal">
                <div class="uk-margin">
                    <label for="username" class="uk-form-label">Username</label>
                    <div class="uk-form-controls">
                        <input type="text" id="username" name="username"
                               class="uk-input {{ $errors->has('username') ? 'uk-form-danger' : '' }}"
                               placeholder="Email or Phone"
                               value="{{ old('username') }}"
                               autocomplete="off" required>
                        @if($errors->has('username'))
                            <small class="uk-text-meta uk-text-danger">{{ $errors->first('username') }}</small>
                        @endif
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="password" class="uk-form-label">Password</label>
                    <div class="uk-form-controls">
                        <input type="password" id="password" name="password"
                               class="uk-input {{ $errors->has('password') ? 'uk-form-danger' : '' }}"
                               placeholder="******"
                               autocomplete="password" required>
                        @if($errors->has('password'))
                            <small class="uk-text-meta uk-text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-form-controls">
                        <label><input class="uk-checkbox" type="checkbox" name="remember" id="remember"> Remember
                            me</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-card-footer uk-flex uk-flex-between uk-flex-middle">
            <button type="submit" class="uk-button uk-button-danger uk-text-bold">Login</button>
            <div class="uk-flex uk-flex-column">
                <a href="{{ route(config('uikit.routes.register_route')) }}"
                   class="uk-link-muted uk-text-small">I don't have an account</a>
                <a href="{{ route(config('uikit.routes.password_reset')) }}"
                   class="uk-link-muted uk-text-small">Forgot password?</a>
            </div>
        </div>
    </form>
@endsection
