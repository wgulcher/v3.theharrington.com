
            
                <div class="ui-colour align-right  toggle-menu-site-button-wrap fx-type--border-default" style="width:60px; display:inline-block;"> 
            
            
                <a href="#" title="Show / Hide Layout Options" class="btn align-right toggle-menu-site-button remove-right-margin"><i class="icon-adjust icon-2x"></i> Settings</a>
                
       </div>
            

                 <div class="ui-colour align-right add-post-now-wrap" style="width:60px; display:inline-block; margin-left:20px; margin-right:20px;"> 
               
                <!-- a href="#" title="View Posts" class="btn btn-primary align-right toggle-post-feed"><i class="icon-eye-open"></i> View</a -->
                <!-- a href="#" title="View Reveal Controls" class="btn btn-primary align-right toggle-reveal-menus"><i class="icon-eye-open"></i> Reveal</a -->
               <?php if (is_front_page() && current_user_can('publish_posts')) { ?>
                    <!-- a href="#" title="Write a Post" class="btn align-right add-post-now"><i class="icon-edit"></i> Write</a -->
               <?php } ?>
			   
               </div>