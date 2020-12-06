<li @if(isset($item['class']) && !empty($item['class'])) class="{{ $item['class'] }}" @endif>
    <a href="{{ $item['href'] }}"
       @if(isset($item['id'])) {{ $item['id'] }} @endif
       @if(isset($item['attributes'])) {{ $item['attributes'] }} @endif
       @if(isset($item['target'])) target="{{ $item['target'] }}" @endif
    >
        @if(isset($item['icon']))
            <span class="uk-margin-small-right" uk-icon="icon: {{ $item['icon'] }}"></span>
        @endif

        {{ $item['text'] }}

        @if(isset($item['label']))
            <span class="uk-label @if(isset($item['label_type'])) uk-label-{{ $item['label_type'] }} @endif">{{ $item['label'] }}</span>
        @endif
    </a>
</li>
