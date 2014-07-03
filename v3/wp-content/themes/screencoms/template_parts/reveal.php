<div class="reveal moveoffstage">
	<div class="slides">
    
    <?php

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$post_per_page = 1; // -1 shows all posts
		$do_not_show_stickies = 0; // 0 to show stickies
		$post_types =  array('post','page','attachment');
		$post_statuses = array('publish');
	  
	   if ( is_page_template('page_reveal.php') ||  is_page_template('reveal.php') ) { ?>
			<script>alert('page_reveal.php / reveal.php');</script>
<?php

	  $standard_args = array(
		  
			'tax_query' => array(
				'relation' => 'OR',
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => array( 'Uncatsdsegorised', 'Facebook' )
				)
			),
		  'post_type' => $post_types,
		  'post_status' => $post_statuses,
		  'posts_per_page' => $post_per_page,
	  );                      
	  
	  $revealposts = new WP_Query($standard_args);
	  
	  if (  $revealposts->have_posts() ) : while (  $revealposts->have_posts() ) :  $revealposts->the_post(); ?>  

		  <section>
			 <?php get_template_part('post/format/reveal'); ?>
		  </section>

	  <?php endwhile; endif;
	  
	  wp_reset_postdata();

  } else { ?>
		
<?php 

if(function_exists('get_field')){
		$posts = get_field('select_slides');
	}

if( $posts ): ?>
	
	<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
		<?php setup_postdata($post); ?>
	 
			 <?php get_template_part('post/format/reveal'); ?>
 
	<?php endforeach; ?>
	
	<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;

} ?>

	</div>
</div>