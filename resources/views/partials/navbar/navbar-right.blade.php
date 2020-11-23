<ul class="uk-navbar-nav">
    @yield('navbar_links')
    @if(auth()->check() && config('uikit.navbar.user_section.enabled', false))
        @include('uikit::partials.navbar.navbar-user')
    @endif
</ul>
