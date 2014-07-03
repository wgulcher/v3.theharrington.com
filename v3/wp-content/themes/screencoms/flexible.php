<?php 

/**
* Template Name: Flexible
*/

get_header();
?>

<section id='content' class="content<?php if ( get_field('content_class') ){ echo " ".get_field('content_class');} ?>">
<div class="main-content-wrap row fx-type--padding-default">

<?php

$container   = 'container'; //repeater field
$rows 		 = 'rows'; //repeater field
$sections    = 'section_block'; //flexible field

if( get_field($container) ):
	while ( has_sub_field($container) ): ?>

		<div class="row">

		<?php if( get_sub_field($rows) ): ?>

			<?php while( has_sub_field($rows) ): ?>

				<!-- section -->
				<div <?php if( get_sub_field('id') ){ echo 'id="' . get_sub_field('id') . '"';} ?> class="section cf <?php 
					if ( get_sub_field('span') ){ echo 'span' . get_sub_field('span') . ' ';}
					if ( get_sub_field('offset') ){ echo 'offset' . get_sub_field('offset') . ' ';}
					if ( get_sub_field('class') ){ echo get_sub_field('class') . ' ';}
				?>">

				<?php if( get_sub_field($sections) ): ?>
					<?php while( has_sub_field($sections) ): ?>

						<?php // START LAYOUTS ?>

				
						<?php // layout: Title
						if(get_row_layout() == 'title'): ?>
							<h3><?php 
								if(get_sub_field('use_default') == "1"){the_title();}
								else{the_sub_field('title');}
							?></h3>

						<?php // layout: Strap
						elseif(get_row_layout() == 'strap'): ?>
							<h4><?php the_sub_field('strap') ?></h4>

						<?php // layout: Text
						//NB: using a span instead of a <p> to avoid Wordpress WYSIWYG adding extra <p> tags causing conflict
						elseif(get_row_layout() == 'text'): ?>
							<span><?php 
								if(get_sub_field('use_default') == "1"){the_content();}
								else{the_sub_field('text');}
							?></span>
						
						<?php // layout: Carousel
						elseif(get_row_layout() == 'carousel'): ?>
							
							<!--?php the_sub_field('carousel') ?-->
                            
                            <!-- Carousel items -->
                            <div class="carousel-inner">
                                	<div class="item active">
                                    <img src="http://placehold.it/1170x528&text=Carousel+image+(static and clickable)" class="ph scale">
                                    <div class="carousel-caption">
                                    <h4>Carousel caption (optional)</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img src="http://placehold.it/1170x528&text=Carousel+image+(static and clickable)" class="ph scale">
                                    <div class="carousel-caption">
                                    <h4>Carousel caption (optional)</h4>
                                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Carousel nav -->
                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                            <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>

                            
						
						<?php // layout: Audio
						elseif(get_row_layout() == 'audio'): ?>
							<?php the_sub_field('embed_code') ?>
							<?php the_sub_field('file') ?>
						
						<?php // layout: Video
						elseif(get_row_layout() == 'video'): ?>
							<?php the_sub_field('embed_code') ?>
							<?php the_sub_field('file') ?>

						<?php // layout: Image
						elseif(get_row_layout() == 'image'): ?>
							<img 
								src="<?php the_sub_field('image') ?>" 
								alt="<?php the_sub_field('description') ?>" 
							>
						
						<?php // layout: Map
						elseif(get_row_layout() == 'map'): ?>
							<?php the_sub_field('kml') ?>
						
						<?php // layout: Featured Content
						elseif(get_row_layout() == 'featured_content'): ?>
							<?php while( has_sub_field('featured_content')): ?>
								<?php 
								$content_item = get_sub_field('content_item');
								
								//recreate the array as a real array
								$content_item_copy = array();

								foreach( $content_item as $k => $v ):
									$content_item_copy[$k] = $v;
									//echo '<pre>' . $k . ' => ' . $v . '</pre>';	//print available post data that can be referenced
								endforeach; 
								?>
							<?php //start the post ?>
							
							<h3><?php echo $content_item_copy['post_title']; ?></h3>
							
							<div class="post-content">
								<?php echo $content_item_copy['post_content']; ?>
							</div>


							<?php //end the post ?>
							<?php endwhile; ?>
						
						<?php // layout: Related Content
						elseif(get_row_layout() == 'related_content'): ?>
							Content Type: <?php the_sub_field('related_content_type') ?>
							Format: <?php the_sub_field('format') ?>
							Keyword: <?php the_sub_field('keyword') ?>
							Categories: <?php the_sub_field('categories') ?>
							Tags: <?php the_sub_field('tags') ?>
							Filter Type: <?php the_sub_field('filter_type') ?>
							Pagination?: <?php the_sub_field('pagination') ?>
						

						<?php // END LAYOUTS ?>

						<?php endif; //end if-elseif layout ?>

					<?php endwhile; //end while $sections ?>
				<?php endif; //end if $sections ?>

				</div><!-- /section -->

			<?php endwhile; //end while $rows ?>
		<?php endif; //end if $rows ?>
		
		</div><!-- /row -->

	<?php endwhile; //end while $container ?>
<?php endif; //end if $container

?>

</div><!-- /content-wrap -->
</section><!-- /content -->
	
<?php	
	get_template_part('template_parts/sidebar'); 
	get_footer();
?>