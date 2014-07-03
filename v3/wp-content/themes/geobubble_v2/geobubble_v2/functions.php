<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/








// GEOBUBBLE - EDITS START --------------------------------------------------------------------------


// allow posts with no title - start
add_filter('pre_post_title', 'wpse28021_mask_empty');
//add_filter('pre_post_content', 'wpse28021_mask_empty');
function wpse28021_mask_empty($value)
{
    if ( empty($value) ) {
        return ' ';
    }
    return $value;
}

add_filter('wp_insert_post_data', 'wpse28021_unmask_empty');
function wpse28021_unmask_empty($data)
{
    if ( ' ' == $data['post_title'] ) {
        $data['post_title'] = '';
    }
    /*if ( ' ' == $data['post_content'] ) {
        $data['post_content'] = '';
    }*/
    return $data;
}
// allow posts with no title - end

// add_filter('wp_list_pages', create_function('$t', 'return str_replace("<a ", "<a class=\"tag\" ", $t);'));


class Thumbnail_walker extends Walker_page {
        function start_el(&$output, $page, $depth, $args, $current_page) {
        if ( $depth )
            $indent = str_repeat("\t", $depth);
        else
            $indent = '<!-- here -->';
 
        extract($args, EXTR_SKIP);
        $css_class = array('page_item', 'page-item-'.$page->ID);
        if ( !empty($current_page) ) {
            $_current_page = get_page( $current_page );
            _get_post_ancestors($_current_page);
            if ( isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors) )
                $css_class[] = 'current_page_ancestor';
            if ( $page->ID == $current_page )
                $css_class[] = 'current_page_item';
            elseif ( $_current_page && $page->ID == $_current_page->post_parent )
                $css_class[] = 'current_page_parent';
        } elseif ( $page->ID == get_option('page_for_posts') ) {
            $css_class[] = 'current_page_parent';
        }
 
        $css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
		
		$postclasses = get_post_class('',$page->ID);
		foreach ($postclasses as &$postclass) {
			$css_class .= ' ' . $postclass;
		}
		
		
		if ( $depth )
            $css_class .= ' hentry-child';
        else
            $css_class .= ' hentry-parent';
		
		
		
		
 
        $output .= $indent . '<li class="' . $css_class . '">';
		
		
		
		
		
		$output .= '<a class="thumbnail" href="' . get_permalink($page->ID) . '">' . $link_before . apply_filters( 'the_title', '' ) . $link_after . get_the_post_thumbnail($page->ID, array(72,72));
		
		$output .= '<figcaption>' . get_the_title($page->ID) . '</figcaption>' .'</a> '; 
 
        if ( !empty($show_date) ) {
            if ( 'modified' == $show_date )
                $time = $page->post_modified;
            else
                $time = $page->post_date;
 
            $output .= " " . mysql2date($date_format, $time);
        }
    }
}




function rename_post_formats($translation, $text, $context, $domain) {
    $names = array(
        'Standard'  => 'Information',
        'Aside' => 'Grafitti',
		'Link' => 'Advert',
		'Quote' => 'Discussion',
		'Status' => 'Form',
		'Chat' => 'Chatroom'
    );
    if ($context == 'Post format') {
        $translation = str_replace(array_keys($names), array_values($names), $text);
    }
    return $translation;
}
add_filter('gettext_with_context', 'rename_post_formats', 10, 4);


add_filter('gettext', 'change_admin_cpt_text_filter', 20, 3);
/*
 * Change the text in the admin for my custom post type
 * 
**/
function change_admin_cpt_text_filter( $translated_text, $untranslated_text, $domain ) {

  global $typenow;

  if( is_admin() && 'location' == $typenow )  {

    //make the changes to the text
    switch( $untranslated_text ) {

        case 'Add New Bubble':
          $translated_text = __( 'Bubbles Title','text_domain' );
        break;

        case 'Enter title here':
          $translated_text = __( 'Bubbles Title','text_domain' );
        break;
        
        //add more items
     }
   }
   return $translated_text;
}

// show right panels by default in admin

add_action('user_register', 'set_user_metaboxes');
//add_action('admin_init', 'set_user_metaboxes');
function set_user_metaboxes($user_id=NULL) {

    // These are the metakeys we will need to update
    //$meta_key['order'] = 'meta-box-order_post';
    $meta_key['hidden'] = 'metaboxhidden_post';
	
	
	/*
	
    // So this can be used without hooking into user_register
    if ( ! $user_id)
        $user_id = get_current_user_id(); 
	
	
	
    // Set the default order if it has not been set yet
    if ( ! get_user_meta( $user_id, $meta_key['order'], true) ) {
        $meta_value = array(
            'side' => 'acf_313,categorydiv,tagsdiv-post_tag,postimagediv,formatdiv,submitdiv',
            'normal' => 'postexcerpt,tagsdiv-post_tag,postcustom,commentstatusdiv,commentsdiv,trackbacksdiv,slugdiv,authordiv,revisionsdiv',
            'advanced' => '',
        );
        update_user_meta( $user_id, $meta_key['order'], $meta_value );
    }
	
	
	*/
	

    // Set the default hiddens if it has not been set yet
    if ( ! get_user_meta( $user_id, $meta_key['hidden'], true) ) {
        $meta_value = array('postcustom','trackbacksdiv','commentstatusdiv','slugdiv','authordiv','revisionsdiv');
        update_user_meta( $user_id, $meta_key['hidden'], $meta_value );
    }
}



//cpt
add_action('init', 'cptui_register_my_cpt_location');
function cptui_register_my_cpt_location() {
register_post_type('location', array(
'label' => 'Bubbles',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'location', 'with_front' => true),
'query_var' => true,
'supports' => array('title','comments','thumbnail'),
//'taxonomies' => array('category','post_tag'),
'labels' => array (
  'name' => 'Bubbles',
  'singular_name' => 'Bubble',
  'menu_name' => 'Bubbles',
  'add_new' => 'Create Bubble',
  'add_new_item' => 'Add New Bubble',
  'edit' => 'Edit',
  'edit_item' => 'Amend Bubble',
  'new_item' => 'New Bubble',
  'view' => 'View Bubble',
  'view_item' => 'View Bubble',
  'search_items' => 'Search Bubble',
  'not_found' => 'No Bubbles Found',
  'not_found_in_trash' => 'No Bubbles Found in Trash',
  'parent' => 'Parent Bubble',
)
) ); }

add_action('init', 'cptui_register_my_cpt_advert');
function cptui_register_my_cpt_advert() {
register_post_type('advert', array(
'label' => 'Adverts',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'advert', 'with_front' => true),
'query_var' => true,
'supports' => array('title','trackbacks','comments','post-formats'),
'labels' => array (
  'name' => 'Adverts',
  'singular_name' => 'Advert',
  'menu_name' => 'Adverts',
  'add_new' => 'Add Advert',
  'add_new_item' => 'Add New Advert',
  'edit' => 'Edit',
  'edit_item' => 'Edit Advert',
  'new_item' => 'New Advert',
  'view' => 'View Advert',
  'view_item' => 'View Advert',
  'search_items' => 'Search Adverts',
  'not_found' => 'No Adverts Found',
  'not_found_in_trash' => 'No Adverts Found in Trash',
  'parent' => 'Parent Advert',
)
) ); }


// MOVE PUBLISH TO BOTTOM
add_action('do_meta_boxes', 'wpse33063_move_meta_box');

function wpse33063_move_meta_box(){
   
	//add_meta_box('commentstatusdiv', __('Discussion'), 'post_comment_status_meta_box', null, 'normal', 'core');

	
	
	remove_meta_box( 'formatdiv', 'location', 'side' );
    add_meta_box( 'formatdiv', _x( 'Bubble Type', 'post format' ), 'post_format_meta_box', 'location', 'normal', 'high' );
	
		
	
	 remove_meta_box( 'postimagediv', 'location', 'side' );
   add_meta_box('postimagediv', __('Bubble Image'), 'post_thumbnail_meta_box', 'location', 'normal', 'low');
	
	remove_meta_box( 'submitdiv', 'location', 'side' );
    add_meta_box( 'submitdiv', __( 'Create Bubble' ), 'post_submit_meta_box', 'location', 'normal', 'low' );
	
}



/* enqueue admin scripts */
function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/geobubble-admin.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );




/* make site loops search attachments too! */
function extend_main_query( $query ) {

//only show posts / pages / galleries on home but search attachments if search / elsewhere!
	 if( is_front_page() ) {
		//$post_categories = 'highlights,instagram';
		//$post_categories = 'highlights';
		//set_query_var('category_name', $post_categories);
		
		
		$post_types = array('location');
		set_query_var('post_type', $post_types);	
		
		
	}
	else if( !is_admin()  && $query->is_main_query()) {
		//$post_types = array('post','presentation');
		
		//$post_statuses = array('publish' ,'inherit');
		//set_query_var('post_status', $post_statuses);
		//set_query_var('keyring_services', 'delicious');
		
		//set_query_var('post_type', $post_types);
		//set_query_var('author' , '1' );
	}
	return $query;
}
add_filter( 'pre_get_posts' , 'extend_main_query' );






// add support for android audio recorded files + xml + others???
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	
	
	$existing_mimes['aac'] = 'audio/aac';
	
	$existing_mimes['xml'] = 'application/xml';
	
	
	
	// removing existing file types
	//unset( $existing_mimes['exe'] );
	
	// and return the new full result
	return $existing_mimes;
}










// GEOBUBBLE - EDITS END --------------------------------------------------------------------------




























/************* INCLUDE NEEDED FILES ***************/

require_once( 'library/navwalker.php' ); // needed for bootstrap navigation


// REDUX.  Needed for custom admin panel
// https://github.com/ReduxFramework/ReduxFramework
// WIP

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/library/option-config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/library/option-config.php' );
}


// Custom metaboxes and fields
// https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
  if ( !class_exists( 'cmb_Meta_Box' ) ) {
    require_once( 'library/metabox/init.php' );
  }
}



/* library/bones.php (functions specific to BREW)
  - navwalker
  - Redux framework
  - Read more > Bootstrap button
  - Bootstrap style pagination
  - Bootstrap style breadcrumbs
*/
require_once( 'library/brew.php' ); // if you remove this, BREW will break
/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once( 'library/custom-post-type.php' ); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
add_image_size( 'post-featured', 750, 300, true );
/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));


// add footer widgets

  register_sidebar(array(
    'id' => 'footer-1',
    'name' => __( 'Footer Widget 1', 'bonestheme' ),
    'description' => __( 'The first footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-2',
    'name' => __( 'Footer Widget 2', 'bonestheme' ),
    'description' => __( 'The second footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-3',
    'name' => __( 'Footer Widget 3', 'bonestheme' ),
    'description' => __( 'The third footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

    register_sidebar(array(
    'id' => 'footer-4',
    'name' => __( 'Footer Widget 4', 'bonestheme' ),
    'description' => __( 'The fourth footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!





/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix comment-container">
			<div class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=64" class="load-gravatar avatar avatar-48 photo" height="64" width="64" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
			</div>
      <div class="comment-content">
        <?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
        <?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
  			<?php if ($comment->comment_approved == '0') : ?>
  				<div class="alert alert-info">
  					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
  				</div>
  			<?php endif; ?>
  			<section class="comment_content clearfix">
  				<?php comment_text() ?>
  			</section>
  			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div> <!-- END comment-content -->
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/*************** PINGS LAYOUT **************/

function list_pings( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>">
		<span class="pingcontent">
			<?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>
			<?php comment_text(); ?>
		</span>
	</li>
<?php } // end list_pings
?>
