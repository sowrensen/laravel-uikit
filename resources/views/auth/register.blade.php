@extends('uikit::auth.auth-main')

@section('title', 'Register')

@section('auth_content')
    <form action="{{ route(config('uikit.routes.register_route')) }}" method="post">
        @csrf
        <div class="uk-card-body">
            <div class="uk-form-horizontal">
                <div class="uk-margin">
                    <label for="name" class="uk-form-label">Name</label>
                    <div class="uk-form-controls">
                        <input type="text" class="uk-input {{ $errors->has('name') ? 'uk-form-danger' : '' }}"
                               id="name" name="name" placeholder="Jon Snow"
                               value="{{ old('name') }}" autocomplete="off" required>
                        @if($errors->has('name'))
                            <small class="uk-text-meta uk-text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="email" class="uk-form-label">Email</label>
                    <div class="uk-form-controls">
                        <input type="text" class="uk-input {{ $errors->has('email') ? 'uk-form-danger' : '' }}"
                               id="email" name="email" placeholder="jon@example.com"
                               value="{{ old('email') }}" autocomplete="off">
                        @if($errors->has('email'))
                            <small class="uk-text-meta uk-text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                </div>
                <hr>
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
                    <label for="password_confirmation" class="uk-form-label">Confirm Password</label>
                    <div class="uk-form-controls">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="uk-input"
                               placeholder="******" autocomplete="password_confirmation" required>
                        @if($errors->has('password_confirmation'))
                            <small class="uk-text-meta uk-text-danger">{{ $errors->first('password_confirmation') }}</small>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-card-footer uk-flex uk-flex-between uk-flex-middle">
            <button type="submit" class="uk-button uk-button-secondary uk-text-bold">Register</button>
            <a href="{{ route(config('uikit.routes.login_route')) }}" class="uk-link-muted uk-text-small">I already have
                an account</a>
        </div>
    </form>
@endsection
