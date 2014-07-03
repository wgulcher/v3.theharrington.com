    <!-- Code taken from brilliant tutorial on WPTuts - "Posting via the Front End" by Vinny Singh -->


<?php
if ( isset( $_POST['submitted'] ) && isset( $_POST['post_nonce_field'] ) && wp_verify_nonce( $_POST['post_nonce_field'], 'post_nonce' ) ) {
    if ( trim( $_POST['postTitle'] ) === '' ) {
        $postTitleError = 'Please enter a title.';
        $hasError = true;
    }
    $post_information = array(
        'post_title' => wp_strip_all_tags( $_POST['postTitle'] ),
        'post_content' => $_POST['postContent'],
        'post_type' => 'post',
        'post_status' => 'pending'
    );
    $post_id = wp_insert_post( $post_information );
	
if($post_id) {
    // Update Custom Meta
    update_post_meta($post_id, 'geo_latitude', esc_attr(strip_tags($_POST['latitude'])));
    update_post_meta($post_id, 'geo_longitude', esc_attr(strip_tags($_POST['longitude'])));
    // Redirect
    wp_redirect(home_url());
    exit;
}
}
?>



<?php
/**
 * Template Name: Insert Post
 */

get_header(); ?>
<script src="http://code.jquery.com/jquery-latest.js"></script>

<button class="btn btn-primary add-post-now align-right" title="Get Location" onclick="getLocation()">Click to get your coordinates</button>
<script>





var x=document.getElementById("demo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{x.innerHTML="Geolocation is not supported by this browser.";}
  }
function showPosition(position)
  {

  
  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;
  
      $("#latitude").val(latitude);
	  $("#longitude").val(longitude);
	  
	  
  }
</script>
    
		
		<div class="row">
			<div class="span8">
				<form action="" id="primaryPostForm" method="POST">
    <fieldset>
        <label for="postTitle"><?php _e('Post Title:', 'framework') ?></label>
        <input type="text" name="postTitle" id="postTitle" class="required" value="<?php if ( isset( $_POST['postTitle'] ) ) echo $_POST['postTitle']; ?>" />
    </fieldset>
    <fieldset>
        <label for="postContent"><?php _e('Post Content:', 'framework') ?></label>
        <textarea name="postContent" id="postContent" rows="8" cols="30" class="required"><?php if ( isset( $_POST['postContent'] ) ) { if ( function_exists( 'stripslashes' ) ) { echo stripslashes( $_POST['postContent'] ); } else { echo $_POST['postContent']; } } ?>
        <?php if ( $postTitleError != '' ) { ?>
    <span class="error"><?php echo $postTitleError; ?></span>
    <div class="clearfix"></div>
<?php } ?></textarea>
    </fieldset>
    <fieldset>
        <input type="hidden" name="submitted" id="submitted" value="true" />
        
        
        <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
        
        <button type="submit"><?php _e('Add Post', 'framework') ?></button>
    </fieldset>
    
    
    <fieldset>
    <label for="latitude"><?php _e('latitude:', 'framework') ?></label>
    <input type="text" name="latitude" id="latitude" value="<?php if(isset($_POST['latitude'])) echo $_POST['latitude'];?>" class="required" />
</fieldset>
<fieldset>
    <label for="longitude"><?php _e('longitude:', 'framework') ?></label>
    <input type="text" name="longitude" id="longitude" value="<?php if(isset($_POST['longitude'])) echo $_POST['longitude'];?>" class="required" />
</fieldset>
</form>


			</div>
		</div>


<?php get_footer(); ?>

