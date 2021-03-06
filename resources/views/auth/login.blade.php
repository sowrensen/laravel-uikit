@extends('uikit::auth.auth-main')

@section('title', 'Login')

@section('auth_content')
    <form action="{{ \Route::has(config('uikit.routes.login_route')) ? route(config('uikit.routes.login_route')) : '#' }}"
          method="post">
        @csrf
        <div class="uk-card-body uk-padding-remove-bottom">
            <div class="uk-form-horizontal">
                <div class="uk-margin">
                    <label for="email" class="uk-form-label">Email</label>
                    <div class="uk-form-controls">
                        <input type="text" id="email" name="email"
                               class="uk-input {{ $errors->has('email') ? 'uk-form-danger' : '' }}"
                               placeholder="jon@example.com"
                               value="{{ old('email') }}"
                               autocomplete="off" required>
                        @if($errors->has('email'))
                            <small class="uk-text-meta uk-text-danger">{{ $errors->first('email') }}</small>
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
            <button type="submit" class="uk-button uk-button-secondary uk-text-bold">Login</button>
            <div class="uk-flex uk-flex-column">
                <a href="{{ \Route::has(config('uikit.routes.register_route')) ? route(config('uikit.routes.register_route')) : '#' }}"
                   class="uk-link-muted uk-text-small">I don't have an account</a>
                <a href="{{ \Route::has(config('uikit.routes.password_reset')) ? route(config('uikit.routes.password_reset')) : '#' }}"
                   class="uk-link-muted uk-text-small">Forgot password?</a>
            </div>
        </div>
    </form>
@endsection
