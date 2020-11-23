<div uk-sticky>
    <nav class="uk-navbar-container uk-container-expand uk-light" uk-navbar
         style="background-color: {{ config('uikit.navbar.background_color', '#262626') }}">
        <div class="uk-navbar-left">
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
            {{-- TODO: configurable --}}
            <a href="/" class="uk-navbar-item uk-logo uk-visible@m">
                <svg width="28" height="34" viewBox="0 0 28 34" xmlns="http://www.w3.org/2000/svg"
                     class="uk-margin-small-right uk-svg" data-svg="../images/uikit-logo.svg">
                    <polygon fill="#fff" points="19.1,4.1 13.75,1 8.17,4.45 13.6,7.44 "></polygon>
                    <path fill="#fff"
                          d="M21.67,5.43l-5.53,3.34l6.26,3.63v9.52l-8.44,4.76L5.6,21.93v-7.38L0,11.7v13.51l13.75,8.08L28,25.21V9.07 L21.67,5.43z"></path>
                </svg>
                Fortikit
            </a>
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
