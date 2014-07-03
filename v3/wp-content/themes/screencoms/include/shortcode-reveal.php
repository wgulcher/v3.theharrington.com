<?php

/* Overwrites default Wordpress Gallery called by shortcode: [gallery] */


add_shortcode('reveal', 'my_reveal_shortcode');

function my_reveal_shortcode($attr) {
	
	
	
	
	
	
	
	
	
	
	
	global $post;
	
	

	static $instance = 0;
	$instance++;

	
	
	

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'section',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 4,
		'size'       => 'medium',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	// bs - if cant divide cleanly into 12 convert
	if($columns == 5 ||  $columns > 6){$columns = 6;}
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';
	// bs - makes spans
	$span = "span" . 12/$columns;

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	
	
	
	
	
	
	
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<!-- style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style -->
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class} row-fluid'>";
	
	
	
	
	
	
	
	
		
	$output .= "<!-- make images responsive -->
<script type='text/javascript'>
jQuery.noConflict();
jQuery(document).ready(function($){
    $('img').each(function(){ 
        $(this).removeAttr('width')
        $(this).removeAttr('height');
    });
	
	
	$(window).resize(function(){
	
	$revealWidth = $('.main-article').width();
	
	if($revealWidth == '300'){
		$revealHeight = '60';
	}
	else if($revealWidth == '620'){
		$revealHeight = '140';
	}
	else if($revealWidth == '940'){
		$revealHeight = '220';
	}
	else if($revealWidth == '1260'){
		$revealHeight = '300';
	}
	else if($revealWidth >= '1580'){
		$revealHeight = '380';
	}
	else if($revealWidth >= '1900'){
		$revealHeight = '460';
	}
	//alert($revealWidth)
	
	Reveal.configure({
							//width: 940,
						height: $revealHeight,
							width: $revealWidth
						
						});
	});
	
});
</script>

<section id='content' class='content'>
<div class='main-content-wrap row fx-type--padding-default'>
<article id='article'" . " ";

$output .= " class='article main-article span8 fx-type--hide' >";

$output .= "
    <div class='article-wrap fx-type--toggle clearfix'>
        <div class='article-content'>
        
        
        
        
          <section class='reveal-feed fx-type--hide'>
                <div class='reveal-feed-wrap fx-type--toggle'>";
				
				
				
				
                    
					
					
					
				
				
				
				
				
				
	


	$i = 0;
	
	
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, 'hero-image', true, false);
		
		$attachment_page = get_attachment_link( $id ); 
		

		$output .= "<{$itemtag}";
		
		$output .= ">
			<{$icontag}>
				$link
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
			<a href='$attachment_page'>
				<{$captiontag}>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>
			</a>";
		}else{
			$output .= "
			<a href='$attachment_page'>
				<{$captiontag}>
				" . wptexturize($attachment->post_title) . "
				</{$captiontag}>
			</a>";
		}
		$output .= "</{$itemtag}>";
		
		}


	
	
	
	
		$output .= "<script>
					
					 //$revealWidth = $('.article').width();
					
						Reveal.initialize({
							//width: 940,
							width: '100%',
							height: 380,
							margin: 0,
							minScale: 1.0,
							maxScale: 1.0,
							controls: true,
							progress: true,
							history: true,
							controls: true,
							progress: true,
							history: true,
							keyboard: true,
							overview: true,
							loop: false,
							autoSlide: 0,
							mouseWheel: true,
							rtl: false,
							rollingLinks: true,
							center: false,
							theme: Reveal.getQueryHash().theme,
							transition: Reveal.getQueryHash().transition || 'zoom',
							dependencies: [";
							
								$output .= "{ src: '";
								$output .= get_template_directory_uri();
								$output .= "/reveal/lib/js/classList.js', condition: function() { return !document.body.classList; } },";
								
								
								$output .= "{ src: '";
								$output .= get_template_directory_uri();
								$output .= "/reveal/plugin/markdown/showdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },";
								$output .= "{ src: '";
								$output .= get_template_directory_uri();
								$output .= "/reveal/plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },";
								
								$output .= "{ src: '";
								$output .= get_template_directory_uri();
								$output .= "/reveal/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },";
								
								$output .= "{ src: '";
								$output .= get_template_directory_uri();
								$output .= "/reveal/plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } },";
								
								$output .= "{ src: '";
								$output .= get_template_directory_uri();
								$output .= "/reveal/plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }";
								
								$output .= "{ // src: '";
								$output .= get_template_directory_uri();
								$output .= "/reveal/plugin/remotes/remotes.js', async: true, condition: function() { return !!document.body.classList; } }";
								
								
								
							$output .= "]
						});
					</script>
            	</div>
            </section>";
		
				
				
				
	
	
	
	

	return $output;
}