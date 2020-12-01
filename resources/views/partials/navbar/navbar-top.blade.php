
<div uk-sticky>
    <nav class="uk-navbar-container uk-container-expand {{ config('uikit.navbar.extra_classes') }}" uk-navbar
         style="background: {{ config('uikit.navbar.background', '#262626') }}">
        <div class="uk-navbar-left">

            {{-- sidebar-toogles --}}
            <ul class="uk-navbar-nav">
                <li>
                    <a href="#" uk-navbar-toggle-icon uk-toggle="target: #sidebar; animation: uk-animation-slide-left"
                       class="uk-navbar-toggle uk-visible@m uk-icon uk-navbar-toggle-icon" id="sidebar-toggler">
                    </a>
                    <a href="#" uk-navbar-toggle-icon uk-toggle="target: #sidebar-mobile"
                       class="uk-navbar-toggle uk-hidden@m uk-icon uk-navbar-toggle-icon">
                    </a>
                </li>
            </ul>

            {{-- navbar-logo --}}
            <a href="{{ config('uikit.navbar.logo.link', '/') }}"
               class="uk-navbar-item {{ config('uikit.navbar.logo.classes') }}">
                @if(config('uikit.navbar.logo.enabled', false))
                    <img src="{{ asset(config('uikit.brand_logo')) }}"
                         class="navbar-logo {{ config('uikit.navbar.logo.img_classes') }}"
                         alt="{{ config('uikit.brand_logo_alt_text') }}">
                @endif
                {{ config('uikit.brand_name') }}
            </a>
        </div>

        {{-- navbar-right-links --}}
        <div class="uk-navbar-right">
            @include('uikit::partials.navbar.navbar-right')
        </div>
    </nav>
</div>
