@inject('helper', \Sowren\LaravelUikit\Helpers\MenuHelper)

@if($helper->isHeader($item))
    @include('uikit::partials.sidebar.sidebar-header')
@endif

@if($helper->isDivider($item))
    @include('uikit::partials.sidebar.sidebar-divider')
@endif

@if($helper->isSubmenu($item))
    @include('uikit::partials.sidebar.sidebar-submenu')
@endif

@if($helper->isLink($item))
    @include('uikit::partials.sidebar.sidebar-link')
@endif

