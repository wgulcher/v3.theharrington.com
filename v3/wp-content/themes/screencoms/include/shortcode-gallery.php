<?php

/* Overwrites default Wordpress Gallery called by shortcode: [gallery] */

remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'my_gallery_shortcode');

function my_gallery_shortcode($attr) {

if(! is_single()){return "<div class='btn-group ui-colour btn-group-two' style='margin-right:0px; padding:2px;'><a class='btn' style='width: 140px;
height: 48px;
line-height: 45px;
color: #000;
font-size: 18px;'><i class='icon-camera icon'></i> View Gallery</a></div>";}
	
	global $post;
	
	

	static $instance = 0;
	$instance++;
	
	
	if ( ! empty($attr['reveal']) ) {
		
		
			$galleryItemTag = "section";
		}else{
			$galleryItemTag = "dl";
		}
	

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

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
		'itemtag'    => $galleryItemTag,
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'extra-large',
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

		$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	?>
		<script>
	//alert('cols: <?php echo $columns; ?>');
	</script>
    
    <?php
	
	// bs - if cant divide cleanly into 12 convert
	if($columns == 5 ||  $columns > 6){$columns = 6;}
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';
	
	
	if($columns <= 4){
		$size = 'extra-large';
	}
	else{
		$size = 'large';
	}
	
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}


	
	
	?>
    
	<script>
	//alert('size: <?php echo $size; ?>');
	//alert('col: <?php echo $columns; ?>');
	</script>
    
	<?php
	// bs - makes spans
	$span = "span" . 12/$columns;
	
	
	
	if ($columns === 1){
		
		$span = "span8";
	};

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
	$gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	
	
	
	
	
	
	
	
	
	if ( ! empty($attr['reveal']) ) {
	
				
				
				
				
				
	


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


	
	
	
	
	
		
				
				
				
	
	}else{
	



	
		
	$output .= apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );	
		
	
				
	
	
	

	$i = 0;
	$nextItemMargin = false;
	
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
		
		$attachment_page = get_attachment_link( $id ); 
		

		$output .= "<{$itemtag} class='gallery-item {$span}' ";
		if($nextItemMargin == true){ 
			$output .= "style='margin-left:0' ";
			$nextItemMargin = false;
		}; 
		$output .= ">
			<{$icontag} class='gallery-icon'>
				$link
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
			<a href='$attachment_page'>
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>
			</a>";
		}else{
			$output .= "
			<a href='$attachment_page'>
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_title) . "
				</{$captiontag}>
			</a>";
		}
		$output .= "</{$itemtag}>";
		if ( $columns > 0 && ++$i % $columns == 0 ){
			$output .= '<!-- br style="clear: both" / -->';
			$nextItemMargin = true;
		}
		}


	
	
	
	
	$output .= "
                    

            
            
                   <div id='galleryItem-group' class='gallery-item span4 btn-group pull-right_ ui-colour' data-toggle='buttons-radio' data-toggle-name='itemShape' style='width:140px;'>
                    <button title='Restrict Gallery Item Height' class='btn toggle-galleryItem-height' data-toggle='button'><i class='icon-resize-full icon-2x'></i>Toggle Height</button>
                    <!-- button title='Restrict Gallery Item Height' class='btn  toggle-galleryItem-height' data-toggle='button'><i class='icon-resize-small icon-2x'></i><br>Fill</button>
                     <button class='btn circle-button' value='circle'><i class='icon-circle icon-2x'></i><br>Circle</button>
                   <button class='btn flexiheight-button-gallery btn-dark' value='flexiheight'><i class='icon-th icon-2x icon-white'></i><br>Flexiheight</button -->
                 </div>
                


";
	
		$output .= "
			<br style='clear: both;' />
		</div>\n";
	
	
	
	
	
	
	/*
	
	
	$output .= "<div id='slider' class='slider_flux'>";
	
	
	
	
	$i = 0;
$size = 'large'; //full
	
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

		
		$output .= "$link";
		
		}

	$output .= "</div>
		<script>  
    window._flux = new flux.slider('#slider',{pagination: true});  
</script> ";

*/
		
		
		
		
	}
	
	
	$output .= " <script type='text/javascript'> jQuery(document).ready(function($) {applyMasonry('.gallery','.gallery-item');})	</script>";
	
	
	
	return $output;
}