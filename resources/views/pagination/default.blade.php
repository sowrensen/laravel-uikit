@if ($paginator->hasPages())
    <ul class="uk-pagination {{ $align ?? config('uikit.pagination.align', '') }}">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="uk-disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a href="#">
                    <span uk-pagination-previous aria-hidden="true"></span>
                </a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <span uk-pagination-previous></span>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="uk-disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="uk-active" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <span uk-pagination-next></span>
                </a>
            </li>
        @else
            <li class="uk-disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a href="#">
                    <span uk-pagination-next aria-hidden="true"></span>
                </a>
            </li>
        @endif
    </ul>
@endif
