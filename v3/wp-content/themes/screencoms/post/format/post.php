
<?php 
	$post_number = $wp_query->current_post + 1;			 
?>    
<article wp2js_postnumber="<?php echo $post_number; ?>" wp2js_permalink="<?php the_permalink() ?>" id="post-<?php the_id() ?>" <?php post_class('hentry fx-type--bg-gradient-default fx-type--border-default global_content_background_color'); ?> class="<?php echo "author"; ?><?php the_author_id();  ?>" >
  	


<?php

//post / company logos

if(is_home()){
$img_args = 'type=image&size=large';
$images = rwmb_meta( 'YOUR_PREFIX_imglogo', $img_args);
}

/*



array(
    'name'        => 'logo-150x80.png',
    'path'        => '/var/www/wp-content/uploads/logo-150x80.png',
    'url'         => 'http://example.com/wp-content/uploads/logo-150x80.png',
    'width'       => 150,
    'height'      => 80,
    'full_url'    => 'http://example.com/wp-content/uploads/logo.png',
    'title'       => 'Logo',
    'caption'     => 'Logo caption',
    'description' => 'Used in the header',
    'alt'         => 'Logo ALT text',
)

*/

?>




  <?php if(is_search()){
		
	}else{
     if(get_post_format() != '' && get_post_format() != 'aside'){
				 the_content();
			}}?>
    
          
            
            <div class="hentry-wrap clearfix">
   
   
    <div class="content-flip" style="display: none;">
			<p>xxx</p>
		</div>
    
    <div class="hentry-text">
    
    
     
     
	
        <div class="hentry-text-wrap">
        
             
            <header class="entry-header">
            
             <a id="viewpost_button" class="btn"><i class="icon-play icon-2x icon-white"></i><BR>VIEW</a>
     
            <!-- p class="timestsamp pull-right" style="position:absolute; top:10px; right:10px;"><time datetime="<?php echo get_the_date('c') ?>" pubdate>Date: <?php echo get_the_date() ?></time></p -->
   
   
            	<!-- ?php get_template_part('template_parts/meta-info'); ? -->
                
                <h2 class="entry-title"><?php 
				if(get_post_format() != 'aside'){
					the_title();
				}else{
					the_content();
				} ?></h2>
                
        
            </header>
            
            <div class="excerpt"> 
             
      
                 <?php 
				 
				 $post_format = get_post_format();
				$post_type = get_post_type();
	
					if($post_type == 'attachment'){	
					//
					}
					else{			 
				 if($post_format == '' || $post_format == 'default' || $post_format == 'standard'){
				 the_content();
			}
					}?>

	<!-- h2> <?php echo $post_type; ?></h2 -->

            <div class="taxonomy_holder">

<?php

$thecategories = the_category(', ');

if($thecategories != ""){ ?>
	
           <h3 class="categories">Categories:</h3>
<p>!!!<?php echo $thecategories; ?><br></p>
   
	<?php } ?>

         


<?php

 
$posttags = get_the_tags();
$count=0;
if ($posttags) {
echo "<h3 class='tags-title'>Tags:</h3><p>";
  foreach($posttags as $tag) {
    
      echo "<a href='?tag=" . $tag->slug ."' >" . $tag->name . "</a>, ";
    
  }
echo "</p>";
}
?>
</div>


            </div>
        
        </div>
        
        </div>



<?php



        	// if(!isset($image)){

        	 		getMediaFromPost('css','','');

        //	 } 
		
		
		// gets first image in array
	if($images != null){$image = array_shift($images);}
		
		if($image != ''){

        	 		?>

        <style type="text/css">


<?php 

/*foreach ( $images as $image )



{ */





	


	?>
#post-<?php the_id() ?> .post-thumb-wrap{
	background-image: url('<?php echo $image['url']; ?>') !important;	
	
				background-size: contain !important;	
				background-color: #fff;
	
}

<?php /* }  */?>
</style>


<?php } ?>
        <div id="main-media-item-<?php the_id() ?>" class="post-thumb-wrap" >



    	</div>


 
	</div>
	
    <!-- Flash Attachments -->
    
    
	<?php if($post_mime_type == 'application/flash' || $post_mime_type == 'application/x-shockwave-flash'){ ?>
			    <script type="text/javascript" >
                	var flashvars = {
						scale : "showAll",
                        wmode : "transparent",
						bgcolor : "#ff6600"
					};
					var params = {
						wpDataForFlashTest : "Hello Flash from wordpress!!!"
					};
					var attributes = { 
						styleclass : "wp-flash-file" 
					};
					swfobject.embedSWF(	"<?php echo $main_flash_src; ?>",
										"main-media-item-<?php the_id() ?>",
										"150",
										"100",
										"9.0.0",
										false,
										flashvars,
										params,
										attributes
									);
                </script>
	<?php } ?>
</article>