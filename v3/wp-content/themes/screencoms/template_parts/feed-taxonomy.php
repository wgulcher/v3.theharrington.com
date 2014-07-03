   
            <?php 
//get the category to query



$terms = rwmb_meta( 'YOUR_PREFIX_querytaxonomy', 'type=taxonomy&taxonomy=category' );

if ( $terms != 0){


?>
            
 <div class="post-feed fx-type--hide" style="">
                <div class="post-feed-wrap fx-type--toggle">
<?php
	
	

// only needs x1 so if change loop will screw!
foreach ( $terms as $term )
{
    $mycategory2query .= $term->name;
}


$cat = get_cat_ID($mycategory2query);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$post_per_page = -1; // -1 shows all posts
$do_not_show_stickies = 1; // 0 to show stickies
$post_types =  array( 'post');	$args=array(
	
	'post__not_in' => array($post->ID),
	
	 'category__in' => array($cat),
	//'term' => 'Contract',
	//'taxonomy'=>'portfolio-category',
	'orderby' => 'date',
	'order' => 'DESC',
	'paged' => $paged,
	'post_type' => $post_types,
	'posts_per_page' => $post_per_page,
	'caller_get_posts' => $do_not_show_stickies
	
	/*'tag__in' => $tag_ids,*/
	
	);
	
	$my_query = new wp_query( $args );

	while( $my_query->have_posts() ) {
	$my_query->the_post();
	?>
	
	<?php 
	
	
	
	
	if($global_post_shape == 'various'){
						
						//$masonryPostAndLocation = 'post/masonry/post-' . $global_post_shape_various;
						$masonryPostAndLocation = 'post/masonry/post-variedheight';
						
						get_template_part($masonryPostAndLocation,get_post_format());
					}
					else{
						
						get_template_part('post/format/post',get_post_format());
						
					}
	
	
	
	
	?>
						
	
	<?php }
	
	$post = $orig_post;
	wp_reset_query();
	?>
</div>
</div>
            
            <?php } ?>