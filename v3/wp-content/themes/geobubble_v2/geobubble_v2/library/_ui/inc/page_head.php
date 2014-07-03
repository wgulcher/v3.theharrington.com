<?php
/**
 * page_head.php
 *
 * Author: pixelcave
 *
 * Header and Sidebar of each page
 *
 */
?>

<!-- Page Container -->
<!-- In the PHP version you can set the following options from inc/config.php file -->
<!-- Remove the class .sidebar-full for a narrow partial hidden sidebar which opens on mouse hover (> 991px) -->
<!-- Add the class .style-alt for an alternative main style (affects main page background as well as blocks style) -->
<?php
    $page_classes = '';

    if ($template['header'] == 'navbar-fixed-top') {
        $page_classes = 'header-fixed-top';
    } else if ($template['header'] == 'navbar-fixed-bottom') {
        $page_classes = 'header-fixed-bottom';
    }

    if ($template['sidebar'] == 'sidebar-full') {
        $page_classes .= (($page_classes == '') ? '' : ' ') . 'sidebar-full';
    }

    if ($template['main_style'] == 'style-alt')  {
        $page_classes .= (($page_classes == '') ? '' : ' ') . 'style-alt';
    }
?>
<div id="page-container"<?php if ($page_classes) { echo ' class="' . $page_classes . '"'; } ?>>
    <!-- Sidebar -->
    <div id="sidebar">
        <!-- Wrapper for scrolling functionality -->
        <div class="sidebar-scroll">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Brand -->
                <a href="index.php" class="sidebar-brand">
                    <i class="gi gi-flash"></i><strong>Pro</strong>UI
                </a>
                <!-- END Brand -->

                <!-- User Info -->
                <div class="sidebar-section sidebar-user clearfix">
                    <div class="sidebar-user-avatar">
                        <a href="page_ready_user_profile.php">
                            <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar">
                        </a>
                    </div>
                    <div class="sidebar-user-name">John Doe</div>
                    <div class="sidebar-user-links">
                        <a href="page_ready_user_profile.php" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                        <a href="page_ready_inbox.php" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                        <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.php in PHP version) -->
                        <a href="#modal-user-settings" data-toggle="modal" class="enable-tooltip" data-placement="bottom" title="Settings"><i class="gi gi-cogwheel"></i></a>
                        <a href="login.php" data-toggle="tooltip" data-placement="bottom" title="Logout"><i class="gi gi-exit"></i></a>
                    </div>
                </div>
                <!-- END User Info -->

                <!-- Theme Colors -->
                <!-- Change Color Theme functionality can be found in js/app.js - templateOptions() -->
                <ul class="sidebar-section sidebar-themes clearfix">
                    <li class="active">
                        <a href="javascript:void(0)" class="themed-background-dark-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Default Blue"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-night themed-border-night" data-theme="css/themes/night.css" data-toggle="tooltip" title="Night"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-amethyst themed-border-amethyst" data-theme="css/themes/amethyst.css" data-toggle="tooltip" title="Amethyst"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-modern themed-border-modern" data-theme="css/themes/modern.css" data-toggle="tooltip" title="Modern"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-autumn themed-border-autumn" data-theme="css/themes/autumn.css" data-toggle="tooltip" title="Autumn"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-flatie themed-border-flatie" data-theme="css/themes/flatie.css" data-toggle="tooltip" title="Flatie"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-spring themed-border-spring" data-theme="css/themes/spring.css" data-toggle="tooltip" title="Spring"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-fancy themed-border-fancy" data-theme="css/themes/fancy.css" data-toggle="tooltip" title="Fancy"></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" class="themed-background-dark-fire themed-border-fire" data-theme="css/themes/fire.css" data-toggle="tooltip" title="Fire"></a>
                    </li>
                </ul>
                <!-- END Theme Colors -->

                <?php if ($primary_nav) { ?>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <?php foreach( $primary_nav as $key => $link ) {
                        $link_class = '';
                        $li_active  = '';
                        $menu_link  = '';

                        // Get 1st level link's vital info
                        $url        = (isset($link['url']) && $link['url']) ? $link['url'] : '#';
                        $active     = (isset($link['url']) && ($template['active_page'] == $link['url'])) ? ' active' : '';
                        $icon       = (isset($link['icon']) && $link['icon']) ? '<i class="' . $link['icon'] . ' sidebar-nav-icon"></i>' : '';

                        // Check if the link has a submenu
                        if (isset($link['sub']) && $link['sub']) {
                            // Since it has a submenu, we need to check if we have to add the class active
                            // to its parent li element (only if a 2nd or 3rd level link is active)
                            foreach ($link['sub'] as $sub_link) {
                                if (in_array($template['active_page'], $sub_link)) {
                                    $li_active = ' class="active"';
                                    break;
                                }

                                // 3rd level links
                                if (isset($sub_link['sub']) && $sub_link['sub']) {
                                    foreach ($sub_link['sub'] as $sub2_link) {
                                        if (in_array($template['active_page'], $sub2_link)) {
                                            $li_active = ' class="active"';
                                            break;
                                        }
                                    }
                                }
                            }

                            $menu_link = 'sidebar-nav-menu';
                        }

                        // Create the class attribute for our link
                        if ($menu_link || $active) {
                            $link_class = ' class="'. $menu_link . $active .'"';
                        }
                    ?>
                    <?php if ($url == 'header') { // if it is a header and not a link ?>
                    <li class="sidebar-header">
                        <?php if (isset($link['opt']) && $link['opt']) { // If the header has options set ?>
                        <span class="sidebar-header-options clearfix"><?php echo $link['opt']; ?></span>
                        <?php } ?>
                        <span class="sidebar-header-title"><?php echo $link['name']; ?></span>
                    </li>
                    <?php } else { // If it is a link ?>
                    <li<?php echo $li_active; ?>>
                        <a href="<?php echo $url; ?>"<?php echo $link_class; ?>><?php if (isset($link['sub']) && $link['sub']) { // if the link has a submenu ?><i class="fa fa-angle-left sidebar-nav-indicator"></i><?php } echo $icon . $link['name']; ?></a>
                        <?php if (isset($link['sub']) && $link['sub']) { // if the link has a submenu ?>
                        <ul>
                            <?php foreach ($link['sub'] as $sub_link) {
                                $link_class = '';
                                $li_active = '';
                                $submenu_link = '';

                                // Get 2nd level link's vital info
                                $url        = (isset($sub_link['url']) && $sub_link['url']) ? $sub_link['url'] : '#';
                                $active     = (isset($sub_link['url']) && ($template['active_page'] == $sub_link['url'])) ? ' active' : '';

                                // Check if the link has a submenu
                                if (isset($sub_link['sub']) && $sub_link['sub']) {
                                    // Since it has a submenu, we need to check if we have to add the class active
                                    // to its parent li element (only if a 3rd level link is active)
                                    foreach ($sub_link['sub'] as $sub2_link) {
                                        if (in_array($template['active_page'], $sub2_link)) {
                                            $li_active = ' class="active"';
                                            break;
                                        }
                                    }

                                    $submenu_link = 'sidebar-nav-submenu';
                                }

                                if ($submenu_link || $active) {
                                    $link_class = ' class="'. $submenu_link . $active .'"';
                                }
                            ?>
                            <li<?php echo $li_active; ?>>
                                <a href="<?php echo $url; ?>"<?php echo $link_class; ?>><?php if (isset($sub_link['sub']) && $sub_link['sub']) { ?><i class="fa fa-angle-left sidebar-nav-indicator"></i><?php } echo $sub_link['name']; ?></a>
                                <?php if (isset($sub_link['sub']) && $sub_link['sub']) { ?>
                                    <ul>
                                        <?php foreach ($sub_link['sub'] as $sub2_link) {
                                            // Get 3rd level link's vital info
                                            $url    = (isset($sub2_link['url']) && $sub2_link['url']) ? $sub2_link['url'] : '#';
                                            $active = (isset($sub2_link['url']) && ($template['active_page'] == $sub2_link['url'])) ? ' class="active"' : '';
                                        ?>
                                        <li>
                                            <a href="<?php echo $url; ?>"<?php echo $active ?>><?php echo $sub2_link['name']; ?></a>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </li>
                    <?php } ?>
                    <?php } ?>
                </ul>
                <!-- END Sidebar Navigation -->
                <?php } ?>

                <!-- Sidebar Notifications -->
                <div class="sidebar-header">
                    <span class="sidebar-header-options clearfix">
                        <a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
                    </span>
                    <span class="sidebar-header-title">Activity</span>
                </div>
                <div class="sidebar-section">
                    <div class="alert alert-success alert-alt">
                        <small>5 min ago</small><br>
                        <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                    </div>
                    <div class="alert alert-info alert-alt">
                        <small>10 min ago</small><br>
                        <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                    </div>
                    <div class="alert alert-warning alert-alt">
                        <small>3 hours ago</small><br>
                        <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in use</strong> 2GB left
                    </div>
                    <div class="alert alert-danger alert-alt">
                        <small>Yesterday</small><br>
                        <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)">New bug submitted</a>
                    </div>
                </div>
                <!-- END Sidebar Notifications -->
            </div>
            <!-- END Sidebar Content -->
        </div>
        <!-- END Wrapper for scrolling functionality -->
    </div>
    <!-- END Sidebar -->

    <!-- Main Container -->
    <div id="main-container">
        <!-- Header -->
        <!-- In the PHP version you can set the following options from inc/config.php file -->
        <!-- Add the class .navbar-default or .navbar-inverse for a light or dark header respectively -->
        <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively (fixed sidebar will be auto initialized) -->
        <!-- If you add the class .navbar-fixed-top remember to add the class .header-fixed-top to div#page-container element -->
        <!-- If you add the class .navbar-fixed-bottom remember to add the class .header-fixed-bottom to div#page-container element -->
        <header class="navbar<?php if ($template['header_navbar']) { echo ' ' . $template['header_navbar']; } ?><?php if ($template['header']) { echo ' '. $template['header']; } ?>">
            <!-- Left Header Navigation -->
            <ul class="nav navbar-nav-custom">
                <!-- Sidebar Toggle Button for large screens -->
                <li class="hidden-xs hidden-sm">
                    <a href="javascript:void(0)" id="sidebar-toggle-lg">
                        <i class="fa fa-list-ul fa-fw"></i>
                    </a>
                </li>
                <!-- Sidebar Toggle Button for small screens -->
                <li class="hidden-md hidden-lg">
                    <a href="javascript:void(0)" id="sidebar-toggle-sm">
                        <i class="fa fa-bars fa-fw"></i>
                    </a>
                </li>
                <!-- Home Button for small screens -->
                <li class="hidden-md hidden-lg">
                    <a href="index.php">
                        <i class="gi gi-stopwatch fa-fw"></i>
                    </a>
                </li>
            </ul>
            <!-- END Left Header Navigation -->

            <!-- Search Form -->
            <form action="page_ready_search_results.php" method="post" class="navbar-form-custom" role="search">
                <div class="form-group">
                    <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
                </div>
            </form>
            <!-- END Search Form -->

            <!-- Right Header Navigation -->
            <ul class="nav navbar-nav-custom pull-right">
                <!-- Template Options -->
                <!-- Change Options functionality can be found in js/app.js - templateOptions() -->
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="gi gi-settings"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-custom dropdown-options dropdown-menu-right">
                        <li class="dropdown-header text-center">Header Style</li>
                        <li>
                            <div class="btn-group btn-group-justified btn-group-sm">
                                <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                                <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
                            </div>
                        </li>
                        <li class="dropdown-header text-center">Page Style</li>
                        <li>
                            <div class="btn-group btn-group-justified btn-group-sm">
                                <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
                                <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
                            </div>
                        </li>
                        <li class="dropdown-header text-center">Main Layout</li>
                        <li>
                            <button class="btn btn-sm btn-block btn-primary" id="options-header-top">Fixed Side/Header (Top)</button>
                            <button class="btn btn-sm btn-block btn-primary" id="options-header-bottom">Fixed Side/Header (Bottom)</button>
                        </li>
                    </ul>
                </li>
                <!-- END Template Options -->

                <!-- User Dropdown -->
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar"> <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                        <li class="dropdown-header text-center">Account</li>
                        <li>
                            <a href="page_ready_timeline.php">
                                <i class="fa fa-clock-o fa-fw pull-right"></i>
                                <span class="badge pull-right">10</span>
                                Updates
                            </a>
                            <a href="page_ready_inbox.php">
                                <i class="fa fa-envelope-o fa-fw pull-right"></i>
                                <span class="badge pull-right">5</span>
                                Messages
                            </a>
                            <a href="page_ready_pricing_tables.php"><i class="fa fa-magnet fa-fw pull-right"></i>
                                <span class="badge pull-right">3</span>
                                Subscriptions
                            </a>
                            <a href="page_ready_faq.php"><i class="fa fa-question fa-fw pull-right"></i>
                                <span class="badge pull-right">11</span>
                                FAQ
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="page_ready_user_profile.php">
                                <i class="fa fa-user fa-fw pull-right"></i>
                                Profile
                            </a>
                            <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.php in PHP version) -->
                            <a href="#modal-user-settings" data-toggle="modal">
                                <i class="fa fa-cog fa-fw pull-right"></i>
                                Settings
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="login.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                        </li>
                        <li class="dropdown-header text-center">Activity</li>
                        <li>
                            <div class="alert alert-success alert-alt">
                                <small>5 min ago</small><br>
                                <i class="fa fa-thumbs-up fa-fw"></i> You had a new sale ($10)
                            </div>
                            <div class="alert alert-info alert-alt">
                                <small>10 min ago</small><br>
                                <i class="fa fa-arrow-up fa-fw"></i> Upgraded to Pro plan
                            </div>
                            <div class="alert alert-warning alert-alt">
                                <small>3 hours ago</small><br>
                                <i class="fa fa-exclamation fa-fw"></i> Running low on space<br><strong>18GB in use</strong> 2GB left
                            </div>
                            <div class="alert alert-danger alert-alt">
                                <small>Yesterday</small><br>
                                <i class="fa fa-bug fa-fw"></i> <a href="javascript:void(0)" class="alert-link">New bug submitted</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- END User Dropdown -->
            </ul>
            <!-- END Right Header Navigation -->
        </header>
        <!-- END Header -->
