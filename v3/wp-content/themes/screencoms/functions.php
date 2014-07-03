<?php

/*
add_action('wp_head', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}
*/

// Re-define meta box path and URL
define( 'RWMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/meta-box' ) );
define( 'RWMB_DIR', trailingslashit( get_stylesheet_directory() .	 '/meta-box' ) );

// Include the meta box script
require_once RWMB_DIR . 'meta-box.php';

// Include the meta box definition (the file where you define meta boxes, see `demo/demo.php`)
include 'meta-box.php';




// NHP Theme options - v v good but now using theme customisation
//get_template_part('nhp', 'options');



// had to be added as triggering a theme error
function my_theme_add_editor_styles() {
    add_editor_style( 'admin-custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );


/* includes for plugins - comment out if no plugins */
//include 'include/plugins/user-rights.php';
//include 'multiple-sidebars/multiple-sidebars.php';



/* includes */

include 'include/shortcode-reveal.php';
include 'include/shortcode-gallery.php';	
include 'include/widgets.php';
include 'include/imagery.php';
include 'include/metadata.php';
include 'include/theme-customizer.php';	


/* enqueue admin scripts */
function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/* enqueue scripts */
add_action('wp_enqueue_scripts', 'enqueue_code', 20);
function enqueue_code() {
	$location = get_template_directory_uri();
	//wp_enqueue_style('bootstrap-carousel', $location.'/css/bootstrap-carousel.css', null, '1.0' );
	//wp_enqueue_style('bootstrap-forms', $location.'/css/bootstrap-forms.css', null, '1.0' );
	//wp_enqueue_style('bootstrap-scaffolding', $location.'/css/bootstrap-scaffolding.css', null, '1.0' );
	
	//wp_enqueue_style('style-icons', $location.'/css/icons.css', null, '1.0');
	
	
	//todo - added but should be proper bootstrap
	//wp_enqueue_style('style-bootstrap-buttongroups', $location.'/css/bootstrap-buttongroups.css', null, '1.0');
	
	
	//bootstrap
	wp_enqueue_style('bootstrap', $location.'/css/bootstrap.min.css', null, '1.0' );
	
	//wp_enqueue_style('bootstrap-but', $location.'/css/bootstrap-buttongroups.css', null, '1.0' );
	
	
	// icons
	wp_enqueue_style('style-fontawesome', $location.'/font-awesome/css/font-awesome.min.css', null, '1.0');
	
	
	
	
	wp_enqueue_style('style-layout', $location.'/css/layout.css', null, '1.0');
	
	wp_enqueue_style('style-ui', $location.'/css/ui.css', null, '1.0');
	wp_enqueue_style('style', $location.'/style.css', null, '1.0');
	wp_enqueue_style('style-defaults', $location.'/css/defaults.css', null, '1.0');
		wp_enqueue_style('style-layout-expanded', $location.'/css/layout-expanded.css', null, '1.0');
	wp_enqueue_style('style-layout-hovered', $location.'/css/layout-hovered.css', null, '1.0');
	wp_enqueue_style('style-gallery', $location.'/css/gallery.css', null, '1.0');
	wp_enqueue_style('style-page', $location.'/css/page.css', null, '1.0');
	wp_enqueue_style('style-sidebar', $location.'/css/sidebar.css', null, '1.0');
	
	
	wp_enqueue_style('style-layout-fixed', $location.'/css/layout-fixed.css', null, '1.0');
	wp_enqueue_style('style-layout-fluid', $location.'/css/layout-fluid.css', null, '1.0');
	
	wp_enqueue_style('style-masonry', $location.'/css/masonry.css', null, '1.0');
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    /** Call landing-page-template-one enqueue */
		wp_enqueue_style('style-reveal', $location.'/css/reveal.css', null, '1.0');
		wp_enqueue_style('style-reveal-min', $location.'/reveal/css/reveal.min.css', null, '1.0');
		//wp_enqueue_style('style-reveal-theme', $location.'/reveal/css/theme/default.css', null, '1.0');
		wp_enqueue_style('style-reveal-syntaxhighlight', $location.'/reveal/lib/css/zenburn.css', null, '1.0');
		
		wp_enqueue_script('reveal-head', $location.'/reveal/lib/js/head.min.js', null, '1.0', false );
		wp_enqueue_script('reveal-min', $location.'/reveal/js/reveal.min.js', null, '1.0', false );
   
		
	  
	  
	  // NEEDS TO OVERWRITE REVEAL STYLES
	 
	
	
	wp_enqueue_style('style-text', $location.'/css/text.css', null, '1.0');

	 wp_enqueue_style('style-colour', $location.'/css/colour.css', null, '1.0');
	    wp_enqueue_style('style-colour-text', $location.'/css/colour-text.css', null, '1.0');
	  
	//fonts
	//wp_enqueue_style('style-header_font', $location.'/fonts/ubuntu/stylesheet.css', null, '1.0');
	//wp_enqueue_style('style-header_font', $location.'/fonts/arvo/stylesheet.css', null, '1.0');
	//wp_enqueue_style('style-header_font', $location.'/fonts/opensans/stylesheet.css', null, '1.0');
	//wp_enqueue_style('style-header_font', $location.'/fonts/technique/stylesheet.css', null, '1.0');
	//wp_enqueue_style('style-header_font', $location.'/fonts/karnivore/stylesheet.css', null, '1.0');
	
	// skins - different skin folder


	//wp_enqueue_style('style-skin', $location.'/skins/default/skin.css', null, '1.0');
	//wp_enqueue_style('style-skin-colour', $location.'/skins/default/colour.css', null, '1.0');
	


	//wp_enqueue_style('style-skin', $location.'/skins/lab/skin.css', null, '1.0');
	//wp_enqueue_style('style-skin-colour', $location.'/skins/lab/colour.css', null, '1.0');
	

	
	//wp_enqueue_style('style-skin', $location.'/skins/ricmax/skin.css', null, '1.0');
	//wp_enqueue_style('style-skin-colour', $location.'/skins/ricmax/colour.css', null, '1.0');



	//wp_enqueue_style('style-skin', $location.'/skins/multistory/skin.css', null, '1.0');
	//wp_enqueue_style('style-layout-fixed', $location.'/skins/multistory/layout-fixed-960.css', null, '1.0');
	//wp_enqueue_style('style-gallery', $location.'/skins/multistory/gallery-960.css', null, '1.0');
	
	
	//wp_enqueue_style('style-bootswatch', $location.'/skins/bootswatch/amelia.css', null, '1.0');
	//wp_enqueue_style('style-bootswatch', $location.'/skins/bootswatch/cerulean.css', null, '1.0');
	//wp_enqueue_style('style-bootswatch', $location.'/skins/bootswatch/cosmo.css', null, '1.0');
	//wp_enqueue_style('style-bootswatch', $location.'/skins/bootswatch/cyborg.css', null, '1.0');
	//wp_enqueue_style('style-bootswatch', $location.'/skins/bootswatch/journal.css', null, '1.0');
	//wp_enqueue_style('style-bootswatch', $location.'/skins/bootswatch/readable.css', null, '1.0');
	//wp_enqueue_style('style-bootswatch', $location.'/skins/bootswatch/simplex.css', null, '1.0');
	//wp_enqueue_style('style-bootswatch', $location.'/skins/bootswatch/slate.css', null, '1.0');
	//wp_enqueue_style('style-bootswatch', $location.'/skins/bootswatch/spacelab.css', null, '1.0');
	//wp_enqueue_style('style-bootswatch', $location.'/skins/bootswatch/spruce.css', null, '1.0');
	//wp_enqueue_style('style-bootswatch', $location.'/skins/bootswatch/superhero.css', null, '1.0');
	//wp_enqueue_style('style-bootswatch', $location.'/skins/bootswatch/united.css', null, '1.0');
	
	
	// start - ric insert-posts 
	/*
	// validation
	wp_register_script( 'validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'validation' );
	// custom jquery
	wp_register_script( 'custom_js', $location.'/insert-posts/jquery.custom.js', array( 'jquery' ), '1.0', TRUE );
	wp_enqueue_script( 'custom_js' );
	*/
	
	
	// bootstrap
	wp_enqueue_script('bootstrap', $location.'/js/libs/bootstrap/bootstrap.min.js', array('jquery'), '1.0', true );
	//	wp_enqueue_script('carousel', $location.'/js/libs/bootstrap/carousel.js', array('jquery'), '1.0', true );
	
	
	
	wp_enqueue_script('modernizr', $location.'/js/libs/modernizr/modernizr-2.5.3-respond-1.1.0.min.js', null, '2.5.3', false );
	wp_enqueue_script('jQuery Easing', $location.'/js/libs/jquery/jquery.easing.1.3.js', null, '1.3', false );
	wp_enqueue_script('gmaps', 'http://maps.google.com/maps/api/js?sensor=false', null, null, true );
	wp_enqueue_script('Gmapper', $location.'/js/libs/gmapper/gmapper.js', null, '0.2', false );
	wp_enqueue_script('Flux', $location.'/js/flux.min.js', null, '0.2', false );
	
	
	
	wp_enqueue_script('NiceScroll', $location.'/js/jquery.nicescroll.min.js', null, '1.1', true );
	
	
	
	wp_enqueue_script('FitText', $location.'/js/jquery.fittext.js', null, '1.1', true );
	
	
	wp_enqueue_script('Isotope', $location.'/js/jquery.isotope.min.js', null, '1', true );
	
	wp_enqueue_script('Masonry', $location.'/js/jquery.masonry.min.js', null, '1', true );
	
	//wp_enqueue_script('PopCorn', $location.'/js/libs/popcorn/popcorn-complete.js', null, '1.3', false );
	wp_enqueue_script("swfobject");
	wp_enqueue_script('brandhub', $location.'/js/brandhub.js', null, '0.1', false );
	//wp_enqueue_script('mytheme-themecustomizer', $location.'/js/theme-customizer.js', array('jquery','customize-preview'), '', true );
	
	if (is_singular())
	$id = get_the_ID();
	wp_localize_script('brandhub', 'WP', array(
		'adminAjax' => admin_url('admin-ajax.php'),
		'postId' => @$id
	));

}

/* Add supported post types */
add_theme_support( 'post-formats', array( 'post','video','gallery','image','audio','aside','status','quote','chat' ) );


/* make site loops search attachments too! */
function extend_main_query( $query ) {

//only show posts / pages / galleries on home but search attachments if search / elsewhere!
	if( !is_admin() && !is_front_page() && $query->is_main_query()) {
		$post_types = array('post','page','presentation','instagram','attachment');
		$post_statuses = array('publish' ,'inherit');
		set_query_var('post_status', $post_statuses);
		set_query_var('post_type', $post_types);
		//set_query_var('author' , '1' );
	}
	return $query;
}
add_filter( 'pre_get_posts' , 'extend_main_query' );


/**
 * Allows the order of posts to be modified with a query var.
 * Mainly used by the filter dropdown on the index.
 */
 
add_action('pre_get_posts', 'order_by');
function order_by($query) {
	if (!isset($_GET['orderby'])) return;
	if ($_GET['orderby'] == 'comments') {
		$orderby = 'comment_count';
	} elseif ($_GET['orderby'] == 'date') {
		$orderby = 'date';
	} elseif ($_GET['orderby'] == 'random') {
		$orderby = 'rand';
	} else {
		return;
	}
	$query->set('orderby', $orderby);
}


/**
 * Increment the pageview count over AJAX
 */
 
add_action('wp_ajax_add_pageview', 'add_pageview');
add_action('wp_ajax_nopriv_add_pageview', 'add_pageview');
function add_pageview() {
	if (isset($_GET))
		$post_id = $_GET['post_id'];
	if (!@$post_id)
		die('no post specified');
	$key = 'pageviews';
	$count = get_post_meta($post_id, $key, true);
	if ($count == null)
		$count = 0;
	$count++;
	update_post_meta($post_id, $key, $count);
	echo json_encode(
		array(
			'views' => $count
		));
	exit;
}

/* super useful function that adds the page slug to the body class */
add_filter( 'body_class', 'add_body_class' );
function add_body_class( $classes ) {
	global $post;
	if ( isset( $post ) && (is_single() || (is_page()) ||  (is_search()) ) )
		$classes[] = $post->post_type . '-' . $post->post_name;
	return $classes;
}

/* add custom class to menu-items */
add_filter( 'nav_menu_css_class', 'my_special_nav_class', 10, 2 );
function my_special_nav_class( $classes, $item ) {
	$classes[] = '';
	return $classes;
}



/* tags / categories for images ------------------------------------------------------------- */

/*http://wp.tutsplus.com/tutorials/creative-coding/applying-categories-tags-and-custom-taxonomies-to-media-attachments/ */


// apply categories
function wptp_add_categories_to_attachments() {
    register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init' , 'wptp_add_categories_to_attachments' );

// apply tags to attachments
function wptp_add_tags_to_attachments() {
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}
add_action( 'init' , 'wptp_add_tags_to_attachments' );



// register new taxonomy which applies to attachments
function wptp_add_location_taxonomy() {
    $labels = array(
        'name'              => 'Locations',
        'singular_name'     => 'Location',
        'search_items'      => 'Search Locations',
        'all_items'         => 'All Locations',
        'parent_item'       => 'Parent Location',
        'parent_item_colon' => 'Parent Location:',
        'edit_item'         => 'Edit Location',
        'update_item'       => 'Update Location',
        'add_new_item'      => 'Add New Location',
        'new_item_name'     => 'New Location Name',
        'menu_name'         => 'Location',
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => 'true',
        'rewrite' => 'true',
        'show_admin_column' => 'true',
    );
 
    register_taxonomy( 'location', 'attachment', $args );
}
add_action( 'init', 'wptp_add_location_taxonomy' );



















/* ---------------------------------------------------------------------------------------------------------- */



/* add oembed handlers */
add_action( 'init', 'ag_add_oembed_handlers' );
function ag_add_oembed_handlers() {
	//wp_oembed_add_provider( 'http://soundcloud.com/*', 'http://soundcloud.com/oembed' );
}

/* resize oembeds */
if ( !isset( $content_width ) ) $content_width = 300;

/* Register Primary and Secondary Nav menus */
register_nav_menu( 'primary', 'Primary Navigation - Navbar' );
register_nav_menu( 'secondary', 'Secondary Navigation - Sidebar' );

/* Shorten default excerpt */
add_filter( 'excerpt_length', 'custom_excerpt_length');
function custom_excerpt_length( $length ) {
		return 20;
}

/**
 * Filters results from the last 30 days
 */
function filter_when_30_days( $where = '' ) {
	$where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
	return $where;
}

/**
 * Filters results from the last 7 days
 */
function filter_when_7_days( $where = '' ) {
	$where .= " AND post_date > '" . date('Y-m-d', strtotime('-7 days')) . "'";
	return $where;
}

/**
 * Filters results from the last 24 hrs
 */
function filter_when_24_hrs( $where = '' ) {
	$where .= " AND post_date > '" . date('Y-m-d', strtotime('-24 hours')) . "'";
	return $where;
}

// Register Custom Navigation Walker
require_once(get_template_directory() . '/include/twitter_bootstrap_nav_walker.php');