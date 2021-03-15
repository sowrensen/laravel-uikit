@inject('helper', \Sowren\LaravelUikit\Helpers\MenuHelper::class)

@includeWhen($helper->isHeader($item), 'uikit::partials.sidebar.sidebar-header')

@includeWhen($helper->isDivider($item), 'uikit::partials.sidebar.sidebar-divider')

@includeWhen($helper->isSubmenu($item), 'uikit::partials.sidebar.sidebar-submenu')

@includeWhen($helper->isLink($item), 'uikit::partials.sidebar.sidebar-link')
