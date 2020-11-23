<div uk-sticky>
    <nav class="uk-navbar-container uk-container-expand {{ config('uikit.navbar.extra_classes') }}" uk-navbar
         style="background: {{ config('uikit.navbar.background_color', '#262626') }}">
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
            {{-- /.sidebar-toggles --}}

            {{-- navbar-logo --}}
            <a href="{{ config('uikit.navbar.logo.url', '/') }}"
               class="uk-navbar-item {{ config('uikit.navbar.logo.classes') }}">
                @if(config('uikit.navbar.logo.display_image'))
                    <img src="{{ config('uikit.navbar.logo.image') }}"
                         class="{{ config('uikit.navbar.logo.image_classes') }}"
                         alt="{{ config('uikit.navbar.logo.image_alt_text') }}" width="34" height="34">
                @endif
                {{ config('uikit.navbar.logo.app_name') }}
            </a>
            {{-- /.navbar-logo --}}
        </div>
        @auth
            <div class="uk-navbar-right">
                {{-- TODO: configurable --}}
                <ul class="uk-navbar-nav">
                    <li><a href="#">Inbox</a></li>
                    <li class="uk-active">
                        <a href="#">
                            <img data-src="/placeholders/user.svg" width="25" height="25" alt="" uk-img>
                        </a>
                        {{-- TODO: configurable --}}
                        <form uk-drop="pos: bottom-right" action="{{ route('logout') }}" method="post">
                            @csrf
                            <div class="uk-card uk-card-default">
                                <div class="uk-card-body">
                                    <div class="uk-flex uk-flex-column uk-flex-center uk-flex-middle">
                                        <img data-src="/placeholders/user.svg" width="70" height="70" alt="" uk-img
                                             class="uk-border-circle">
                                        <div class="uk-text-large">{{ auth()->user()->name }}</div>
                                    </div>
                                </div>
                                <div class="uk-card-footer uk-padding-small">
                                    <div class="uk-flex uk-flex-between uk-flex-middle">
                                        <a href="#" type="submit" class="uk-button uk-button-small uk-button-primary">
                                            Profile
                                        </a>
                                        <button class="uk-button uk-button-small uk-button-default uk-text-danger">
                                            Logout
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
    </nav>
</div>
