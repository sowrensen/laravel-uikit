<li class="uk-parent {{ $item['submenu_class'] }}">
    <a href="#" @if(isset($item['id'])) {{ $item['id'] }} @endif>
        @if(isset($item['icon']))
            <span class="uk-margin-small-right" uk-icon="icon: {{ $item['icon'] }}"></span>
        @endif

        {{ $item['text'] }}

        @if(isset($item['label']))
            <span class="uk-label @if(isset($item['label_type'])) uk-label-{{ $item['label_type'] }} @endif">{{ $item['label'] }}</span>
        @endif
    </a>
    <ul class="uk-nav-sub uk-nav-parent-icon" uk-nav>
        @each('uikit::partials.sidebar.sidebar-items', $item['submenu'], 'item')
    </ul>
</li>
