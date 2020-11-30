<ul class="uk-navbar-nav">
    @yield('navbar_links')
    @includeWhen((auth()->check() && config('uikit.navbar.user_section.enabled', true)), 'uikit::partials.navbar.navbar-user')
</ul>
