<?php

return [

    'icon_theme' => 'uikit', // material

    'title' => 'Laravel UIKit',
    'title_prefix' => '',
    'title_suffix' => '::Laravel UIKit',

    'brand_name' => config('app.name'),
    'brand_logo' => '/placeholders/cgit_logo.png',
    'brand_logo_alt_text' => 'Laravel UIKit',

    // Accepts route only
    'routes' => [
        'login_route' => 'login',
        'logout_route' => 'logout',
        'profile_route' => 'profile',
        'register_route' => 'register',
        'password_reset'=> 'password.request',
        'password_email' => 'password.email'
    ],

    'navbar' => [
        'background' => '#262626', // CSS linear-gradient acceptable
        'extra_classes' => 'uk-light',
        'logo' => [
            'link' => '/',
            'classes' => 'uk-logo uk-visible@m',
            'display_image' => true,
            'image_classes' => 'uk-margin-small-right uk-border-rounded',
        ],
        'user_section' => [
            // Define a method getAvatar() in User class that
            // should return the user's profile photo.
            'enabled' => true,
            // Applicable for both images (navbar and dropdown card)
            'image_classes' => 'uk-border-circle',
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
        'background' => '#EAEAEA',
        'classes' => 'uk-padding uk-text-small uk-flex'
    ]
];
