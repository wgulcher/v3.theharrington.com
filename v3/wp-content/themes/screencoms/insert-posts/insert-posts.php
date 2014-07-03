

                    

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


    
    
    
    
		
		
				
                
                
                
              
                    
                    <!-- script src="http://code.jquery.com/jquery-latest.js"></script -->
		  
 

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
                  
                        <!-- Code taken from brilliant tutorial on WPTuts - "Posting via the Front End" by Vinny Singh -->
<form action="" id="primaryPostForm" method="POST">

<div class="span9 align-left">
        
  
        <label for="postTitle"><?php _e('Post Title:', 'framework') ?></label>
        <input type="text" name="postTitle" id="postTitle" class="required" value="<?php if ( isset( $_POST['postTitle'] ) ) echo $_POST['postTitle']; ?>" />
        
        <label for="postExcerpt"><?php _e('Post Excerpt:', 'framework') ?></label>
        <input type="text" name="postExcerpt" id="postExcerpt" class="required" value="<?php if ( isset( $_POST['postExcerpt'] ) ) echo $_POST['postExcerpt']; ?>" />
       



        
 
    <label for="postContent"><?php _e('Post Content:', 'framework') ?></label>
        <textarea name="postContent" id="postContent" rows="8" cols="30" class="required"><?php if ( isset( $_POST['postContent'] ) ) { if ( function_exists( 'stripslashes' ) ) { echo stripslashes( $_POST['postContent'] ); } else { echo $_POST['postContent']; } } ?>
        <?php if ( $postTitleError != '' ) { ?>
    <span class="error"><?php echo $postTitleError; ?></span>
    <div class="clearfix"></div>
<?php } ?></textarea>
      


        <input type="hidden" name="submitted" id="submitted" value="true" />
        
        
        <?php wp_nonce_field( 'post_nonce', 'post_nonce_field' ); ?>
        
       
        
        
 
                    </div>
                    
                    <div class="span3 align-right">
                    	
                          
                   		                       
    					<label for="post_type"><?php _e('Post Type:', 'framework') ?></label>
                        <select name="post_type" id="post_type" class="standard-dropdown">
                            <option value="square">Square</option>
                            <option value="rectangle_4x3">Rectangle (4x3)</option>
                            <option value="rectangle_16x9">Rectangle (16x9)</option>
                            <option value="circle">Circle</option>
                        </select>
                   
                          
    <label for="longitude"><?php _e('Longitude:', 'framework') ?></label>
    <input type="text" name="longitude" id="longitude" value="<?php if(isset($_POST['longitude'])) echo $_POST['longitude'];?>" class="required" />

    <label for="latitude"><?php _e('Latitude:', 'framework') ?></label>
    <input type="text" name="latitude" id="latitude" value="<?php if(isset($_POST['latitude'])) echo $_POST['latitude'];?>" class="required" />
    
     <button type="submit" class="align-right"><?php _e('Publish Now', 'framework') ?></button>
   
     <button onclick="getLocation()" class="align-right">Add Location</button>
         
               
    

                    </div>
                
                
    
    
  
</form>


    
 