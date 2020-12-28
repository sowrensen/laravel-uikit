@if ($paginator->hasPages())
    <ul class="uk-pagination {{ $align ?? config('uikit.pagination.align', '') }}">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="uk-disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <a href="#">
                    @lang('pagination.previous')</a>
            </li>
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    @lang('pagination.previous')</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="uk-margin-auto-left">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    @lang('pagination.next')
                </a>
            </li>
        @else
            <li class="uk-margin-auto-left uk-disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <a href="#">@lang('pagination.next')</a>
            </li>
        @endif
    </ul>
@endif
