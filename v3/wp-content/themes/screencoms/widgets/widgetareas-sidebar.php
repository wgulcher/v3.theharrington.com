
  <?php get_template_part('template_parts/menu-page'); ?>
  
  
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



  

 <!-- ?php get_template_part('template_parts/meta-info'); ? -->
   