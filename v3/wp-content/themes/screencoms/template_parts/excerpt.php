<article id="post-<?php the_id() ?>" <?php post_class('pad') ?>>
<div class="row-fluid">
	<div class="span4">
		<div class="wrap">
			<?php if (has_post_thumbnail())
				the_post_thumbnail(null, array('class' => 'scale')); ?>
		</div>
	</div>

	<header class="entry-header span8">
		<div class="wrap">
        
       		 <!--  ?php get_template_part('template_parts/meta-info'); ? -->
             
			<h3 class="entry-title"><a rel="permalink" href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>

			
		</div>
	</header>


	<div class="entry-summary span8">
		<div class="wrap">
			<?php the_excerpt() ?>
		</div>
	</div>
</div>

</article>