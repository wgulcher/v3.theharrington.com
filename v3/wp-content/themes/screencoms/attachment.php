<?php get_header(); ?>

<!-- make images responsive -->
<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function($){
    $('img').each(function(){ 
        $(this).removeAttr('width')
        $(this).removeAttr('height');
    });
});
</script>

<section id='content' class='content'>
    <div class="main-content-wrap row-fluid fx-type--padding-default">
     
            <article id="article" <?php post_class( 'image-attachment row-fluid' ); ?>>
              
                <div class="hentry-wrap clearfix">
            
                  
                    <div class="entry-attachment no-span-margin span8">
                        <div class="attachment attachment-image">
                            <a title="<?php the_title_attribute(); ?>"><?php
                            echo wp_get_attachment_image( $post->ID, array( 20000, 20000 ) ); // filterable image width with 1024px limit for image height.
                            ?></a>
                        </div><!-- .attachment -->
                    </div><!-- .entry-attachment -->
    
     
                    
    
                    <div class="hentry-text-wrap attachment-text-wrap">
                    
                    
                    
                 
                        <header class="entry-header">
                        
                        	<?php get_template_part('template_parts/meta-info'); ?>
                            
                            <h2 class="entry-title"><?php the_title() ?></h2>
                            
                        </header>
                        
                       
                    
                      
                        <div class="entry-description">
                            <!-- ?php the_content(); ? -->
                            <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'brandhub' ) . '</span>', 'after' => '</div>' ) ); ?>
                        </div><!-- .entry-description -->
                        
                        <?php get_template_part('template_parts/image-meta'); ?>
                    
                    
                         <nav id="nav-single" class="nav-single" role="navigation">
                    	<span class="btn nav-previous previous-image"><?php previous_image_link( false, __( '&larr; Previous', 'brandhub' ) ); ?></span>
                        <span class="btn nav-next next-image align-right"><?php next_image_link( false, __( 'Next &rarr;', 'brandhub' ) ); ?></span>
                    </nav><!-- #image-navigation -->
                    
                    <p class="back-button">
                    <a class="btn" href="javascript:history.go(-1)" style=" width:80px; height:40px; line-height:40px; font-size: 1.15rem;"> Back</a>
</p>
                    
                    
                    </div>
                    
                    
                    
                </div>
                
                <?php comments_template(); ?>   
            </article>
    
    	
    </div>
</section>
<?php get_footer(); ?>