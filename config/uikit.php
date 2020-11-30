<?php

return [

    'icon_theme' => 'uikit',

    'title' => 'Laravel UIKit',
    'title_prefix' => '',
    'title_suffix' => ' &mdash; Laravel UIKit',

    'brand_name' => config('app.name'),
    'brand_logo' => null,
    'brand_logo_alt_text' => 'Laravel UIKit',

    // Accepts route only
    'routes' => [
        'login_route' => 'login',
        'logout_route' => 'logout',
        'profile_route' => 'profile',
        'register_route' => 'register',
        'password_reset' => 'password.request',
        'password_email' => 'password.email'
    ],

    'auth' => [
        'heading_classes' => 'uk-heading-line',
        'heading_image_classes' => 'uk-border-circle uk-padding-small',
        'card_classes' => 'uk-card-default uk-background-muted',
    ],

    'navbar' => [
        'background' => '#262626', // CSS linear-gradient acceptable
        'extra_classes' => 'uk-light',
        'logo' => [
            'enabled' => false,
            'link' => '/',
            'classes' => 'uk-logo uk-visible@m',
            'logo_classes' => 'uk-margin-small-right uk-border-rounded',
        ],
        'user_section' => [
            // Define a method getAvatar() in User class that
            // should return the user's profile photo.
            'enabled' => true,
            'icon' => 'user',
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
            ['header' => 'General'],
            [
                'text' => 'Dashboard',
                'url' => '/',
                'roles' => [],
                'attributes' => '',
                'id' => ''
            ],
            [
                'text' => 'Accounts',
                'roles' => [],
                'submenu' => [
                    [
                        'text' => 'Profile',
                        'url' => 'profile',
                    ],
                    [
                        'text' => 'Change Avatar',
                        'url' => '#',
                    ],
                ]
            ],
            ['header' => 'Administrative'],
            [
                'text' => 'Media Library',
                'icon' => 'image',
                'url' => '#',
            ],
            [
                'text' => 'History',
                'icon' => 'history',
                'url' => '#',
            ],
            ['divider' => true],
            [
                'text' => 'Preferences',
                'icon' => 'settings',
                'url' => '#',
                'roles' => ['admin']
            ],
        ]
    ],

    'footer' => [
        'background' => '#EAEAEA',
        'classes' => 'uk-padding uk-text-small uk-flex'
    ],

    'filters' => [
        \Sowren\LaravelUikit\Menu\Filters\HrefFilter::class,
        \Sowren\LaravelUikit\Menu\Filters\ActiveFilter::class,
        \Sowren\LaravelUikit\Menu\Filters\ClassFilter::class,
    ],
];
