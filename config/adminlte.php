<?php

use Illuminate\Support\Facades\Route\Admin;

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => '',
    'title_prefix' => 'Transport | ',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>Transport</b>Mina',
    'logo_img' => 'vendor/adminlte/dist/img/transport.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Transport',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-danger elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ],
        [
            'icon'        => 'fas fa-solid fa-house-user',
            'text' => 'Inicio',
            'route'  => 'inicio',

        ],

        [
            'text'    => 'Directorios',
            'icon'    => 'fas fa-male',
            'submenu' => [
                [
                    'icon'        => 'fas fa-address-book',
                    'text' => 'Tipos de directorios',
                    'route'  => 'list_directorytipe',
                ],
                [
                    'icon'        => 'fas fa-list',
                    'text' => 'Listar directorios',
                    'route'  => 'list_directory',

                ],
                [
                    'icon'        => 'fas fa-plus',
                    'text' => 'Crear directorios',
                    'route'  => 'create_directory',
                ],
            ],
        ],
        [
            'text'    => 'Contabilidad',
            'icon'    => 'fas fa-calculator',
            'submenu' => [
                [
                    'icon'        => 'fa fa-industry',
                    'text' => 'Centros de costo',
                    'submenu' => [
                        [
                            'icon'        => 'fas fa-list',
                            'text' => 'Listas de centros de costo',
                            'route'  => 'list_costcenter',

                        ]

                    ],

                ],

                [
                    'icon'        => 'fa fa-inbox',
                    'text' => 'Centros de costo nivel 2',
                    'submenu' => [
                        [
                            'icon'        => 'fas fa-list',
                            'text' => 'Listas de cecos nv. 2',
                            'route'  => 'list_subcostcenter',

                        ],

                        [
                            'icon'        => 'fas fa-plus',
                            'text' => 'Crear cecos nv. 2',
                            'route'  => 'create_subcostcenter',

                        ]

                    ],

                ],

                [
                    'icon'        => 'fa fa-bed',
                    'text' => 'Actividades',
                    'submenu' => [
                        [
                            'icon'        => 'fas fa-list',
                            'text' => 'Listas de actividades',
                            'route'  => 'list_activity',

                        ]

                    ]

                ],
                [
                    'icon'        => 'fa fa-balance-scale',
                    'text' => 'Periodos contables',
                    'submenu' => [
                        [
                            'icon'        => 'fa fa-calendar',
                            'text' => 'Años creados',
                            'route'  => 'list_year',

                        ],
                        [
                            'icon'        => 'fas fa-plus',
                            'text' => 'Crear un nuevo año',
                            'route'  => 'create_year',

                        ],
                        [
                            'icon'        => 'fas fa-list',
                            'text' => 'Ver meses creados',
                            'route'  => 'list_month',

                        ],

                    ],

                ],


            ],
        ],
        [
            'text'    => 'Artículos y servicios',
            'icon'    => 'fa fa-map-pin',
            'submenu' => [
                [
                    'text'    => 'Familias de artículos',
                    'icon'    => 'fa fa-object-group',
                    'submenu' => [
                        [
                            'icon' => 'fa fa-list',
                            'text' => 'Lista de familias',
                            'route'  => 'list_productfamily',
                        ],
                        [
                            'icon'        => 'fas fa-plus',
                            'text' => 'Creación de familias',
                            'route'  => 'create_productfamily',
                        ],

                    ]
                ],
                [
                    'icon'        => 'fas fa-list',
                    'text' => 'Unidades de medida',
                    'route'  => 'list_measure',

                ],
                [
                    'icon'        => 'fas fa-list',
                    'text' => 'Listar articulos y servicios',
                    'route'  => 'list_product',

                ],
                [
                    'icon'        => 'fas fa-plus',
                    'text' => 'Crear nuevo artículo',
                    'route'  => 'create_product',
                ],

            ],
        ],
        [
            'text'    => 'Producción',
            'icon'    => 'fa fa-microchip',
            'submenu' => [
                [
                    'icon'        => 'fas fa-plus',
                    'text' => 'Registrar producción',
                    'route'  => 'create_production',

                ],
                [
                    'icon'        => 'fas fa-list',
                    'text' => 'Registros de producción',
                    'route'  => 'list_production',

                ]

            ],

        ],
        [
            'text'    => 'Pedidos',
            'icon'    => 'fa fa-truck',
            'submenu' => [
                [
                    'icon'        => 'fas fa-list',
                    'text' => 'Lista de pedidos',
                    'route'  => 'list_order',

                ],
                [
                    'icon'        => 'fas fa-plus',
                    'text' => 'Registros de pedidos',
                    'route'  => 'create_order',

                ]

            ],

        ],
        [
            'text'    => 'Ventas',
            'icon'    => 'fa fa-shopping-cart',
            'submenu' => [
                [
                    'icon'        => 'fas fa-list',
                    'text' => 'Lista de ventas',
                    'route'  => 'list_sale',

                ],
                [
                    'icon'        => 'fas fa-plus',
                    'text' => 'Registros de ventas',
                    'route'  => 'create_sale',

                ]

            ],

        ],
        [
            'text'    => 'Nominas',
            'icon'    => 'fa fa-users',
            'submenu' => [
                [
                    'icon'        => 'fas fa-list',
                    'text' => 'Lista de empleados',
                    'route'  => 'list_employee',

                ],
                [
                    'icon'        => 'fas fa-user-plus',
                    'text' => 'Registros de empleados',
                    'route'  => 'create_employee',

                ],
            [

                'text'    => 'Planillas',
                'icon'    => 'fas fa-check-square',
                'submenu' => [
                    [
                        'icon'        => 'fas fa-list',
                        'text' => 'Planillas generadas',
                        'route'  => 'list_payroll',

                    ],
                    [
                        'icon'        => 'fas fa-plus',
                        'text' => 'Generar planilla',
                        'route'  => 'create_payroll',

                    ]

                ],
            ]

            ],

        ],
        [
            'text'    => 'Inventario',
            'icon'    => 'fa fa-archive',
            'submenu' => [
                [
                    'text'    => 'Ingresos',
                    'icon'    => 'fa fa-plus-square',
                    'submenu' => [
                        [
                            'icon' => 'fa fa-list',
                            'text' => 'Lista ingresos',
                            'route'  => 'list_int',
                        ],
                        [
                            'icon'        => 'fa fa-plus',
                            'text' => 'Registrar ingreso',
                            'route'  => 'create_int',
                        ],
                    ],
                ],
                [
                    'text'    => 'Salidas',
                    'icon'    => 'fa fa-sort-down',
                    'submenu' => [
                        [
                            'icon' => 'fa fa-list',
                            'text' => 'Lista salidas',
                            'route'  => 'list_Out',
                        ],
                        [
                            'icon'        => 'fas fa-plus',
                            'text' => 'Crear salidas',
                            'route'  => 'create_out',
                        ],
                    ]
                

                    ],
                    [
                        'icon' => 'fa fa-file',
                            'text' => 'Exportar inventario',
                            'route'  => 'exportar_inventario',
                    ]
                    
                

            ],
            
           
        ],

        [
            'text'    => 'Configuraciones generales',
            'icon'    => 'fas fa-plug',
            'submenu' => [
                [
                    'icon'        => 'fas fa-list',
                    'text' => 'Sedes / sucursales',
                    'route'  => 'list_headquarter',

                ],
                [
                    'icon'        => 'fas fa-list',
                    'text' => 'Registrar usuario',
                    'route'  => 'register',

                ],

            ],

        ],
        

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
