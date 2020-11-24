<?php

return [

    'icon_theme' => 'uikit', // material

    'navbar' => [
        'background' => '#262626', // CSS linear-gradient acceptable
        'extra_classes' => 'uk-light',
        'logo' => [
            'link' => '/',
            'classes' => 'uk-logo uk-visible@m',
            'display_image' => true,
            'image' => '/placeholders/cgit_logo.png',
            'image_alt_text' => 'Laravel UIKit',
            'image_classes' => 'uk-margin-small-right uk-border-rounded',
            'brand' => config('app.name')
        ],
        'user_section' => [
            // Define a method getAvatar() in User class that
            // should return the user's profile photo.
            'enabled' => true,
            // Applicable for both images (navbar and dropdown card)
            'image_classes' => 'uk-border-circle',
            'profile_url' => 'profile',
            'logout_url' => 'logout'
        ]
    ],

    'sidebar' => [
        // NOTE: Light theme is only applicable for desktop views, for changing the
        // theme color on mobile, you have to set following variables in your _variables.scss.
        // $offcanvas-bar-background: #F7F7F7;
        // $offcanvas-bar-color-mode: dark;
        'theme' => 'dark',
        'menu' => [
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
    ],

    'footer' => [
        'background' => '#EAEAEA'
    ]
];
