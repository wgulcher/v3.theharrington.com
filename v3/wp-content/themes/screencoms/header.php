<!DOCTYPE html>
<!--[if lt IE 7]> <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<reveal_head><!-- required! --></reveal_head>
<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php bloginfo('title'); ?> :: <?php bloginfo('description'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta name="author" content="Richard Max">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- If the query includes 'print-pdf', use the PDF print sheet -->
    <script>
        document.write( '<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/reveal/css/print/' + ( window.location.search.match( /print-pdf/gi ) ? 'pdf' : 'paper' ) + '.css" type="text/css" media="print">' );
    </script>
    
    <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/font-awesome/css/font-awesome-ie7.min.css"> 
        <![endif]-->
    
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri() ?>/js/html5-ie.js"></script>
        <![endif]-->
    
    <?php wp_head() ?>
    <?php get_template_part('template_parts/theme-customizations'); ?>
    
</head>

<?php 
global $global_font, $global_show_grid;
$bodyclasses2use = 'layout-size--medium layout-type--fluid ' . 'font-' . $global_font . ' ' . $global_show_grid; 
?>

<body <?php body_class($bodyclasses2use) ?>>
<div class="wrapper-main fx-type--hide">


<header id="header" class="header">
<div class="header-tint">
  <div id="header-wrap" class="container header-wrap">
    <nav  id="site-options">
      <?php get_template_part('template_parts/menu-site'); ?>
    </nav>
    
    <!-- nav id="feed-options">
      <!-- ?php get_template_part('template_parts/menu-page'); ?>
    </nav -->
    <?php 
            if (is_front_page() && current_user_can('publish_posts')) { ?>
    <!-- div class="insert-posts-menu fx-type--hide">
      <div class="fx-type--bg-gradient-default fx-type--padding-default fx-type--toggle">
        <!-- ?php get_template_part('insert-posts/insert-posts'); ?>
      </div>
    </div -->
    <?php
            }

            ?>
 
   
  
    <section id="headercontent" class="headercontent row" style="margin-botto_m:180px;">
      <?php get_template_part('template_parts/header'); ?>
    </section>
    <nav id="main-navigation">
      
	  
	  
	  
	  
	  
	  
      <div class="navbar nav-primary fx-type--hide fx-type--border-default">
      <div id="nav-wrap">
        <div class="navbar-inner fx-type--border-default fx-type--padding-default fx-type--height-default fx-type--toggle">
          <?php get_template_part('template_parts/menu-nav'); ?>
        </div>
      </div>
     </div>
       <!--div class="filter-menu-view fx-type--hide navbar-fixed-bottom">
        <div class="filter-menu-view-wrap fx-type--padding-default fx-type--height-default fx-type--toggle">
          <!-- ?php get_template_part('template_parts/menu-filter-view'); ?>
        </div>
      </div -->
  
  
      <!--div class="filter-menu-query fx-type--hide">
        <div class="filter-menu-query-wrap fx-type--padding-default fx-type--height-default fx-type--toggle">
          <!-- ?php get_template_part('template_parts/menu-filter-query'); ?>
        </div>
      </div -->
    </nav>
    <?php   
			global $prev_url;
            $prev_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
            //echo "<h2>previous url: " . $prev_url . "</h2>";
        ?>
  </div>
  
  
  
  
  
  
  
   
    
    
    
  
    </div>

  
  
</header>

  

<div id="container" class="layout-type--fluid layout-size--medium container-fluid">

    <div class="filter-menu-query fx-type--hide" style="min-height:50px">
        <div class="filter-menu-query-wrap fx-type--padding-default fx-type--height-default fx-type--toggle">
          <?php get_template_part('template_parts/menu-filter-query'); ?>
        </div>
      </div>
