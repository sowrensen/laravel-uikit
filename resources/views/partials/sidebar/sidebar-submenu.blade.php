<li class="uk-parent">
    <a href="#">
        @if(isset($item['icon']))
            <span class="uk-margin-small-right" uk-icon="icon: {{ $item['icon'] }}"></span>
        @endif

        {{ $item['text'] }}

        @if(isset($item['label']))
            <span class="uk-label">{{ $item['label'] }}</span>
        @endif
    </a>
    <ul class="uk-nav-sub uk-nav-parent-icon" uk-nav>
        @each('layouts.partials.sidebar.items', $item['submenu'], 'item')
    </ul>
</li>
