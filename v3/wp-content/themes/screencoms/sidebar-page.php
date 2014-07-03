 <?php global $global_ui_color; 
 
 
 if( is_page_template('front-page.php') ||  is_home() || is_search() || is_archive()){
	 
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

		   <?php get_template_part('widgets/widgetareas','sidebar'); ?>

        </div> 

	</div>

