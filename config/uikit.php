<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application title
    |--------------------------------------------------------------------------
    |
    | Set default title, prefix, and suffix for your application.
    |
    */

    'title' => 'Laravel UIKit',
    'title_prefix' => '',
    'title_suffix' => ' &mdash; Laravel UIKit',

    /*
    |--------------------------------------------------------------------------
    | Brand name and logo
    |--------------------------------------------------------------------------
    |
    | Set brand name and logo for your application.
    |
    */

    'brand_name' => config('app.name'),
    'brand_logo' => null,
    'brand_logo_alt_text' => 'Laravel UIKit',

    /*
    |--------------------------------------------------------------------------
    | Application favicon
    |--------------------------------------------------------------------------
    |
    | Set favicon for the application.
    |
    */

    'favicon' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication routes
    |--------------------------------------------------------------------------
    |
    | Set names of your auth routes.
    |
    | By default these are Laravel 8 route names. Note that, only
    | route names are allowed, not URLs.
    |
    */

    'routes' => [
        'login_route' => 'login',
        'logout_route' => 'logout',
        'profile_route' => 'profile',
        'register_route' => 'register',
        'password_reset' => 'password.request',
        'password_email' => 'password.email'
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication view
    |--------------------------------------------------------------------------
    |
    | Set classes for authentication views.
    |
    */

    'auth' => [
        'heading_classes' => 'uk-heading-line',
        'heading_image_classes' => 'uk-border-circle uk-padding-small',
        'card_classes' => 'uk-card-default uk-background-muted',
    ],

    /*
    |--------------------------------------------------------------------------
    | Top navigation bar
    |--------------------------------------------------------------------------
    |
    | Configure the tob navigation bar of your application.
    |
    */

    'navbar' => [
        'background' => '#262626',
        'extra_classes' => 'uk-light',

        /*
        |--------------------------------------------------------------------------
        | Navbar brand
        |--------------------------------------------------------------------------
        |
        | Configure brand and logo display on the navigation bar.
        |
        */

        'logo' => [
            'enabled' => false,
            'link' => '/',
            'classes' => 'uk-logo uk-visible@m',
            'image_classes' => 'uk-margin-small-right uk-border-rounded',
        ],

        /*
        |--------------------------------------------------------------------------
        | Navbar user section
        |--------------------------------------------------------------------------
        |
        | Configure the user section of navigation bar.
        |
        */

        'user_section' => [
            'enabled' => true,
            'icon' => 'user',
            'image_classes' => 'uk-border-circle',
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Main navigation drawer
    |--------------------------------------------------------------------------
    |
    | Configure your sidebar/navigation drawer theme and menu items.
    |
    */

    'sidebar' => [
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
                        'url' => '#',
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

    /*
    |--------------------------------------------------------------------------
    | Navigation drawer menu filters
    |--------------------------------------------------------------------------
    |
    | Set filter classes that are applied on sidebar menu items.
    |
    */

    'filters' => [
        \Sowren\LaravelUikit\Menu\Filters\HrefFilter::class,
        \Sowren\LaravelUikit\Menu\Filters\ActiveFilter::class,
        \Sowren\LaravelUikit\Menu\Filters\ClassFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | The footer section
    |--------------------------------------------------------------------------
    |
    | Set the background and classes for the footer of your application.
    |
    */

    'footer' => [
        'enabled' => false,
        'background' => '#EAEAEA',
        'classes' => 'uk-padding uk-text-small uk-flex'
    ],
];
