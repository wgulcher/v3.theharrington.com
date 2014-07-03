<div class="meta-info clearfix">
    <!-- ?php echo get_avatar(null, $size = 140); ? -->
<?php if (($wp_query->current_post + 1) != 0){ ?>
	<p class="number">No: <?php echo $wp_query->current_post + 1; ?></p>
<?php } ?>
    <h3 class="timestamp"><time datetime="<?php echo get_the_date('c') ?>" pubdate><?php echo get_the_date() ?></time></h3>
    <!-- p class="author">By: <?php the_author_posts_link(); ?></p -->
<?php if (is_attachment()){ ?>
	<!-- p class="link">
    	<a title="View in Lightbox" href="<?php echo esc_url( wp_get_attachment_url() ); ?>" rel="lightbox" class="btn">
    	<i class="icon-circle-arrow-right visit-post-link"></i> Lightbox</a>
    </p -->
<?php } ?>
</div>