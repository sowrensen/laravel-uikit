<?php

return [

    'icon_theme' => 'uikit', // material

    'sidebar' => [
        ['header' => 'Header 1'],
        [
            'text' => 'Active',
            'icon' => 'thumbnails',
            'route' => '#',
            'roles' => [],
            'attribute' => 'uk-modal',
            'id' => ''
        ],
        [
            'text' => 'Parent 1',
            'icon' => 'thumbnails',
            'roles' => [],
            'submenu' => [
                [
                    'text' => 'Sub Item',
                    'route' => '#',
                    'roles' => [],
                    'label' => '100'
                ],
                [
                    'text' => 'Sub Item Parent',
                    'roles' => [],
                    'submenu' => [
                        [
                            'text' => 'Sub-sub Item 1',
                            'route' => '#',
                            'roles' => []
                        ],
                        [
                            'text' => 'Sub-sub Item 2',
                            'route' => '#',
                            'roles' => []
                        ]
                    ]
                ]
            ]
        ],
        [
            'text' => 'Parent 2',
            'icon' => 'thumbnails',
            'roles' => [],
            'submenu' => [
                [
                    'text' => 'Sub Item 1',
                    'route' => '#',
                    'roles' => []
                ],
                [
                    'text' => 'Sub Item 2',
                    'route' => '#',
                    'roles' => []
                ],
            ]
        ],
        ['header' => 'Header 2'],
        [
            'text' => 'Item 1',
            'icon' => 'table',
            'route' => '#',
            'roles' => []
        ],
        [
            'text' => 'Item 1',
            'icon' => 'thumbnails',
            'route' => '#',
            'roles' => []
        ],
        ['divider' => true],
        [
            'text' => 'Item 3',
            'icon' => 'trash',
            'route' => '#',
            'roles' => []
        ],
    ]
];
