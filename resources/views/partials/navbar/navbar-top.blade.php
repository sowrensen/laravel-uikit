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
                @if(config('uikit.navbar.logo.display_image'))
                    <img src="{{ asset(config('uikit.navbar.logo.image')) }}"
                         class="{{ config('uikit.navbar.logo.image_classes') }}"
                         alt="{{ config('uikit.navbar.logo.image_alt_text') }}" width="34" height="34">
                @endif
                {{ config('uikit.navbar.logo.brand') }}
            </a>
        </div>

        {{-- navbar-right-links --}}
        <div class="uk-navbar-right">
            @include('uikit::partials.navbar.navbar-right')
        </div>
    </nav>
</div>
