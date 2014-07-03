<?php

/* 	=======================================================================================================

CODE INFLUENCED BY: 
http://themefoundation.com/wordpress-theme-customizer/ - the best!!! AND http://wp.smashingmagazine.com/2013/03/05/the-wordpress-theme-customizer-a-developers-guide/

STANDARD WP THEME SECTIONS:
title_tagline - Site Title & Tagline
colors - Colors
header_image - Header Image
background_image - Background Image
nav - Navigation
static_front_page - Static Front Page

======================================================================================================= */

/*
//remove section
$wp_customize->remove_section( 'title_tagline')

*/


/*

	// 	@richardmax TODO - colours saving

	// UNUSED<em></em>

	//add page drop down
		
	$wp_customize->add_setting(
		'page-setting',
		array(
			'sanitize_callback' => 'example_sanitize_integer',
		)
	);
	 
	$wp_customize->add_control(
		'page-setting',
		array(
			'type' => 'dropdown-pages',
			'label' => 'Choose a page:',
			'section' => 'colors',
		)
	);

	// add image upload
	$wp_customize->add_setting( 'img-upload' );
	 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'img-upload',
			array(
				'label' => 'Image Upload',
				'section' => 'header_image',
				'settings' => 'img-upload'
			)
		)
	);
	
	*/














/* =======================================================================================================
Sanitize the user inputted data - start
======================================================================================================= */


/*

// interger (page select)
function example_sanitize_integer( $input ) {
	if( is_numeric( $input ) ) {
		return intval( $input );
	}
}

*/

/* ==================================================================================
SANITIZE POST SETTINGS
===================================================================================== */

// post shape various - radio

/*
function sanitize_post_shape_various( $input ) {
	$valid = array(
		  'variedwidth' => 'Varied Width, Fixed Height',
		  'variedheight' => 'Fixed Width, Varied Height',
		  'contentdefinedshape' => 'Content Type Defines Shape',
		  'postdefinedshape' => 'Post Setting Defines Shape',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

*/


// post shape - radio
function sanitize_post_shape( $input ) {
	$valid = array(
		  'square' => 'Square',
		  'rectangle' => 'Rectangle',
		  'circle' => 'Circle',
		  'various' => 'Various',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}



// post size - radio
function sanitize_post_size( $input ) {
	$valid = array(
		'thumbnail' => 'Thumb',
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large',
				'popularitydefinedsize' => 'Popularity Defines Size',
				'postdefinedsize' => 'Post Setting Defines Size',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

// post layout - radio
function sanitize_post_layout( $input ) {
	$valid = array(
		'visual' => 'Image Only',
		'data' => 'Image + Data',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

// post immage fit - radio
function sanitize_post_image_fit( $input ) {
	$valid = array(
		'cover' => 'Fill area',
		'contain' => 'Fit within area',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

// post click - radio
function sanitize_post_click( $input ) {
	$valid = array(
		'default' => 'View Post',
		  'expand' => 'Expand Post',
		  'hover' => 'Enlarge Post',
		  'flip' => 'Flip Post',
		  'reveal' => '3D Post',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}





/* ==================================================================================
SANITIZE IS USER EDITABLE
===================================================================================== */

// Show hide site options - checkbox
function sanitize_theme_isusereditable( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}






/* ==================================================================================
SANITIZE SHOW HIDE MENUS
===================================================================================== */

// Show hide site options - checkbox
function sanitize_show_siteoptions( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

// Show hide insert posts menu - checkbox
function sanitize_insertpostsmenu( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

// Show hide nav bar - checkbox
function sanitize_show_navbar( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

// Show hide filtermenu-view - checkbox
function sanitize_show_filtermenuview( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

// Show hide filtermenu-query - checkbox
function sanitize_show_filtermenuquery( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

// Show hide feedoptions - checkbox
function sanitize_show_feedoptions( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}





/* ==================================================================================
	SANITIZE FONTS
===================================================================================== */

// font - select
function sanitize_font_select( $input ) {
	$valid = array(
		'default' => 'Open Sans (Default)',
		'ubuntu' => 'Ubuntu',
		'arvo' => 'Arvo',
		'technique' => 'Technique',
		'karnivore' => 'Karnivore',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}


// font - upload
// no sanitization possible!!!



/* ==================================================================================
	SANITIZE HEADER
===================================================================================== */

// logo placement - select
function sanitize_logo_placement( $input ) {
	$valid = array(
		'left' => 'Left',
		'right' => 'Right',
		'center' => 'Center',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}





/* ==================================================================================
	SANITIZE SKIN
===================================================================================== */

// select skin - select
function sanitize_select_skin( $input ) {
	$valid = array(
		'default' => 'Default',
		'ricmax' => 'RicMax',
		'lab' => 'Lab',
		'wireframe' => 'Wireframe',
		'bootswatch' => 'Bootswatch',
		'multistory' => 'Multistory',
		'shrinkhover' => 'Shrinkhover',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}


// show grid
function sanitize_show_grid( $input ) {
	if ( $input == 1 ) {
		return 'grid-on';
	} else {
		return '';
	}
}		


// ignore user css - checkbox
function sanitize_ignore_user_css( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}		





/* ==================================================================================
	SANITIZE FOOTER SETTINGS
===================================================================================== */
	

// Show hide footer - checkbox
function sanitize_show_footer( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}		

// Footer - right hand text
function sanitize_footer_right_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

// Footer - left hand text
function sanitize_footer_left_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}





/* ==================================================================================
	SANITIZE SOCIAL DATA SETTINGS
===================================================================================== */

// all
function sanitize_socialnetworks_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}





/* ==================================================================================
	SANITIZE COLOUR
===================================================================================== */

// ALL HEX SANTIZATION NOT AVAILABLE CURRENTLY

/* Light or Dark ------------------------------------------------------------------------------- */
function sanitize_lightordark( $input ) {
	$valid = array(
		'light' => 'Light',
		'dark' => 'Dark',
	);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}










































/* =======================================================================================================
Set defaults for standard wordpress theme customisation sections, paramas - start
======================================================================================================= */

// logo
$logo_defaults = array(
	'default-image'          => get_template_directory_uri() . '/img/logo.png',
	/*'random-default'         => false,*/
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '999999',
	'header-text'            => true,
	'uploads'                => false,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $logo_defaults );





// add ability to select custom logo

add_action( 'after_setup_theme', 'customtheme_add_header_images' );

function customtheme_add_header_images()
{
    register_default_headers( 
        array(
            'a_short_name' => array(
            'url' => '%s/img/logo.png',
            'thumbnail_url' => '%s/img/logo.png',
            'description' => __( 'Wheel', 'brandhub' )
        )/*,
        'another_image' => array(
            'url' => '%s/img/logo.png',
            'thumbnail_url' => '%s/img/logo.png',
            'description' => __( 'Shore', 'brandhub' )
        )
		*/
        )
    );
}

// background




$bg_defaults = array(
	'default-color' => '000000',
	//'default-image' => get_template_directory_uri() . '/img/body_bg_light.png', */
);
add_theme_support( 'custom-background', $bg_defaults );

// feed links
add_theme_support( 'automatic-feed-links' );



/* =======================================================================================================
Register Theme Customisation - New (Non Standard WP) Fields
======================================================================================================= */

function mytheme_customize_register( $wp_customize ) {
	













/**
 * Adds textarea support to the theme customizer
 */
class Example_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}



	

	
	















	
	
	// COLOURS LOOP	LOGIC START
		
	$colors = array();
	$colors[] = array(
		'slug'=>'header_bg_color', 
		'default' => '#fff',
		'label' => 'Header Background Colour',
	);
	$colors[] = array(
		'slug'=>'sidebar_bg_color', 
		'default' => '#fff',
		'label' => 'Sidebar Background Colour',
	);
	$colors[] = array(
		'slug'=>'footer_bg_color', 
		'default' => '#fff',
		'label' => 'Footer Background Colour',
	);
	
	$colors[] = array(
		'slug'=>'content_background_color', 
		'default' => '#fff',
		'label' => 'Post Background Color',
	);
	$colors[] = array(
		'slug'=>'title_text_color', 
		'default' => '#333',
		'label' => 'Title Text Color',
	);
	$colors[] = array(
		'slug'=>'content_text_color', 
		'default' => '#333',
		'label' => 'Page / Single Post Text Color',
	);
	$colors[] = array(
		'slug'=>'postfeed_text_color', 
		'default' => '#333',
		'label' => 'Post Feed Text Color',
	);
	$colors[] = array(
		'slug'=>'content_link_color', 
		'default' => '#88C34B',
		'label' => 'Content Link Color',
	);
	
	$colors[] = array(
		'slug'=>'ui_color', 
		'default' => '#fff',
		'label' => 'UI (Buttons) Background Color',
	);
	foreach( $colors as $color ) {
		// SETTINGS
		$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 'edit_theme_options'
			)
		);
		// CONTROLS
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array('label' => $color['label'], 
				'section' => 'colors',
				'settings' => $color['slug'])
			)
		);

	}



/* ==================================================================================
	POST SETTINGS
	===================================================================================== */

	/* Shape Options for Various ----------------------------------------------------------------------- */
	
	/*
	$wp_customize->add_setting(
		'post_shape_various',
		array(
			'default' => 'variedheight',
			'sanitize_callback' => 'sanitize_post_shape_various',
		)
	);
	 
	$wp_customize->add_control(
		'post_shape_various',
		array(
			'type' => 'select',
			'label' => 'Shape Options for Various',
			'section' => 'static_front_page',
			'choices' => array(
				'variedwidth' => 'Varied Width, Fixed Height',
				'variedheight' => 'Fixed Width, Varied Height',
				'contentdefinedshape' => 'Content Defines Shape',
				'postdefinedshape' => 'Post Setting Defines Shape',
			),
		)
	);
	
	*/

	/* Post Shape ----------------------------------------------------------------------- */
	
	
	$wp_customize->add_setting(
		'post_shape',
		array(
			'default' => 'various',
			//'transport' => 'refresh',
			//'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_post_shape',
		)
	);
	 
	$wp_customize->add_control(
		'post_shape',
		array(
			'type' => 'select',
			'label' => 'Layout (based on images only)',
			'section' => 'static_front_page',
			'choices' => array(
				'square' => 'Squares',
				'rectangle' => 'Rectangles',
				'circle' => 'Circles',
				'various' => 'Best Fit (Various)',
			),
		)
	);
	
	/* Post Size ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'post_size',
		array(
			'default' => 'medium',
			'sanitize_callback' => 'sanitize_post_size',
		)
	);
	 
	$wp_customize->add_control(
		'post_size',
		array(
			'type' => 'select',
			'label' => 'Default Post Size',
			'section' => 'static_front_page',
			'choices' => array(
				'thumbnail' => 'Thumb',
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large',
				'popularitydefinedsize' => 'Popularity Defines Size',
				'postdefinedsize' => 'Post Setting Defines Size',
			),
		)
	);
	
	
	/* Post Layout ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'post_layout',
		array(
			'default' => 'visual',
			'sanitize_callback' => 'sanitize_post_layout',
		)
	);
	 
	$wp_customize->add_control(
		'post_layout',
		array(
			'type' => 'select',
			'label' => 'Post Displays',
			'section' => 'static_front_page',
			'choices' => array(
				'visual' => 'Images Only',
				'data' => 'Image + Data',
			),
		)
	);
	
	/* Image Fit ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'post_image_fit',
		array(
			'default' => 'cover',
			'sanitize_callback' => 'sanitize_post_image_fit',
		)
	);
	 
	$wp_customize->add_control(
		'post_image_fit',
		array(
			'type' => 'select',
			'label' => 'Images (Crop / Show All)',
			'section' => 'static_front_page',
			'choices' => array(
				'cover' => 'Crop to fill',
				'contain' => 'Show all within area',
			),
		)
	);
	
	/* Click Action ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'post_click',
		array(
			'default' => 'default',
			'sanitize_callback' => 'sanitize_post_click',
		)
	);
	 
	$wp_customize->add_control(
		'post_click',
		array(
			'type' => 'select',
			'label' => 'Default Post Click Action',
			'section' => 'static_front_page',
			'choices' => array(
				'default' => 'View Post',
				'expand' => 'Expand Post',
				'hover' => 'Hover Post',
				'flip' => 'Flip Post',
				'reveal' => '3D Post',
			),
		)
	);
	






		
	/* ==================================================================================
	 THEME EDIT PERMISSIONS SETTINGS
	===================================================================================== */
	
	/*
	
		$wp_customize->add_section(
		'theme_edit_permissions_section',
		array(
			'title' => 'UI - User Control Options',
			'description' => 'This controls whether the user can override the theme custmomization settings and view how they wish. Requires HTML5 local storage for auto saving.',
			'priority' => 1019,
		)
	);
	
	*/
	

	/* User can edit theme  ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'theme_isusereditable',
		array(
			'default' => '',
			'transport' => 'refresh',
			//'transport' => 'postMessage',
			'sanitize_callback' => 'sanitize_theme_isusereditable',
		)
	);
		
	$wp_customize->add_control(
		'theme_isusereditable',
		array(
			'type' => 'checkbox',
			'label' => 'Users edits overwrite theme customizer',
			'section' => 'theme_edit_permissions_section',
		)
	);






	
	/* ==================================================================================
	SHOW / HIDE USER MENUS
	===================================================================================== */
	
	/*
	$wp_customize->add_section(
		'show_usermenus_section',
		array(
			'title' => 'UI - Menu Display Options',
			'description' => 'This enables you to show or hide the control settings for users.',
			'priority' => 2000,
		)
	);
	*/
	
	/* Show hide site options  ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'show_siteoptions',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_show_siteoptions',
		)
	);
		
	$wp_customize->add_control(
		'show_siteoptions',
		array(
			'type' => 'checkbox',
			'label' => 'Hide site options',
			'section' => 'show_usermenus_section',
		)
	);
		
	
	/* Show hide insert posts  ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'show_insertpostsmenu',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_insertpostsmenu',
		)
	);
		
	$wp_customize->add_control(
		'show_insertpostsmenu',
		array(
			'type' => 'checkbox',
			'label' => 'Hide insert posts menu',
			'section' => 'show_usermenus_section',
		)
	);
	
	/* Show hide navbar  ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'show_navbar',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_show_navbar',
		)
	);
		
	$wp_customize->add_control(
		'show_navbar',
		array(
			'type' => 'checkbox',
			'priority' => '-46',
			'label' => 'Hide primary navigation menu (nav bar)',
			'section' => 'colors',
			/*'section' => 'nav',*/
		)
	);
	
	/* Show filter menu view  ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'show_filtermenuview',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_show_filtermenuview',
		)
	);
		
	$wp_customize->add_control(
		'show_filtermenuview',
		array(
			'type' => 'checkbox',
			'label' => 'Hide filter menu - view',
			'section' => 'show_usermenus_section',
		)
	);
	
	/* Show filter menu query  ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'show_filtermenuquery',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_show_filtermenuquery',
		)
	);
		
	$wp_customize->add_control(
		'show_filtermenuquery',
		array(
			'type' => 'checkbox',
			'label' => 'Hide filter menu - query',
			'section' => 'show_usermenus_section',
		)
	);
	
	
	/* Show feed options  ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'show_feedoptions',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_show_feedoptions',
		)
	);
		
	$wp_customize->add_control(
		'show_feedoptions',
		array(
			'type' => 'checkbox',
			'label' => 'Hide feed options',
			'section' => 'show_usermenus_section',
		)
	);
	
	

/* ==================================================================================
	FONT SETTINGS
	===================================================================================== */
	
	
	

	
	
	
	/* Select Logo Font  ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'font',
		array(
			'default' => 'default',
			'sanitize_callback' => 'sanitize_font_select',
		)
	);
	 
	$wp_customize->add_control(
		'font',
		array(
			'type' => 'select',
			'label' => 'Logo Font',
			'section' => 'colors',
			'priority' => '-46',
			'choices' => array(
				'default' => 'Open Sans (Default)',
				'ubuntu' => 'Ubuntu',
				'arvo' => 'Arvo',
				'technique' => 'Technique',
				'karnivore' => 'Karnivore',
			),
		)
	);


	/* Custom Font  ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
		'font-upload',
		 array(
			/*'sanitize_callback' => 'sanitize_font_nav',*/
		)
	);
	 
	$wp_customize->add_control(
		new WP_Customize_Upload_Control(
			$wp_customize,
			'font-upload',
			array(
				'label' => 'Upload custom font',
				'section' => 'fonts_section',
				'settings' => 'font-upload'
			)
		)
	);
	



	/* ==================================================================================
	HEADER IMAGE
	===================================================================================== */
	
	
	
	
	
	
	
		/* Custom Header */

	// Renaming "static front page" section
	$wp_customize->add_section( 'background_image', array(
	'title' => __( 'Background Image','screencoms'),

	'priority' => 11,
	) );
	
	// Renaming "static front page" section
	$wp_customize->add_section( 'nav', array(
	'title' => __( 'Navigation' ,'screencoms'),

	'priority' => 15,
	) );
	
		
	// Renaming "static front page" section
	$wp_customize->add_section( 'static_front_page', array(
	'title' => __( 'Homepage / Dashboard' ,'screencoms'),

	'priority' => 20,
	) );	
	
	// Renaming "Title" section
	$wp_customize->add_section( 'title_tagline', array(
	'title' => __( 'Title and Tagline' ,'screencoms'),
	
	'priority' => 0,
	) );
	
	// Renaming "Header Image" section to "Logo"
	$wp_customize->add_section( 'header_image', array(
	'title' => __( 'Logo / Header Image' ,'screencoms'),
	'theme_supports' => 'custom-header',
	'priority' => 10,
	) );
	
	// Renaming "COLORS"
	$wp_customize->add_section( 'colors', array(
	'title' => __( 'Skin, Font and Colours' ,'screencoms'),
	'priority' => 100,
	) );

	// aDDING SOCIA;L DATA
	$wp_customize->add_section( 'socialnetworks', array(
	'title' => __( 'Social Networks' ,'screencoms'),
	'priority' => 101,
	) );
	
	/* Show text or Logo ------------------------------------------------------------------------------- */
	$wp_customize->add_control( 'display_header_text', array(
		'settings' => 'header_textcolor',
		'label'    => __( 'Display Header Text' ,'screencoms' ),
		'section'  => 'title_tagline',
		'type'     => 'checkbox',
	) );
	
		
	/* Logo Placement ------------------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'logo_placement',
		array(
			'default' => 'left',
			'sanitize_callback' => 'sanitize_logo_placement',
		)
	);
	 
	$wp_customize->add_control(
		'logo_placement',
		array(
			'type' => 'select',
			'label' => 'Logo placement',
			'section' => 'title_tagline',
			'choices' => array(
				'left' => 'Left',
				'right' => 'Right',
				'center' => 'Center',
			),
		)
	);



		
		

/* ==================================================================================
	SKIN SETTINGS
	===================================================================================== */

		
	
	
	/* Select Skin ------------------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'select_skin',
		array(
			'default' => 'default',
			'sanitize_callback' => 'sanitize_select_skin',
		)
	);
	 
	$wp_customize->add_control(
		'select_skin',
		array(
			'type' => 'select',
			'label' => 'Site Skin',
			'priority' => '-50',
			'section' => 'colors',
			'choices' => array(
				'default' => 'Default',
		'ricmax' => 'RicMax', 
		'lab' => 'Lab',
		'wireframe' => 'Wireframe',
		'bootswatch' => 'Bootswatch',
		'multistory' => 'Multistory',
		'shrinkhover' => 'Shrinkhover',
			),
		)
	);
	
	
	/* show grid  ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'show_grid',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_show_grid',
		)
	);
		
	$wp_customize->add_control(
		'show_grid',
		array(
			'type' => 'checkbox',
			'priority' => '-46',
			'label' => 'Show Background Grid',
			'section' => 'colors',
		)
	);
		
	
		
	/* Ignore useer css  ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'ignore_user_css',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_ignore_user_css',
		)
	);
		
	$wp_customize->add_control(
		'ignore_user_css',
		array(
			'type' => 'checkbox',
			'priority' => '-45',
			'label' => 'Ignore Colour Settings Below',
			'section' => 'colors',
		)
	);
		
	
	
	/* ==================================================================================
	FOOTER SETTINGS
	===================================================================================== */
	
	
	
		$wp_customize->add_section(
		'footer_settings_section',
		array(
			'title' => 'Footer',
			'description' => 'This enables you to tailor tthe way posts are presented by default.',
			'priority' => 30,
		)
	);
	
	
	
	/* Show footer  ----------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'show_footer',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_show_footer',
		)
	);
		
	$wp_customize->add_control(
		'show_footer',
		array(
			'type' => 'checkbox',
			'label' => 'Hide footer',
			'section' => 'footer_settings_section',
		)
	);
		
	
	/* Righthand Footer Text Box ----------------------------------------------------------------------- */
	
	$wp_customize->add_setting( 
	'footer_right_textbox',
	array(
			'default' => 'Design, Development and Copyright &copy; Richard Max 2013',
			'sanitize_callback' => 'sanitize_footer_right_text',
	));
	 
	$wp_customize->add_control(
		new Example_Customize_Textarea_Control(
			$wp_customize,
			'footer_right_textbox',
			array(
				'label' => 'Righthand Text Box',
				'section' => 'footer_settings_section',
				'settings' => 'footer_right_textbox',
			)
		)
	);
	
	/* Righthand Footer Text Box ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'footer_left_textbox',
	array(
			'default' => 'This wordpress theme uses <a><i class="icon-html5 icon-border icon-min-line-height"></i> HTML5</a> <a><i class="icon-css3 icon-border icon-min-line-height"></i> CSS3</a>',
			'sanitize_callback' => 'sanitize_footer_left_text',
	));
	 
	$wp_customize->add_control(
		new Example_Customize_Textarea_Control(
			$wp_customize,
			'footer_left_textbox',
			array(
				'label' => 'Lefthand Text Box',
				'section' => 'footer_settings_section',
				'settings' => 'footer_left_textbox',
			)
		)
	);
		
		
	




	/* ==================================================================================
	social networks
	===================================================================================== */
	
	
	/* Facebook ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'facebook_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'facebook_id', array(
		'label' => 'Facebook',
		'section' => 'socialnetworks',
	) );
		
	/* Twitter ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'twitter_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'twitter_id', array(
		'label' => 'Twitter',
		'section' => 'socialnetworks',
	) );
	
/* YouTube ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'youtube_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'youtube_id', array(
		'label' => 'YouTube',
		'section' => 'socialnetworks',
	) );

/* sPOTIFY ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'spotify_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'spotify_id', array(
		'label' => 'Spotify',
		'section' => 'socialnetworks',
	) );


/* Soundcloud ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'soundcloud_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'soundcloud_id', array(
		'label' => 'Soundcloud',
		'section' => 'socialnetworks',
	) );


/* Delicious ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'delicious_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'delicious_id', array(
		'label' => 'Delicious',
		'section' => 'socialnetworks',
	) );

/* Google+ ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'googleplus_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'googleplus_id', array(
		'label' => 'Google+',
		'section' => 'socialnetworks',
	) );
	

/* Linked In ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'linkedin_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'linkedin_id', array(
		'label' => 'Linked In',
		'section' => 'socialnetworks',
	) );
	
/* GitHub ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'github_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'github_id', array(
		'label' => 'GitHub',
		'section' => 'socialnetworks',
	) );

	
/* CodePen ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'codepen_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'codepen_id', array(
		'label' => 'Codepen',
		'section' => 'socialnetworks',
	) );

	
/* Flickr ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'flickr_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'flickr_id', array(
		'label' => 'Flickr',
		'section' => 'socialnetworks',
	) );

	
/* Instagram ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'instagram_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'instagram_id', array(
		'label' => 'Instagram',
		'section' => 'socialnetworks',
	) );	
	
/* Pinterset ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'pinterest_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'pinterest_id', array(
		'label' => 'Pinterest',
		'section' => 'socialnetworks',
	) ); 	
	/* Instapaper ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'instapaper_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'instapaper_id', array(
		'label' => 'Instapaper',
		'section' => 'socialnetworks',
	) );
	
	
	/* TripIt ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'tripit_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'tripit_id', array(
		'label' => 'Tripit',
		'section' => 'socialnetworks',
	) );	
	
	
	/* Tumblr ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'tumblr_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'tumblr_id', array(
		'label' => 'Tumblr',
		'section' => 'socialnetworks',
	) );
	
	/* Foursquare ----------------------------------------------------------------------- */
	$wp_customize->add_setting( 
	'foursquare_id',
	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_socialnetworks_text',
	));
	 
	$wp_customize->add_control( 'foursquare_id', array(
		'label' => 'Foursquare',
		'section' => 'socialnetworks',
	) );
	
	/* ==================================================================================
	COLOURS
	===================================================================================== */
	

	
	/* Light or Dark ------------------------------------------------------------------------------- */
	$wp_customize->add_setting(
		'lightordark',
		array(
			'default' => 'light',
			'sanitize_callback' => 'sanitize_lightordark',
		)
	);
	 
	$wp_customize->add_control(
		'lightordark',
		array(
			'type' => 'select',
			'label' => 'Light or Dark Mode',
			'priority' => '-47',
			'section' => 'colors',
			'choices' => array(
				'light' => 'Light',
				'dark' => 'Dark',
			),
		)
	);
















}
add_action( 'customize_register', 'mytheme_customize_register' );	