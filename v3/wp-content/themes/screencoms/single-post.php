<?php get_header(); ?>





<!-- make images responsive -->
<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function($){
    $('img').each(function(){ 
        $(this).removeAttr('width')
        $(this).removeAttr('height');
    });
	 $('iframe').each(function(){ 
        $(this).removeAttr('width')
       
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
               

      

 <header class="entry-header">

 
                    <h2 class="entry-title"><?php the_title() ?></h2>
                    
                </header>
          
                <div class="entry-description">
                    <?php the_content(); ?>
                </div><!-- .entry-description -->
                
                
                  



  <div class="taxonomy_holder">
<h4 class="categories">Categories:</h4>
<?php

the_category(', ');
?>
         
<br><br>

<?php

 
$posttags = get_the_tags();
$count=0;
if ($posttags) {
echo "<h4 class='tags-title'>Tags:</h4><p>";
  foreach($posttags as $tag) {
    
      echo "<a href='?tag=" . $tag->slug ."' >" . $tag->name . "</a>, ";
    
  }
echo "</p>";
}
?>
</div>


            
            </div>
        </div> 
        
        
          <?php comments_template(); ?>
       
          
    </article>

          <?php 

          
          if(get_post_format() == 'gallery'){
                get_sidebar('post-gallery');}
              else{
                  get_sidebar('post');
            }
        ?>
          
    </div>
</section>

<?php get_footer(); ?>
