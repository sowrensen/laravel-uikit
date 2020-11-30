<h1 class="uk-text-center uk-margin-small-bottom {{ config('uikit.auth.heading_classes') }}">
    <span>
        @if(config('uikit.brand_logo', null))
            <img src="{{ asset(config('uikit.brand_logo')) }}"
                 class="auth-heading-logo {{ config('uikit.auth.heading_image_classes') }}"
                 alt="{{ config('uikit.navbar.logo.image_alt_text') }}">
        @endif
        {{ config('uikit.brand_name') }}
    </span>
</h1>
