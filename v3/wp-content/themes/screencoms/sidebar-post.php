<?php


//post / company logos
$img_args = 'type=image&size=sdgvgdvgdvgdg';
$images = rwmb_meta( 'YOUR_PREFIX_imglogo', $img_args);

//post / company logos
$images1 = rwmb_meta( 'YOUR_PREFIX_imglogo_parent', $img_args);





?>


 <?php global $global_ui_color; 
 
 
 if(is_home() || is_search() || is_archive()){
   
   $classtoadd = 'sidebar-animated ';
   
}else{
  
  $classtoadd = 'sidebar-default ';
  
}
 
 
 ?>
 
<div id="sidebar" class="<?php echo $classtoadd; ?>article-sidebar widget-area-sidebar widget-area" role="complementary" >
         <div class="sidebarButton_bg">
     <a id="sidebarButton" class="btn"><i class="icon-play icon-1x icon-white"></i></a>
          </div>
        <div class="sidebar-wrap">







        
    <div id="meta" style="margin-left:10px; margin-right:10px;">

            
               
  <div class="navigation" style="float: right;
margin-bottom: 20px;  margin-top:-10px;">
   
   <div class="btn-group ui-colour btn-group-two" style="margin-right:0px; padding:2px;">



                <?php 
                    /* shows link title */  //previous_post_link('&laquo; %link') 
                    previous_post_link('%link', '<< Prev ', TRUE);
                ?>
    
           
                <?php 
                    /* shows link title */  //next_post_link('%link &raquo;') 
                    next_post_link('%link', ' Next >>', TRUE);
                ?>
                
</div>
            
            </div>

  <h3 class="timestamp" ><time datetime="<?php echo get_the_date('c') ?>" pubdate><?php echo get_the_date() ?></time></h3>
 


<?php if (  $images != null ||  $images1 != null){ ?>


             

                    <?php
					
					if ( $images != null){ ?>
                    
                    <div id="logos-company" style=" margin-bottom:20px;">

       
                    
                    <?php
					
                foreach ( $images as $image )
{
 echo "<img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";
}  


?>


 <!-- br><small>Brand / Company / Client</small -->
</div>



<?php

}

?>

  <?php
					
					if ( $images1 != null){ ?>
                    
<div id="logos-parent" style="margin-bottom:20px;">
                   
                    <?php
                foreach ( $images1 as $image )
{
 echo "<img src='{$image['url']}' width='{$image['width']}' height='{$image['height']}' alt='{$image['alt']}' />";
}  

?>
<br><small>Agency / Consultancy</small>

</div>

<?php } ?>


<?php
}
?>




</div>

<div class="relatedposts">
<h3>Related posts</h3>
<?php
	$orig_post = $post;
	global $post;
	$tags = wp_get_post_tags($post->ID);
	
	if ($tags) {
	$tag_ids = array();
	//foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	
	$individual_tag = get_term_by('name','Facebook','post_tag');
	
	
	$tag_ids[] = $individual_tag->term_id;
	
	
	$args=array(
	'tag__in' => $tag_ids,
	'post__not_in' => array($post->ID),
	'posts_per_page'=>4, // Number of related posts to display.
	'caller_get_posts'=>1
	);
	
	$my_query = new wp_query( $args );

	while( $my_query->have_posts() ) {
	$my_query->the_post();
	?>
	
	<div class="relatedthumb">
		<a rel="external" href="<?php the_permalink()?>"><?php getMediaFromPost('jpg','',''); ?><br />
		<?php the_title(); ?>
		</a>
	</div>
	
	<?php }
	}
	$post = $orig_post;
	wp_reset_query();
	?>
</div>



       <?php get_template_part('widgets/widgetareas','sidebar'); ?>

        </div> 

  </div>

