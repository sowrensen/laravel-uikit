@extends('uikit::auth.auth-main')

@section('title', 'Reset Password')

@section('auth_content')
    <form action="{{ \Route::has(config('uikit.routes.password_update')) ? route(config('uikit.routes.password_update')) : '#' }}"
          method="post">
        @csrf

        {{-- Password reset token --}}
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="uk-card-body uk-padding-remove-bottom">
            <div class="uk-form-horizontal">
                <div class="uk-margin">
                    <label for="email" class="uk-form-label">Email</label>
                    <div class="uk-form-controls">
                        <input type="text" id="email" name="email"
                               class="uk-input {{ $errors->has('email') ? 'uk-form-danger' : '' }}"
                               placeholder="jon@example.com"
                               value="{{ old('email', $request->email) }}"
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
                               autocomplete="new-password" required>
                        @if($errors->has('password'))
                            <small class="uk-text-meta uk-text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="password-confirm" class="uk-form-label">Confirm Password</label>
                    <div class="uk-form-controls">
                        <input type="password" id="password-confirm" name="password_confirmation"
                               class="uk-input"
                               placeholder="******"
                               autocomplete="new-password" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-card-footer uk-flex uk-flex-between uk-flex-middle">
            <button type="submit" class="uk-button uk-button-secondary uk-text-bold">Reset Password</button>
        </div>
    </form>
@endsection
