<?php 

// global vars
global $global_theme_isusereditable, $global_post_shape, $global_post_size, $global_post_layout, $global_post_image_fit, $global_post_click,  $global_lightordark, $global_ui_color, $global_footer_left_textbox, $global_footer_right_textbox;







?>

</div> <!-- /container -->

        <footer id="footer" class="footer">
          <div class="footer-tint">
          <div class="footer-wrap container">

      
             
              
             
         
            <?php get_template_part('widgets/widgetareas','footer'); ?>
            
               

        
   
    
 

        <div class="row footer-content fx-type--border-default">
        
         <div class="span6 footer-text-left" style="float:left;">
        <p style="margin-top:10px"><?php echo $global_footer_left_textbox; ?></p>
        
        </div>
        
      
        
        
        
        <div class="span6 footer-text-right" style="margin-left:0; float: right;">
        <p class="pull-right" style="margin-top:10px"><?php echo $global_footer_right_textbox; ?></p>
        
        </div>
        
      
        
     
  </div>
        
            
            </div>
            
            
            
          
	


    
	
          
            
            </footer>
            
             

</div> <!-- /wrapper-main -->

       
    
               
<?php wp_footer() ?>

 <script type="text/javascript">
		
		  jQuery(document).ready(function($) {
			// $("#site_name").fitText(7.7);
	//	$("#site_description").fitText(3.3);
		
		
		/*
		$(window).resize(function(){
			alert('rezize');
			applyMasonry('.post-feed-wrap','.hentry');	
			});
		*/
		
		
		
	<?php	
		
	if ( $global_theme_isusereditable == "1") { ?>
					initilizeUserSettings();
			<?php	}else{ ?>
					
					// POSTS --------------------------------------------------
					
					setActiveButtonState('<?php echo $global_post_shape; ?>');
					setRunSiteSetting('<?php echo $global_post_shape; ?>');
		
					setActiveButtonState('<?php echo $global_post_size; ?>');
					setRunSiteSetting('<?php echo $global_post_size; ?>');
					
					setActiveButtonState('<?php echo $global_post_layout; ?>');
					setRunSiteSetting('<?php echo $global_post_layout; ?>');
					
					setActiveButtonState('<?php echo $global_post_image_fit; ?>');
					setRunSiteSetting('<?php echo $global_post_image_fit; ?>');
					
					setActiveButtonState('<?php echo $global_post_click; ?>');
					setRunSiteSetting('<?php echo $global_post_click; ?>');
					
					setActiveButtonState('<?php echo $global_lightordark; ?>');
					setRunSiteSetting('<?php echo $global_lightordark; ?>');
					
				
		
					initilizeUserSettings();
					
			<?php	} ?>
		
		
		
		
		
		
		
		
		
		
		
		
		launchSite();
		//alert('ft');
					
					
					$("body").niceScroll({cursorcolor:"<?php echo $global_ui_color; ?>",horizrailenabled:false, grabcursorenabled:false, touchbehaviour:false, gesturezoom:false});
					$("#sidebar").niceScroll(".sidebar-wrap",{cursorcolor:"<?php echo $global_ui_color; ?>",horizrailenabled:false, grabcursorenabled:true});
					//$(".hentry-wrap-expanded").niceScroll(".hentry-text-wrap",{cursorcolor:"<?php echo $global_ui_color; ?>"});
					
					
		
		/**
 * This code changes the default behavior of the navbar:
 * now the submenu pops in when the user rolls his mouse
 * over the parent level menu entry.
 * Many tanks to Hanzi for this idea and code!
 */
jQuery(document).ready(function($) {
  $('ul.nav li.dropdown, ul.nav li.dropdown-submenu').hover(function() {
		$(this).find(' > .dropdown-menu, ').stop(true, true).delay(200).fadeIn();
	}, function() {
		$(this).find(' > .dropdown-menu').stop(true, true).delay(200).fadeOut();
	});
});
		
		
		  });
		  // Code that uses other library's $ can follow here.
	</script>
    
</body>
</html>