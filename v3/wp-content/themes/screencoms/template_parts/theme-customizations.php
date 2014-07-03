 <?php
	
	
	
	// use the css / fonts below as user wants it
	
	
	
 echo '<style type="text/css">';
	
 	
    /* ==================================================================================
    THEME IS USER EDITABLE (IE. OVERRIDES THE THEME CUSTOMIZER SETTINGS)
    ===================================================================================== */

    /* Post Shape ----------------------------------------------------------------------- */
	global $global_theme_isusereditable;
	$global_theme_isusereditable = get_theme_mod( 'theme_isusereditable' );
   
 	
	
	
	
	
    /* ==================================================================================
    POST SETTINGS
    ===================================================================================== */

    /* Post Shape ----------------------------------------------------------------------- */
	global $global_post_shape;
	$global_post_shape = get_theme_mod( 'post_shape' );
	

   

    /* Shape Options for Various ----------------------------------------------------------------------- */
    global $global_post_shape_various;
	
    if( $global_post_shape == 'various' ) {
       $global_post_shape_various = get_theme_mod( 'post_shape_various' );
    }else{
		 $global_post_shape_various = "";
	}
	
	/* Post Size ----------------------------------------------------------------------- */
	global $global_post_size;
	$global_post_size = get_theme_mod( 'post_size' );
	
	/* Post Layout ----------------------------------------------------------------------- */
	global $global_post_layout;
	$global_post_layout = get_theme_mod( 'post_layout' );
    
	
    /* Image Fit ----------------------------------------------------------------------- */
    global $global_post_image_fit;
	$global_post_image_fit = get_theme_mod( 'post_image_fit' );
    


    /* Click Action ----------------------------------------------------------------------- */
     global $global_post_click;
	 $global_post_click = get_theme_mod( 'post_click' );
   
	
	
	
	
	/* ==================================================================================
    SHOW / HIDE USER MENUS
    ===================================================================================== */
    
	
    /* Show hide site options  ----------------------------------------------------------------------- */
    $global_show_siteoptions = get_theme_mod( 'show_siteoptions' );
    if( $global_show_siteoptions != '' ) {
        echo '#site-options{ display: none; } '; 
		echo 'a.toggle-menu-site-button{ display: none; } ';     
    }else{
        // Do nothing.
    }

   
    /* Show hide insert posts  ----------------------------------------------------------------------- */
     $global_show_insertpostsmenu = get_theme_mod( 'show_insertpostsmenu' );
    if( $global_show_insertpostsmenu != '' ) {
         echo '.insert-posts-menu{ display: none; } '; 
		 echo 'a.add-post-now{ display: none; } '; 
    }else{
        // Do nothing.
    }

    /* Show hide navbar  ----------------------------------------------------------------------- */
     $global_show_navbar = get_theme_mod( 'show_navbar' );
    if( $global_show_navbar != '' ) {
        echo '.navbar{ display: none; } '; 
	    echo 'a.toggle-navigation-button{ display: none; } ';
    }else{
        // Do nothing.
    }

    /* Show filter menu view  ----------------------------------------------------------------------- */
    $global_show_filtermenuview = get_theme_mod( 'show_filtermenuview' );
    if( $global_show_filtermenuview != '' ) {
        echo '.filter-menu-view{ display: none; } '; 
	    echo 'a.toggle-filter-view-button{ display: none; } ';
    }else{
        // Do nothing.
    }

    /* Show filter menu query  ----------------------------------------------------------------------- */
    $global_show_filtermenuquery = get_theme_mod( 'show_filtermenuquery' );
    if( $global_show_filtermenuquery != '' ) {
        echo '.filter-menu-query{ display: none; } '; 
	    echo 'a.toggle-filter-query-button{ display: none; } ';
    }else{

        // Do nothing.
    }

   /* Show feed options  ----------------------------------------------------------------------- */
    $global_show_feedoptions = get_theme_mod( 'show_feedoptions' );
    if( $global_show_feedoptions != '' ) {
		
		
	    echo '#feed-options{ display: none; } '; 
	    echo 'a.toggle-menu-page-button{ display: none; } ';
        // Do nothing.
    }else{
        // Do nothing.
    }
	


/* ==================================================================================
    FOOTER SETTINGS
    ===================================================================================== */
    
    /* Show footer  ----------------------------------------------------------------------- */
    $global_show_footer = get_theme_mod( 'show_footer' );
    if( $global_show_footer != '' ) {
         echo '#footer { display: none; } '; 
    }else{
        // Do nothing.
    }

 
    /* Right text ----------------------------------------------------------------------- */
    global $global_footer_right_textbox;
	$global_footer_right_textbox = get_theme_mod( 'footer_right_textbox', 'Design, Development and Copyright &copy; Richard Max 2013' );
    


    /* Left text ------------------------------------------------------------------------------- */
    global $global_footer_left_textbox;
	$global_footer_left_textbox = get_theme_mod( 'footer_left_textbox', 'This wordpress theme uses <a><i class="icon-html5 icon-border icon-min-line-height"></i> HTML5</a> <a><i class="icon-css3 icon-border icon-min-line-height"></i> CSS3</a>' );
    

/* ==================================================================================
    FONT SETTINGS
    ===================================================================================== */
    
    /* Select Logo Font  ----------------------------------------------------------------------- */
    global $global_font;
	$global_font = get_theme_mod( 'font' );
    
    /* Custom Font  ----------------------------------------------------------------------- */
    // not working yet!



    /* ==================================================================================
    SKIN colours etc
    ===================================================================================== */
    
    
    /* Select Skin ------------------------------------------------------------------------------- */
    $global_skin = get_theme_mod( 'select_skin' );
	
	  /* Light or Dark ------------------------------------------------------------------------------- */
    global $global_lightordark;
	$global_lightordark = get_theme_mod( 'lightordark' );
   


 /* ==================================================================================
    HEADER IMAGE
    ===================================================================================== */

    /* Logo Placement ------------------------------------------------------------------------------- */

    $global_logo_placement = get_theme_mod( 'logo_placement' );
    if( $global_logo_placement != '' ) {
        switch ( $global_logo_placement ) {
            case 'left':
                // Do nothing. The theme already aligns the logo to the left
                break;
            case 'right':
                echo '#header #logo{ float: right; }'; 
				echo 'nav.align-right{float:left; width:inherit;}'; 
                break;
            case 'center':
                echo '#header{ text-align: center; }';
				echo '#header #logo{ float: none; margin-left: auto; margin-right: auto; width:inherit; max-width:inherit; margin-bottom:10px;}';
                echo '#header-wrap{ background: inherit; }';
				echo 'nav.align-right{float: none; margin-left: auto; margin-right: auto; }'; 
				echo '.menu-menu .ui-colour {margin-top:15px; }';
				echo '.widget-area-header {text-align: left;}';
                break;
        }
    }
	
	// end --------------------------------------------------------------------------
	
	
	 echo '</style>';
	
	

   /* Ignore user css / font edits  ----------------------------------------------------------------------- */
global $global_show_grid;
$global_show_grid = get_theme_mod( 'show_grid' );


	

 
 
 
/* Ignore user css / font edits  ----------------------------------------------------------------------- */
$global_ignore_user_css = get_theme_mod( 'ignore_user_css' );

if( $global_ignore_user_css == '' ) {
    
	
	
	

    /* ==================================================================================
    COLOURS
    ===================================================================================== */

    // note this is using get_theme_mod as existing or default WordPress settings are called via get_option(), while added settings are called via get_theme_mod
    
	/* Header BG Colour Setting ------------------------------------------------------------------------------- */
    $global_header_bg_color = get_option('header_bg_color');
   
   
   /* Sidebar BG Colour Setting ------------------------------------------------------------------------------- */
	$global_sidebar_bg_color = get_option('sidebar_bg_color');
	
	/* Header BG Colour Setting ------------------------------------------------------------------------------- */
	$global_footer_bg_color = get_option('footer_bg_color');
	
	
   	/* ITLE TEXT Colour Setting ------------------------------------------------------------------------------- */
    $global_title_text_color = get_option('title_text_color');
	
	
    /* UI Colour Setting ------------------------------------------------------------------------------- */
    global $global_ui_color;
	$global_ui_color = get_option('ui_color');
    
  
    /* Content Text Colour ------------------------------------------------------------------------------- */
    $global_content_text_color = get_option('content_text_color');
   
	 /* Content Text Colour ------------------------------------------------------------------------------- */
    $global_postfeed_text_color = get_option('postfeed_text_color');
   
	
	
    /* Content Link Colour ------------------------------------------------------------------------------- */
    $global_content_link_color = get_option('content_link_color');    


    /* Content Background Colour ------------------------------------------------------------------------------- */
    $global_content_background_color = get_option('content_background_color');

?>
   
    

<style type="text/css">
   	/*.hentry, .gallery-item,
	.skin-dark .hentry, .skin-dark .gallery-item,
	.hentry:hover, .gallery-item:hover,
	.skin-dark .hentry:hover, .skin-dark .gallery-item:hover,*/
	.global_content_background_color, .global_content_background_color:hover,
	.layout-size--medium .hentry-layout-visual .hentry-text,
	.layout-size--large .hentry-layout-visual .hentry-text,
	.post-feed .hentry, .article-popup-container .hentry:hover
	
	/*
	,
	
.single .gallery .gallery-item */
	{ background:  <?php echo $global_content_background_color; ?>  !important;; }
	
	
	.post-feed .hentry { color:  <?php echo $global_postfeed_text_color; ?>; }
	 #content { color:  <?php echo $global_content_text_color; ?>; }
	 a, #content a,
	 .skin-dark a { color:  <?php echo $global_content_link_color; ?>; }
	 .ui-colour,#searchsubmit,input[type="file"], input[type="image"], input[type="submit"], input[type="reset"], input[type="button"], input[type="radio"],.comment-reply-link,
	 .skin-dark .dropdown-menu{ background: <?php echo $global_ui_color; ?>  !important;}
	
	 #header,  .navbar .dropdown-menu, .skin-dark .navbar .dropdown-menu {   background-color: <?php echo $global_header_bg_color; ?>  !important; opacity:1; }
	 #sidebar,.skin-dark #sidebar,.sidebarButton_bg,.skin-dark .sidebarButton_bg { /*background-color: <?php echo $global_sidebar_bg_color; ?>; opacity:1; */}
	 #footer {   background-color: <?php echo $global_footer_bg_color; ?>; opacity:1; }
	 
	 .menu-page{background-color: <?php echo $global_header_bg_color; ?>;}
	 
	body, body.skin-light, body.custom-background {
	background-color: <?php get_theme_mod( 'background_color' ) ;?> ;  !important;
	
	}
	
	 h1,h2,h3,h4,h5,h6,.vcard { color:  <?php echo $global_title_text_color; ?>; }
    
	
	
	body.skin-dark,body.custom-background  {
		background-color: <?php get_theme_mod( 'background_color' ) ;?> ;  !important;
		
	}
	
.footer-tint, .header-tint, #article-wrap, .post-feed .hentry,.article-popup-container .hentry-wrap:hover  {
	
background: -moz-linear-gradient(top,  rgba(220,253,229,0.34) 0%, rgba(13,13,13,0.22) 1%, rgba(1,1,1,0.55) 50%, rgba(10,10,10,0.52) 53%, rgba(78,78,78,0.18) 90%, rgba(56,56,56,0.14) 94%, rgba(27,27,27,0.11) 98%, rgba(98,136,124,0.1) 99%, rgba(168,244,221,0.25) 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(220,253,229,0.34)), color-stop(1%,rgba(13,13,13,0.22)), color-stop(50%,rgba(1,1,1,0.55)), color-stop(53%,rgba(10,10,10,0.52)), color-stop(90%,rgba(78,78,78,0.18)), color-stop(94%,rgba(56,56,56,0.14)), color-stop(98%,rgba(27,27,27,0.11)), color-stop(99%,rgba(98,136,124,0.1)), color-stop(100%,rgba(168,244,221,0.25))); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  rgba(220,253,229,0.34) 0%,rgba(13,13,13,0.22) 1%,rgba(1,1,1,0.55) 50%,rgba(10,10,10,0.52) 53%,rgba(78,78,78,0.18) 90%,rgba(56,56,56,0.14) 94%,rgba(27,27,27,0.11) 98%,rgba(98,136,124,0.1) 99%,rgba(168,244,221,0.25) 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  rgba(220,253,229,0.34) 0%,rgba(13,13,13,0.22) 1%,rgba(1,1,1,0.55) 50%,rgba(10,10,10,0.52) 53%,rgba(78,78,78,0.18) 90%,rgba(56,56,56,0.14) 94%,rgba(27,27,27,0.11) 98%,rgba(98,136,124,0.1) 99%,rgba(168,244,221,0.25) 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  rgba(220,253,229,0.34) 0%,rgba(13,13,13,0.22) 1%,rgba(1,1,1,0.55) 50%,rgba(10,10,10,0.52) 53%,rgba(78,78,78,0.18) 90%,rgba(56,56,56,0.14) 94%,rgba(27,27,27,0.11) 98%,rgba(98,136,124,0.1) 99%,rgba(168,244,221,0.25) 100%); /* IE10+ */
background: linear-gradient(to bottom,  rgba(220,253,229,0.34) 0%,rgba(13,13,13,0.22) 1%,rgba(1,1,1,0.55) 50%,rgba(10,10,10,0.52) 53%,rgba(78,78,78,0.18) 90%,rgba(56,56,56,0.14) 94%,rgba(27,27,27,0.11) 98%,rgba(98,136,124,0.1) 99%,rgba(168,244,221,0.25) 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#57dcfde5', endColorstr='#40a8f4dd',GradientType=0 ); /* IE6-9 */

}

	
	
	</style>
	
<?php	
	
	
	   
}else{ ?>
	
		
	<style type="text/css" id="custom-background-css">
	
	body, body.skin-light {
	background-color: #ffffff;  !important;
	}
	
	body.skin-dark {
		background-color: #000000;  !important;
		
	}


	</style> <?php
	
}
?>

<link rel="stylesheet" id="style-font" href="<?php echo get_template_directory_uri(); ?>/fonts/<?php echo $global_font; ?>/stylesheet.css" type="text/css" media="all">
 <link rel="stylesheet" id="style-font" href="<?php echo get_template_directory_uri(); ?>/skins/<?php echo $global_skin; ?>/skin.css" type="text/css" media="all">
	<link rel="stylesheet" id="style-font" href="<?php echo get_template_directory_uri(); ?>/skins/<?php echo $global_skin; ?>/colour.css" type="text/css" media="all">
 