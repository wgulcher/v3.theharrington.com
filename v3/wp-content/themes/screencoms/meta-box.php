<?php 

$prefix = 'YOUR_PREFIX_';

global $meta_boxes;
$meta_boxes = array();


// Content Rating
$meta_boxes[] = array(
	'id' => 'contentRating',
	'title' => __( 'Rating', 'rwmb' ),
	'pages' => array( 'post' ),
	'context' => 'side',
	'priority' => 'high',
	'autosave' => false,
	'fields' => array(
	
		// SLIDER
		array(
			'name' => __( '<h4>Content Rating</h4>Rate this piece of content by sliding the bar to your rating.<br><br>', 'rwmb' ),
			'id'   => "{$prefix}slider",
			'type' => 'slider',

			// Text labels displayed before and after value
			'prefix' => __( 'level: ', 'rwmb' ),
			'suffix' => __( ' %', 'rwmb' ),

			// jQuery UI slider options. See here http://api.jqueryui.com/slider/
			'js_options' => array(
				'min'   => 0,
				'max'   => 100,
				'step'  => 1,
			),
		),
		
		
	
	)
);


// Dates
$meta_boxes[] = array(
	'id' => 'contentDates',
	'title' => __( 'Date Range', 'rwmb' ),
	'pages' => array( 'post' ),
	'context' => 'side',
	'priority' => 'high',
	'autosave' => false,
	'fields' => array(
		
		// DATE FROM
		array(
			'name' => __( 'If relevant, select the start and end dates of the content.<br><br>', 'rwmb' ),
			'id'   => "{$prefix}datefrom",
			'type' => 'date',

			// jQuery date picker options. See here http://api.jqueryui.com/datepicker
			'js_options' => array(
				'appendText'      => __( ' Start Date', 'rwmb' ),
				'dateFormat'      => __( 'yy-mm-dd', 'rwmb' ),
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
		
		// DATE TO
		array(
			
			'id'   => "{$prefix}dateto",
			'type' => 'date',

			// jQuery date picker options. See here http://api.jqueryui.com/datepicker
			'js_options' => array(
				'appendText'      => __( ' End Date', 'rwmb' ),
				'dateFormat'      => __( 'yy-mm-dd', 'rwmb' ),
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			),
		),
	
	)
);


// Related Posts
$meta_boxes[] = array(
	'id' => 'main',
	'title' => __( 'Related Content', 'rwmb' ),
	'pages' => array( 'page','post' ),
	
	'priority' => 'high',
	'autosave' => false,
	'fields' => array(

		// POST
		array(
			
			'name'    => __( '<h4>Related Posts or Slides</h4>Select the posts or slides below that are related to this content. They will appear in the order they are added.<br><br>', 'rwmb' ),
			'id'      => "{$prefix}pages",
			'type'    => 'post',
			
			// Post type
			'post_type' => 'post',
			// Field type, either 'select' or 'select_advanced' (default)
			'field_type' => 'select_advanced',
			'multiple' => true,
			
			// Query arguments (optional). No settings means get all published posts
			'query_args' => array(
				'post_status' => 'publish',
				'posts_per_page' => '-1',
			)
		),
		
		// DIVIDER
		array(
			'type' => 'divider',
			'id'   => 'fake_divider_id', // Not used, but needed
		),
		
		// RELATED URLS
		array(
			// Field name - Will be used as label
			'name'  => __( '<h4>Related URLs</h4>Add related URLs to this piece of content below by simply clicking the + icon.<br><br>', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "{$prefix}urls",
			// Field description (optional)
			'desc'  => __( 'Enter the external urls that are related to this content below', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( 'Enter URL here', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => true,
		),
	)
);



// Related Content
$meta_boxes[] = array(
	'id' => 'relatedContent',
	'title' => __( 'Category-based Post Feed', 'rwmb' ),
	'pages' => array( 'page' ),
	'context' => 'side',
	'priority' => 'high',
	'autosave' => false,
	'fields' => array(
	
		// TAXONOMY
		array(
			'name'    => __( 'Select a category below to attach a feed of posts that are associated with that category. If non is selected the feed will not show.<br><br>', 'rwmb' ),
			'id'      => "{$prefix}querytaxonomy",
			'type'    => 'taxonomy',
			 'multiple'    => false,
			'options' => array(
				// Taxonomy name
				'taxonomy' => 'category',
				// How to show taxonomy: 'checkbox_list' (default) or 'checkbox_tree', 'select_tree', select_advanced or 'select'. Optional
				'type' => 'select_advanced',
				// Additional arguments for get_terms() function. Optional
				'args' => array()
			),
		),
	)
);


// Logos
$meta_boxes[] = array(
	'id' => 'logos',
	'title' => __( 'Logos', 'rwmb' ),
	'pages' => array( 'post' ),
	'context' => 'side',
	'priority' => 'low',
	'autosave' => false,
	'fields' => array(
			
		// HEADING
		array(
			'type' => 'heading',
			'name' => __( 'Company / Brand Logos', 'rwmb' ),
			'id'   => 'fake_id_logo', // Not used but needed for plugin
		),
	
		// IMAGE ADVANCED (WP 3.5+)
		array(
			'id'               => "{$prefix}imglogo",
			'type'             => 'image_advanced',
			'max_file_uploads' => 10,
		),
		
		// DIVIDER
		array(
			'type' => 'divider',
			'id'   => 'fake_divider_id', // Not used, but needed
		),

		// HEADING
		array(
			'type' => 'heading',
			'name' => __( 'Agencies Logo', 'rwmb' ),
			'id'   => 'fake_id_logo_parent', // Not used but needed for plugin
		),
	
		// IMAGE ADVANCED (WP 3.5+)
		array(
			'id'               => "{$prefix}imglogo_parent",
			'type'             => 'image_advanced',
			'max_file_uploads' => 10,
		),
	)
);


/********************* META BOX REGISTERING ***********************/
function YOUR_PREFIX_register_meta_boxes()
{
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;
	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );