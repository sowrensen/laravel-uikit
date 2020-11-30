@php($avatar = method_exists(auth()->user(), 'getAvatar') ? auth()->user()->getAvatar() : null)
<li>
    <a href="#">
        <span class="uk-icon uk-margin-small-right"
              uk-icon="icon: {{ config('uikit.navbar.user_section.icon', 'user') }}"></span>
    </a>

    {{-- dropdown --}}
    <form uk-drop="pos: bottom-right" action="{{ route(config('uikit.routes.logout_route')) }}" method="post">
        @csrf
        <div class="uk-card uk-card-default">
            <div class="uk-card-body">
                <div class="uk-flex uk-flex-column uk-flex-center uk-flex-middle">
                    @if($avatar)
                        <img data-src="{{ asset($avatar) }}"
                             class="user-menu-avatar {{ config('uikit.navbar.user_section.image_classes') }}"
                             alt="{{ auth()->user()->name }}" uk-img>
                    @endif
                    <div class="uk-text-large">{{ auth()->user()->name }}</div>
                </div>
            </div>
            <div class="uk-card-footer uk-padding-small">
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <a href="{{ route(config('uikit.routes.profile_route')) }}"
                       class="uk-button uk-button-small uk-button-primary">
                        Profile
                    </a>
                    <button type="submit" class="uk-button uk-button-small uk-button-default uk-text-danger">
                        Logout
                    </button>
                </div>
            </div>
        </div>
    </form>
</li>
