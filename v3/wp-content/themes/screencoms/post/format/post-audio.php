<?php 
	$post_number = $wp_query->current_post + 1;			 
?>

<?php   



/* nb.

// this is the code to comment out in keyring-importers.php inorder to hack spotify / souncloud etc into their custom tax

						),
				/*'capabilities'      => array( // we intentionally provide these because then noone will have the ability to mess with them
											'manage_terms' => 'manage_keyring',
											'edit_terms'   => 'manage_keyring',
											'delete_terms' => 'manage_keyring',
											'assign_terms' => 'manage_keyring',
										), */
										
							

// Get terms for post
 $terms = get_the_terms( $post->ID , 'keyring_services' );
 // Loop over each item since it's an array
 if ( $terms != null ){
 foreach( $terms as $term ) {
 // Print the name method from $term which is an OBJECT
$post_service_source = $term->slug ;
 // Get rid of the other data stored in the object, since it's not needed
 unset($term);
} } 



if($post_service_source == 'spotify'){
	$post_service_content_height = '380px';
}

if($post_service_source == 'soundcloud'){
	$post_service_content_height = '166px';
}

?>



        
<article wp2js_postnumber="<?php echo $post_number; ?>" wp2js_permalink="<?php the_permalink() ?>" id="post-<?php the_id() ?>" <?php post_class('hentry fx-type--bg-gradient-default fx-type--border-default global_content_background_color audio'); ?> class="<?php echo "author"; ?><?php the_author_id();  ?>" style='width:300px; height:<?php echo $post_service_content_height; ?> !important'>




      
<?php   the_content(); ?>

</article>