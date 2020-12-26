@if ($paginator->hasPages())
    <ul class="uk-pagination {{ $align ?? config('uikit.pagination_align', '') }}">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="uk-disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a href="#"><span class="uk-margin-small-right" uk-pagination-previous aria-hidden="true"></span>
                    Previous</a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <span class="uk-margin-small-right" uk-pagination-previous></span> Previous
                </a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="uk-margin-auto-left">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    Next <span class="uk-margin-small-left" uk-pagination-next></span>
                </a>
            </li>
        @else
            <li class="uk-margin-auto-left uk-disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a href="#">Next <span class="uk-margin-small-left" uk-pagination-next aria-hidden="true"></span></a>
            </li>
        @endif
    </ul>
@endif
