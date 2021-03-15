@extends('uikit::auth.auth-main')

@section('title', 'Confirm Password')

@section('auth_content')
    <form action="{{ \Route::has(config('uikit.routes.password_confirm')) ? route(config('uikit.routes.password_confirm')) : '#' }}" method="post">
        @csrf
        <div class="uk-card-body uk-padding-remove-bottom">
            <p class="uk-text-meta">This is a secure area of the application. Please confirm your password before
                continuing.</p>
            <div class="uk-form-horizontal">
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
            </div>
        </div>
        <div class="uk-card-footer uk-flex uk-flex-between uk-flex-middle">
            <button type="submit" class="uk-button uk-button-secondary uk-text-bold">Confirm</button>
        </div>
    </form>
@endsection
