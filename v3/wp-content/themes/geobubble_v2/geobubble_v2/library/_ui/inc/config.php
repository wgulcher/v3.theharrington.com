<?php
/**
 * config.php
 *
 * Author: pixelcave
 *
 * Configuration file. It contains variables used in the template as well as the primary navigation array from which the navigation is created
 *
 */

/* Template variables */
$template = array(
    'name'          => 'ProUI',
    'version'       => '1.0',
    'author'        => 'pixelcave',
    'robots'        => 'noindex, nofollow',
    'title'         => 'ProUI - Responsive Admin Dashboard Template',
    'description'   => 'ProUI is a Responsive Admin Dashboard Template created by pixelcave and published on Themeforest.',
    // 'navbar-default'         for a light header
    // 'navbar-inverse'         for a dark header
    'header_navbar' => 'navbar-default',
    // ''                       empty for a static header
    // 'navbar-fixed-top'       for a top fixed header / fixed sidebar
    // 'navbar-fixed-bottom'    for a bottom fixed header / fixed sidebar
    'header'        => '',
    // ''                       empty for a narrow partial hidden sidebar which opens on mouse hover (> 991px)
    // 'sidebar-full'           for a full visible sidebar (> 991px)
    'sidebar'       => 'sidebar-full',
    // ''                       empty for default style
    // 'style-alt'              for an alternative main style (affects main page background as well as blocks style)
    'main_style'    => '',
    // 'night', 'amethyst', 'modern', 'autumn', 'flatie', 'spring', 'fancy', 'fire' or '' leave empty for the Default Blue theme
    'theme'         => '',
    'active_page'   => basename($_SERVER['PHP_SELF'])
);

/* Primary navigation array (the primary navigation will be created automatically based on this array, up to 3 levels deep) */
$primary_nav = array(
    array(
        'name'  => 'Dashboard',
        'url'   => 'index.php',
        'icon'  => 'gi gi-stopwatch'
    ),
    array(
        'name'  => 'Widget Kit',
        'opt'   => '<a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a>' .
                   '<a href="javascript:void(0)" data-toggle="tooltip" title="Create the most amazing pages with the widget kit!"><i class="gi gi-lightbulb"></i></a>',
        'url'   => 'header',
    ),
    array(
        'name'  => 'Statistics',
        'url'   => 'page_widgets_stats.php',
        'icon'  => 'gi gi-charts'
    ),
    array(
        'name'  => 'Social',
        'url'   => 'page_widgets_social.php',
        'icon'  => 'gi gi-share_alt'
    ),
    array(
        'name'  => 'Media',
        'url'   => 'page_widgets_media.php',
        'icon'  => 'gi gi-film'
    ),
    array(
        'name'  => 'Design Kit',
        'opt'   => '<a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a>',
        'url'   => 'header'
    ),
    array(
        'name'  => 'User Interface',
        'icon'  => 'gi gi-certificate',
        'sub'   => array(
            array(
                'name'  => 'Grid &amp; Blocks',
                'url'   => 'page_ui_grid_blocks.php'
            ),
            array(
                'name'  => 'Typography',
                'url'   => 'page_ui_typography.php'
            ),
            array(
                'name'  => 'Buttons &amp; Dropdowns',
                'url'   => 'page_ui_buttons_dropdowns.php'
            ),
            array(
                'name'  => 'Navigation &amp; More',
                'url'   => 'page_ui_navigation_more.php'
            ),
            array(
                'name'  => 'Progress &amp; Loading',
                'url'   => 'page_ui_progress_loading.php'
            ),
            array(
                'name'  => 'Color Themes',
                'url'   => 'page_ui_color_themes.php'
            )
        )
    ),
    array(
        'name'  => 'Forms',
        'icon'  => 'gi gi-notes_2',
        'sub'   => array(
            array(
                'name'  => 'General',
                'url'   => 'page_forms_general.php'
            ),
            array(
                'name'  => 'Components',
                'url'   => 'page_forms_components.php'
            ),
            array(
                'name'  => 'Validation',
                'url'   => 'page_forms_validation.php'
            ),
            array(
                'name'  => 'Wizard',
                'url'   => 'page_forms_wizard.php'
            )
        )
    ),
    array(
        'name'  => 'Tables',
        'icon'  => 'gi gi-table',
        'sub'   => array(
            array(
                'name'  => 'General',
                'url'   => 'page_tables_general.php'
            ),
            array(
                'name'  => 'Responsive',
                'url'   => 'page_tables_responsive.php'
            ),
            array(
                'name'  => 'Datatables',
                'url'   => 'page_tables_datatables.php'
            )
        )
    ),
    array(
        'name'  => 'Icon Sets',
        'icon'  => 'gi gi-cup',
        'sub'   => array(
            array(
                'name'  => 'Font Awesome',
                'url'   => 'page_icons_fontawesome.php'
            ),
            array(
                'name'  => 'Glyphicons Pro',
                'url'   => 'page_icons_glyphicons_pro.php'
            )
        )
    ),
    array(
        'name'  => 'Develop Kit',
        'opt'   => '<a href="javascript:void(0)" data-toggle="tooltip" title="Quick Settings"><i class="gi gi-settings"></i></a>',
        'url'   => 'header',
    ),
    array(
        'name'  => 'Components',
        'icon'  => 'fa fa-wrench',
        'sub'   => array(
            array(
                'name'  => '3 Level Menu',
                'sub'   => array(
                    array(
                        'name'  => 'Link 1',
                        'url'   => '#'
                    ),
                    array(
                        'name'  => 'Link 2',
                        'url'   => '#'
                    )
                )
            ),
            array(
                'name'  => 'Maps',
                'url'   => 'page_comp_maps.php'
            ),
            array(
                'name'  => 'Charts',
                'url'   => 'page_comp_charts.php'
            ),
            array(
                'name'  => 'Gallery',
                'url'   => 'page_comp_gallery.php'
            ),
            array(
                'name'  => 'Carousel',
                'url'   => 'page_comp_carousel.php'
            ),
            array(
                'name'  => 'Calendar',
                'url'   => 'page_comp_calendar.php'
            ),
            array(
                'name'  => 'CSS3 Animations',
                'url'   => 'page_comp_animations.php'
            ),
            array(
                'name'  => 'Syntax Highlighting',
                'url'   => 'page_comp_syntax_highlighting.php'
            )
        )
    ),
    array(
        'name'  => 'Ready Pages',
        'icon'  => 'gi gi-brush',
        'sub'   => array(
            array(
                'name'  => 'Errors',
                'sub'   => array(
                    array(
                        'name'  => '400',
                        'url'   => 'page_ready_400.php'
                    ),
                    array(
                        'name'  => '401',
                        'url'   => 'page_ready_401.php'
                    ),
                    array(
                        'name'  => '403',
                        'url'   => 'page_ready_403.php'
                    ),
                    array(
                        'name'  => '404',
                        'url'   => 'page_ready_404.php'
                    ),
                    array(
                        'name'  => '500',
                        'url'   => 'page_ready_500.php'
                    ),
                    array(
                        'name'  => '503',
                        'url'   => 'page_ready_503.php'
                    )
                )
            ),
            array(
                'name'  => 'Get Started',
                'sub'   => array(
                    array(
                        'name'  => 'Blank',
                        'url'   => 'page_ready_blank.php'
                    ),
                    array(
                        'name'  => 'Blank Alternative',
                        'url'   => 'page_ready_blank_alt.php'
                    )
                )
            ),
            array(
                'name'  => 'Search Results (4)',
                'url'   => 'page_ready_search_results.php'
            ),
            array(
                'name'  => 'Article',
                'url'   => 'page_ready_article.php'
            ),
            array(
                'name'  => 'User Profile',
                'url'   => 'page_ready_user_profile.php'
            ),
            array(
                'name'  => 'Message Center',
                'sub'   => array(
                    array(
                        'name'  => 'Inbox',
                        'url'   => 'page_ready_inbox.php'
                    ),
                    array(
                        'name'  => 'Compose Message',
                        'url'   => 'page_ready_inbox_compose.php'
                    ),
                    array(
                        'name'  => 'View Message',
                        'url'   => 'page_ready_inbox_message.php'
                    )
                )
            ),
            array(
                'name'  => 'Timeline',
                'url'   => 'page_ready_timeline.php'
            ),
            array(
                'name'  => 'FAQ',
                'url'   => 'page_ready_faq.php'
            ),
            array(
                'name'  => 'Pricing Tables',
                'url'   => 'page_ready_pricing_tables.php'
            ),
            array(
                'name'  => 'Invoice',
                'url'   => 'page_ready_invoice.php'
            ),
            array(
                'name'  => 'Forum (3)',
                'url'   => 'page_ready_forum.php'
            ),
            array(
                'name'  => 'Login / Register',
                'url'   => 'login.php'
            )
        )
    )
);