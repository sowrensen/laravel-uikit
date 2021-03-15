@extends('uikit::auth.auth-main')

@section('title', 'Verify Email')

@section('auth_content')
    <div class="uk-card-body">
        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we
        just emailed to you? If you didn't receive the email, we will gladly send you another.
    </div>
    <div class="uk-card-footer">
        <div class="uk-flex uk-flex-between">
            <form
                action="{{ \Route::has(config('uikit.routes.verification_send')) ? route(config('uikit.routes.verification_send')) : '#' }}" method="post">
                @csrf
                <button type="submit" class="uk-button uk-button-secondary uk-text-bold">
                    Resend Verification Email
                </button>
            </form>
            <form action="{{ \Route::has(config('uikit.routes.logout_route')) ? route(config('uikit.routes.logout_route')) : '#' }}" method="post">
                @csrf
                <button type="submit" class="uk-button uk-button-default">Logout</button>
            </form>
        </div>
    </div>
@endsection
