<?php

/**
 * Register Widget Areas
 *******************************************************************************/
if (!is_a(@$page_sidebars,'Page_Sidebars') || is_admin()) {
	
		register_sidebar( array(
		'name' => __( 'Sidebar Widgets Group 1 (Default)', 'widgetcode' ),
		'id' => 'widget-area-1',
		'description' => __( 'Add widgets here...', 'widgetcode' ),
		'before_widget' => '<li id="%1$s" class="widget-container fx-type--border-default %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widgets Group 2', 'widgetcode' ),
		'id' => 'widget-area-2',
		'description' => __( 'Add widgets here...', 'widgetcode' ),
		'before_widget' => '<li id="%1$s" class="widget-container fx-type--border-default %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widgets Group 3', 'widgetcode' ),
		'id' => 'widget-area-3',
		'description' => __( 'Add widgets here...', 'widgetcode' ),
		'before_widget' => '<li id="%1$s" class="widget-container fx-type--border-default %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widgets Group 4', 'widgetcode' ),
		'id' => 'widget-area-4',
		'description' => __( 'Add widgets here...', 'widgetcode' ),
		'before_widget' => '<li id="%1$s" class="widget-container fx-type--border-default %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Header Widgets', 'widgetcode' ),
		'id' => 'widgetarea-header',
		'description' => __( 'Add widgets here...', 'widgetcode' ),
		'before_widget' => '<li id="%1$s" class="widget-container pull-right fx-type--border-default  %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' => __( 'Footer Widgets - Left', 'widgetcode' ),
		'id' => 'widgetarea-footer-left',
		'description' => __( 'Add widgets here...', 'widgetcode' ),
		'before_widget' => '<li id="%1$s" class="widget-container span4 fx-type--border-default %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widgets - Right', 'widgetcode' ),
		'id' => 'widgetarea-footer-right',
		'description' => __( 'Add widgets here...', 'widgetcode' ),
		'before_widget' => '<li id="%1$s" class="widget-container span4 fx-type--border-default %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	


	
	
}



/**
 * Get the number of widgets in a sidebar
 * @link http://stackoverflow.com/questions/4441165/wordpress-count-widgets
 *******************************************************************************/
function count_sidebar_widgets( $sidebar_id ) {
	if (is_a(@$GLOBALS['page_sidebars'],'Page_Sidebars'))
		return @$GLOBALS['page_sidebars']->count_widgets($sidebar_id);

	$the_sidebars = wp_get_sidebars_widgets();
	if( !isset( $the_sidebars[$sidebar_id] ) )
		return __( 'Invalid sidebar ID','screencoms' );
	else
		return count( $the_sidebars[$sidebar_id] );
}

/**
 * Dynamic widget classes
 *******************************************************************************/
function widget_class($sidebar_id) {
	
	if (0 < ($c = count_sidebar_widgets($sidebar_id))) {
		$cols = floor(12 / $c);
		return 'span'.$cols;
	}
}



?>