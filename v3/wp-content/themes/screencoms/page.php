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
<div class="main-content-wrap row fx-type--padding-default">
<article id="article" <?php post_class( 'article span8 fx-type--hide' ); ?>>
    <div class="article-wrap fx-type--toggle clearfix">
        <div class="article-content">
            <?php if ( has_post_thumbnail() ){ ?>
            <div class="hero-media-holder">
                <?php if ( has_post_thumbnail() ){ ?>
                <?php 
                    $img = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_id()), 'hero-image');
                    $img = $img[0];
                ?>
                    <img src="<?php echo $img; ?>">
                <?php } else{ ?>
                    <img src="<?php echo $img; ?>">
                <?php } ?>
            </div>
            <?php } ?>

            <div class="article-text-wrap page-text-wrap">
               
          
                <div class="entry-description">
                    <?php the_content(); ?>
                </div><!-- .entry-description -->
                
              
            
            </div>
            
            
                
         
         <?php get_template_part('template_parts/feed-taxonomy'); ?>


            
            
        </div>   
        
          <?php comments_template(); ?>
          
    </article>
         

          <?php get_sidebar('page'); ?>
          
    </div>
</section>

<?php get_footer(); ?>