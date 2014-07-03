

   <?php get_template_part('template_parts/menu-page'); ?>
   

 <!-- ?php get_template_part('template_parts/meta-info'); ? -->
   

<?php

// question : is this var needed / being used?
global $sidebar_span;

$widget_area_location = 'sidebar';
$number_of_widgetareas = 8;
$number_of_widgetarea_containers = 1;

for ($i=1; $i<=$number_of_widgetarea_containers; $i++){
	$fieldToGet = "widget_area_" . $widget_area_location . $i;
	
	if(function_exists('get_field')){
	
			$values = get_field($fieldToGet);
	}else{
		$values = array ('widget-area-1');
	}
	
	if($values){ 
	
		$widgetAreaHolder = 'widget-area-' . $widget_area_location;
		$numberOfWidgets = 0;
	
		foreach($values as $value)
		{
			$numberOfWidgets++;
			if ( is_active_sidebar( $value ) ) {?>
				<div id="<?php echo $widgetAreaHolder ?>-id-<?php echo $numberOfWidgets; ?>" class="widget-area <?php echo $widgetAreaHolder ?>">
					<?php dynamic_sidebar( $value );  ?>
				</div>  <?php
			}
		}
		
	}
}

?>


 
    <div class="post-feed">
       
            <?php
            $post_args = array(
                'numberofposts' => 40
            );
            $recent_posts = wp_get_recent_posts($post_args);
            
            foreach( $recent_posts as $recent ){ ?>
               
              
              
              
              
              
              
              
              

<article wp2js_permalink="<?php the_permalink() ?>" id="post-<?php the_id() ?>" <?php post_class('hentry fx-type--bg-gradient-default fx-type--border-default global_content_background_color'); ?> class="<?php echo "author"; ?><?php the_author_id();  ?>" >
  	<div class="hentry-wrap clearfix">
    
    
	
   
    <div class="content-flip" style="display: none;">
			<span style="color: #222;">Some flipped content&hellip;</span>
		</div>
    
    <div class="hentry-text">
        <div class="hentry-text-wrap">
            
            <header class="entry-header">
            <!-- p class="timestsamp pull-right" style="position:absolute; top:10px; right:10px;"><time datetime="<?php echo get_the_date('c') ?>" pubdate>Date: <?php echo get_the_date() ?></time></p -->
   
   
            	<!-- ?php get_template_part('template_parts/meta-info'); ? -->
                
                <h2 class="entry-title"><?php echo $recent['post_title']; ?></h2>
                
        
            </header>
            
            <div class="excerpt">
                <?php echo $recent['excerpt']; ?>






            </div>
        
        </div>
        
        </div>

        <div id="main-media-item-<?php the_id() ?>" class="post-thumb-wrap" >
        	<?php getMediaFromPost('css','',''); ?>
    	</div>


 
	</div>
	
  
    
	
</article>
              
              
              
              
              
              
              
              
              
              
              
              
            <?php }; ?>
        
    </div>