<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application font
    |--------------------------------------------------------------------------
    |
    | Set default font for application. Specify the URL.
    |
    | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/Font-and-Title#application-font
    */

    'font' => '',

    /*
    |--------------------------------------------------------------------------
    | Application title
    |--------------------------------------------------------------------------
    |
    | Set default title, prefix, and suffix for your application.
    |
    | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/Font-and-Title#application-title
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
    | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/Brand-Name,-and-Logo#brand-name-and-logo
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
    | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/Brand-Name,-and-Logo#application-favicon
    */

    'favicon' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication routes
    |--------------------------------------------------------------------------
    |
    | Set names of your auth routes.
    |
    | By default these are Laravel 8 route names. Only routes used in this
    | package are configurable, Laravel may have some extra routes
    | depending on the auth scaffolding you are using.
    |
    | Note that, only route names are allowed, not URLs.
    |
    | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/Routes-and-Authentication-Views#routes
    */

    'routes' => [
        /*
        |--------------------------------------------------------------------------
        | Application login route
        |--------------------------------------------------------------------------
        |
        | URL: /login
        */

        'login_route' => 'login',

        /*
        |--------------------------------------------------------------------------
        | Application logout route
        |--------------------------------------------------------------------------
        |
        | URL: /logout
        */

        'logout_route' => 'logout',

        /*
        |--------------------------------------------------------------------------
        | Profile route
        |--------------------------------------------------------------------------
        |
        | URL: /profile
        */

        'profile_route' => 'profile',

        /*
        |--------------------------------------------------------------------------
        | Registration route
        |--------------------------------------------------------------------------
        |
        | URL: /register
        */

        'register_route' => 'register',

        /*
        |--------------------------------------------------------------------------
        | Request to reset password
        |--------------------------------------------------------------------------
        |
        | URL: /forgot-password
        */

        'password_reset' => 'password.request',

        /*
        |--------------------------------------------------------------------------
        | Send password reset email
        |--------------------------------------------------------------------------
        |
        | URL: /forgot-password
        */

        'password_email' => 'password.email',

        /*
        |--------------------------------------------------------------------------
        | Update password via reset link
        |--------------------------------------------------------------------------
        |
        | URL: /reset-password
        */

        'password_update' => 'password.update',

        /*
        |--------------------------------------------------------------------------
        | Confirm password to enter a secure route
        |--------------------------------------------------------------------------
        |
        | URL: /user/confirm-password
        */

        'password_confirm' => 'password.confirm',

        /*
        |--------------------------------------------------------------------------
        | Send email verification
        |--------------------------------------------------------------------------
        |
        | URL: /email/verification-notification
        */

        'verification_send' => 'verification.send'
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication view
    |--------------------------------------------------------------------------
    |
    | Set classes for authentication views.
    |
    | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/Routes-and-Authentication-Views#authentication-view
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
    | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/Top-Navigation-Bar
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
        | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/Top-Navigation-Bar#logo-subgroup
        */

        'logo' => [
            'link' => '/',
            'classes' => 'uk-logo uk-visible@m',
            'display_image' => false,
            'image_classes' => 'uk-margin-small-right uk-border-rounded',
        ],

        /*
        |--------------------------------------------------------------------------
        | Navbar user section
        |--------------------------------------------------------------------------
        |
        | Configure the user section of navigation bar.
        |
        | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/Top-Navigation-Bar#user-section-subgroup
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
    | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/Sidebar
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
                'label' => 5,
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
    | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/Filters
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
    | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/Footer
    */

    'footer' => [
        'enabled' => false,
        'background' => '#EAEAEA',
        'classes' => 'uk-padding uk-text-small uk-flex'
    ],

    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    |
    | Enable or disable UIKit styled pagination and set the alignment.
    |
    | Wiki: https://github.com/sowrensen/laravel-uikit/wiki/pagination
    */

    'pagination' => [
        'enabled' => true,
        'align' => ''
    ]
];
