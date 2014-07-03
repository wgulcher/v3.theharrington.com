<?php 
	$post_number = $wp_query->current_post + 1;			 
?>
<article wp2js_postnumber="<?php echo $post_number; ?>" wp2js_permalink="<?php the_permalink() ?>" id="post-<?php the_id() ?>" <?php post_class('hentry fx-type--bg-gradient-default fx-type--border-default global_content_background_color'); ?> class="<?php echo "author"; ?><?php the_author_id();  ?>" >
  <div class="hentry-wrap clearfix">
    <div class="content-flip" style="display: none;">
      <p>xxx</p>
    </div>
    <div class="hentry-text" style="left:0px;">
      <div class="hentry-text-wrap" style="width:inherit">
        <header class="entry-header">
          <h2 class="entry-title">
            <?php the_content(); ?>
          </h2>
        </header>
      </div>
    </div>
    <div id="main-media-item>" class="post-thumb-wrap" > </div>
  </div>
</article>