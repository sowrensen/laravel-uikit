@inject('helper', App\Helpers\MenuHelper)

@if($helper->isHeader($item))
    @include('layouts.partials.sidebar.sidebar-header')
@endif

@if($helper->isDivider($item))
    @include('layouts.partials.sidebar.sidebar-divider')
@endif

@if($helper->isLink($item))
    @include('layouts.partials.sidebar.sidebar-link')
@endif

@if($helper->isSubmenu($item))
    @include('layouts.partials.sidebar.sidebar-submenu')
@endif
