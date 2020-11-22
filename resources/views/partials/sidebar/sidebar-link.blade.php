<li>
    <a href="{{ $item['route'] }}"
       @if(isset($item['attributes'])) {{ $item['attributes'] }} @endif
       @if(isset($item['target'])) target="{{ $item['target'] }}" @endif
    >
        @if(isset($item['icon']))
            <span class="uk-margin-small-right" uk-icon="icon: {{ $item['icon'] }}"></span>
        @endif

        {{ $item['text'] }}

        @if(isset($item['label']))
            <span class="uk-label">{{ $item['label'] }}</span>
        @endif
    </a>
</li>
