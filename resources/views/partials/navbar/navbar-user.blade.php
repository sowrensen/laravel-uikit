@php($avatar = method_exists(auth()->user(), 'getAvatar') ? auth()->user()->getAvatar() : null)
<li>
    <a href="#">
        @if($avatar)
            <img data-src="{{ $avatar }}"
                 class="{{ config('uikit.navbar.user_section.image_classes') }}"
                 width="25" height="25" alt="{{ auth()->user()->name }}" uk-img>
        @else
            {{ auth()->user()->name }}
        @endif
    </a>

    {{-- dropdown --}}
    <form uk-drop="pos: bottom-right" action="{{ route('logout') }}" method="post">
        @csrf
        <div class="uk-card uk-card-default">
            <div class="uk-card-body">
                <div class="uk-flex uk-flex-column uk-flex-center uk-flex-middle">
                    @if($avatar)
                        <img data-src="{{ $avatar }}" width="70" height="70"
                             class="{{ config('uikit.navbar.user_section.image_classes') }}"
                             alt="{{ auth()->user()->name }}" uk-img>
                    @endif
                    <div class="uk-text-large">{{ auth()->user()->name }}</div>
                </div>
            </div>
            <div class="uk-card-footer uk-padding-small">
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <a href="{{ config('uikit.navbar.user_section.profile_url') }}"
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
