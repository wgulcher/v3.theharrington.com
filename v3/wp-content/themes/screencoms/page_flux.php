<?php /** Template Name: Page + Flux */ ?>
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


    
        <article id="article-<?php the_ID(); ?>" <?php post_class( 'article span8 fx-type--hide' ); ?>>
          
            <div class="article-wrap fx-type--toggle clearfix">
            
                <div class="article-content">
            		
                        
                   <?php  
  
$_images = array('http://localhost/pod/wp-content/uploads/2013/02/avatar.jpg','http://localhost/pod/wp-content/uploads/2013/02/ironman.jpg',
'http://localhost/pod/wp-content/uploads/2013/02/tron.jpg','http://localhost/pod/wp-content/uploads/2013/02/greenhornet.jpg');  

$images = array('http://localhost/pod/wp-content/uploads/2013/02/IMAG0124-1240x300.jpg','http://localhost/pod/wp-content/uploads/2013/02/20121217_123352-1240x300.jpg',
'http://localhost/pod/wp-content/uploads/2013/02/20121217_123244-1240x300.jpg','http://localhost/pod/wp-content/uploads/2013/02/20121217_124043-1240x300.jpg');  

if($images){ ?>  
<div id="slider">  
    <?php foreach($images as $image){ ?>  
    <img src="<?php echo $image; ?>" alt="<?php echo $image->post_title; ?>" title="<?php echo $image->post_title; ?>" />  
    <?php    } ?>  
</div>  
    <?php } ?>  
    
    
<script>  
    window._flux = new flux.slider('#slider',{pagination: true});  
</script>  
                   
                   
                   
                   
                            
                   
                   
                   
  

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
                        <header class="entry-header">
                            
                            <?php get_template_part('template_parts/meta-info'); ?>
                            
                            <h2 class="entry-title"><?php the_title() ?></h2>
                           
                        </header>
                  
                        <div class="entry-description">
                            <?php the_content(); ?>
                        </div><!-- .entry-description -->
                        
                        <?php comments_template(); ?>
                    
                    </div>
                </div>   
            </article>
           
            <?php get_sidebar(); ?>
            
    </div>   
    </section>
    
    
  <script>  
    window._flux = new flux.slider('#slider',{pagination: true});  
</script>  

    
<?php get_footer(); ?>