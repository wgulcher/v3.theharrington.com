<?php
 
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );	
}

	
if ( function_exists( 'add_image_size' ) ) {

	// todo :: make these the same on both fluid and fixed and pull in via classes
	
	// inline images
	
	
	
	//	SIZE LOGIC -----------------------------------------------------------------
	// PHOTOS SHOULD BE ABLE TO FILL SQUARES SO SMALLEST DIMENSION MUST BE 140PX (for medium)
	// THIS MEANS THAT THE FOLLOWING ARE TRUE - DEPENDANT OF ORIGINAL PHOTO DIMENSIONS (THESE VARY MASSIVELY ON MOBILES / CAMERAS)
	// 	187 is 3:4 image with ends removed to make 140x140 square
	// 	210 is 6:9 image with ends removed to make 140x140 square
	// 	235 is for HTC Desire HD photo dimensions (3264 x 1952) - widest by far that ive found
	
	add_image_size( 'thumbnail', 35, 35, true); // fills 20x20 square at HTC Dimensions
	add_image_size( 'small', 140, 60, true); // fills 60x60 square at HTC Dimensions
	add_image_size( 'medium', 235, 235, false ); // fills 140x140 square at HTC Dimensions												
	add_image_size( 'large', 540, 540, false );	// fills 300x300 square at HTC Dimensions + all expanded
	add_image_size( 'extra-large', 960, 960, false );	// ???	
	
	
	add_image_size( 'hd', 1920, 1080, false );	// fits hd screen
	add_image_size( 'square', 300, 300, true );	// is a 240x240 square - used by thumb, small, medium squares
	
	// carousels and single posts and pages header / hero image
	add_image_size( 'hero-image', 1900, 460, true ); // header image  
}


add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );  
function custom_image_sizes_choose( $sizes ) {  
    $custom_sizes = array(  
        /*
		'featured-image-small' => 'Featured Image - Small',
		'featured-image-medium' => 'Featured Image - Medium',
		'featured-image-large' => 'Featured Image - Large',
		*/
		
		'thumbnail' => 'Thumbnail',
		'small' => 'Small',
		'medium' => 'Medium',  
        'large' => 'Large',
		'hd' => 'HD',
		'square' => 'Square',
		'hero-image' => 'Hero, Carousel, Header Image'
    );  
    return array_merge( $sizes, $custom_sizes );  
}  


	



// DIGITAL THUMBS START // ----------------------------------------------------------------------------

  
  
  if ( !function_exists('fb_AddThumbColumn') && function_exists('add_theme_support') ) {
 
// for post and page
add_theme_support('post-thumbnails', array( 'post', 'page', 'portfolio', 'vui', 'audio', 'photos', 'book', 'videos', 'gallery','image' ) );
 
function fb_AddThumbColumn($cols) {
 
$cols['thumbnail'] = __('Thumbnail');
 
return $cols;
}
 
function fb_AddThumbValue($column_name, $post_id) {
 
$width = (int) 50;
$height = (int) 50;
 
if ( 'thumbnail' == $column_name ) {
// thumbnail of WP 2.9
$thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
// image from gallery
$attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
if ($thumbnail_id)
$thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );

if(strstr($thumb, 'crystal/default.png')) 
{ 




$thumb = '';




$first_img = '';
	ob_start();
	ob_end_clean();



	$post_data = get_post($post_id); 
	$postcontent = $post_data->post_content;
	
	


	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $postcontent, $matches);



	
	//echo "output: " . $output;
	
	//echo "matches: " . $matches;
	
	$first_img = $matches [1] [0];
	
	
	







	$thumb = '<img style="max-width:50px; max-height:50px" src="' . $first_img . '">';



} 


elseif ($attachments) {
foreach ( $attachments as $attachment_id => $attachment ) {
$thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
}
}
if ( isset($thumb) && $thumb ) {
echo $thumb;
} else {
echo __('None');
}
}
}
// for posts
add_filter( 'manage_posts_columns', 'fb_AddThumbColumn' );
add_action( 'manage_posts_custom_column', 'fb_AddThumbValue', 10, 2 );
// for pages
add_filter( 'manage_pages_columns', 'fb_AddThumbColumn' );
add_action( 'manage_pages_custom_column', 'fb_AddThumbValue', 10, 2 );
}
// DIGITAL THUMBS END // ----------------------------------------------------------------------------




// Get URL of first image in a post
function return_first_inline_image() {
	
	global $post, $posts;
	$first_img = '';
	ob_start();
	ob_end_clean();
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
	
	
	//echo "output: " . $output;
	
	//echo "matches: " . $matches;
	
	$first_img = $matches [1] [0];
	
	
	return $first_img;
}

// output attachment array
function output_attachment_array($post_content,$post_mime_type,$numberposts) {
	
	// get this posts attachments
	if($attachments = get_posts(array(
		'post_parent'    => get_the_ID(),
		'post_type'      => 'attachment',
		'numberposts'    => $numberposts,
		'post_status'    => null,
		'post_mime_type' => $post_mime_type,
		'orderby'        => 'menu_order',
		'order'           => 'ASC',
	))) {
	
		// now filter the attachments by description meta (post_content)
		// todo :: create a csv use of description meta in attachments - then can use as image tags or some crazy shit!!!
		
		$attachments_filtered = array();
		
		foreach($attachments as $attachment) {
			if(($attachment->post_content) == $post_content){
				$attachments_filtered[] = $attachment;
			};
		}
		
		if($post_content == ''){
			return $attachments;
		}else{
			return $attachments_filtered;
		}
	
	}
}

// awesome function by me!!!
function getMediaFromPost($output_type,$size2use,$imageWidth){

	$featured_image_prefix = 'featured-image-';
		
		if(!$size2use){

			$main_image_sizes =  array(
			
				'small',
				'square',
				'medium',
				'large',
				'full',
				'hd',
				'hero-image',
				'thumbnail',

			);

		}else{

			$main_image_sizes =  array(
			
				$size2use

			);


		}
		
		$fileTypeFeedback;
		
		if($output_type == "css"){ ?><style type="text/css"><?php }
		
		foreach($main_image_sizes as $main_image_size){
		
		
		
		
			$main_image_src = "";
			
			
		
		//	echo "/* main_image_size: " . $main_image_size . " */";
			
			if (has_post_thumbnail()){
			
			
				if (has_post_thumbnail( $post->ID ) ):
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $main_image_size );
				endif;
			
			$main_image_src = $image[0];
			$main_image_width = $image[1];
			$main_image_height = $image[2];
			
			
			
			}
			
			
			if($main_image_src == ""){
				$attachments = output_attachment_array(
					'', /* attachment description */
					'image,video,audio,application/x-shockwave-flash,application/pdf', /* post mime type */
					'1' /* numberposts '-1'=unlimited */
				);
				
				
				
				//get image attachments only as featured image
				
				if($attachments){
					$fileTypeFeedback = "Attachments / Gallery (pre 3.5 - no ids)";
					foreach($attachments as $attachment) {
						
						
						// can return icons for attachments by adding thrird param ie. wp_get_attachment_image_src(ID, SIZE, true);
						
						
						//This gets the thumnail
						$attachment_attributes = wp_get_attachment_image_src($attachment->ID, $main_image_size, true);
						$main_image_src = $attachment_attributes[0];
						$main_image_width = $attachment_attributes[1];
						$main_image_height = $attachment_attributes[2];
						//echo "/* main_image_src: " . $main_image_src . " */";
						//echo "/* ";
						//print_r($attachment); //todo - lots of useful vars in attachments - uncomment to view (also get exif data from images)
						//echo " */";
						$post_mime_type = ($attachment->post_mime_type);
						if($post_mime_type == 'application/image' || $post_mime_type == 'image/jpeg' || $post_mime_type == 'image/jpg' || $post_mime_type == 'image/gif' || $post_mime_type == 'image/png'){
							$original_image_src = ($attachment->guid);
							//$main_image_src = ($attachment->guid);
						}
						if($post_mime_type == 'application/video'){
							$main_video_src = ($attachment->guid);
						}
						if($post_mime_type == 'application/audio'){
							$main_audio_src = ($attachment->guid);
						}
						if($post_mime_type == 'application/flash' || $post_mime_type == 'application/x-shockwave-flash'){
							$main_flash_src = ($attachment->guid);
						}
						if($post_mime_type == 'application/pdf'){
							$main_pdf_src = ($attachment->guid);
						}
					}
				}
			}
			if($main_image_src == ""){
				$fileTypeFeedback = "3.5 Gallery";
				
				
				
				
				$post_subtitrare = get_post( $post->ID );
				$content = $post_subtitrare->post_content;
				$pattern = get_shortcode_regex();
				preg_match( "/$pattern/s", $content, $match );
				if( isset( $match[2] ) && ( "gallery" == $match[2] ) ) {
					$atts = shortcode_parse_atts( $match[3] );
					$attachments = isset( $atts['ids'] ) ? explode( ',', $atts['ids'] ) : get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . $post->ID .'&order=ASC&orderby=menu_order ID' );
				}
				
				//echo "BINGO!!!!";
				//print_r($attachments);
				
				$firstImageIDInGallery = $attachments[0];
				
				$attachment_attributes = wp_get_attachment_image_src($firstImageIDInGallery, $main_image_size, false);
				$main_image_src = $attachment_attributes[0];
				$main_image_width = $attachment_attributes[1];
				$main_image_height = $attachment_attributes[2];
				
				// wipes $main_image_src if returns manifest images ie. /wp-includes/images/crystal/default.png - weird bug re diff between 3.5 galleries and pre 3.5 galleries
				$needle = 'wp-includes';
				$haystack = $main_image_src;
				$hasReturnedWPManifestImage = strpos($haystack, $needle) !== false;

				if($hasReturnedWPManifestImage){
					// wipe image src
					$main_image_src = '';
				}
				
				//echo "/* main_image_src: " . $main_image_src . " */";
			}
			if($main_image_src == ""){
				$fileTypeFeedback = "Inline Image";
				$main_image_src = return_first_inline_image();	
			}
			
			/*
			
			if($main_image_src == ""){
			
				$fileTypeFeedback = "Attachment Single Image (todo - check if valid / all above used)";
				$attachment_attributes = wp_get_attachment_image_src($attachment->ID, $main_image_size, true);
				$main_image_src = $attachment_attributes[0];
				$main_image_width = $attachment_attributes[1];
				$main_image_height = $attachment_attributes[2];
				
			}
			
			*/
			
			if($main_image_src == ""){
				$fileTypeFeedback = "No image";
			}
if($output_type == "css"){ echo "/* FILE TYPE: " . $fileTypeFeedback . "  */"; ?>
.layout-size--<?php echo $main_image_size ?> #post-<?php the_id(); ?> .post-thumb-wrap{
	background-image: url(<?php echo $main_image_src; ?>);
	
	<?php 
		if($main_image_height <= 140){ ?>
			background-size: cover;
		<?php }
	?>
	
	
	
	
}
<?php 
if($main_image_size == 'square'){ ?>
#post-<?php the_id(); ?> .post-thumb-wrap-hovered{
	background-image: url(<?php echo $main_image_src; ?>);
	background-size: cover;
} 

<?php 
}
if($main_image_size == 'hd'){ ?>
#post-<?php the_id(); ?> .post-thumb-wrap-expanded{
	background-image: url(<?php echo $main_image_src; ?>);
}


<?php }
if($main_image_width == $main_image_height){ ?>
#post-<?php the_id(); ?> .post-thumb-wrap{
	background-size:100%;
	-webkit-background-size: cover;
	   -moz-background-size: cover;
		 -o-background-size: cover;
			background-size: cover;
}<?php }
}		
}
if($output_type == "css"){ ?></style><?php }else{ 
$large_image_src = $main_image_src;

if($large_image_src != ''){?>
<img src='<?php echo $large_image_src; ?>' class='fx-type--image-responsive' 

<?php 
if($imageWidth != ''){
echo 'width="' . $imageWidth . '" ';
}

?>

 /> 


<?php }?>


<?php }; }?>