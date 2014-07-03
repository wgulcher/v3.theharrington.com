
 
 
 
 
  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
   <i class="icon-chevron-sign-down icon-2x"></i>
  </a>
  <div class="nav-collapse collapse">

   
   			

<?php


	


	if(has_nav_menu('primary')){
		
	
		
	
	
		$args = array(
					'theme_location' => 'primary',
					'menu'       => 'Primary Navigation',
					'depth'      => 0,
					'container'  => false,
					'menu_class' => 'nav',
					//'after' => ' | ',
					//'link_after' => '>>> ',
					'walker'	 => new twitter_bootstrap_nav_walker()
				);
 
				wp_nav_menu($args);

		
					
	}else{ ?>
		
        
        
        <ul id="menu-fallback" class="nav">

 
    
      <?php 
	  
	 wp_list_pages('sort_column=menu_order&depth=1&title_li=&exclude=1'); 
	  
	  
	  ?>
      
      
   
  </ul> <?php
	}

	
	 
?>
  
            
            
        <?php 
    
?>
        
   
        
    </div><!-- /.nav-collapse -->