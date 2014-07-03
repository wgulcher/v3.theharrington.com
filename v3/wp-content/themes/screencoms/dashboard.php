<?php /* Template Name: Dashboard */ ?>
<?php get_header(); ?>

<div class="row">
	<div class="span4 widget">
    	<?php 
			$commented = new WP_Query(array(
				'ignore_sticky_posts' => true,
				'orderby' => 'comment_count',
				'posts_per_page' => 5,
			));
		?>
		<h2>Most Comments</h2>
		<p><em>In the last 7 days</em></p>
		<ol>
			<?php if ($commented->have_posts()) : while ($commented->have_posts()) : $commented->the_post(); ?>
				<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a> <em><?php comments_number('0', '1', '%') ?></em></li>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</ol>
	</div>

	<div class="span4 widget">
    	<?php
			add_filter('posts_where', 'filter_when_7_days');
			$viewed = new WP_Query(array(
				'orderby' => 'meta_value_num',
				'ignore_sticky_posts' => true,
				'posts_per_page' => 5,
				'meta_key' => 'pageviews',
				'meta_query' => array(
					array(
						'key' => 'pageviews'
					)
				)
			));
			remove_filter('posts_where', 'filter_when_7_days');
		?>
		<h2>Most Views</h2>
		<p><em>In the last 7 days</em></p>
		<ol>
			<?php if ($viewed->have_posts()) : while ($viewed->have_posts()) : $viewed->the_post(); ?>
				<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a> <em><?php echo get_post_meta(get_the_ID(), 'pageviews', true) ?></em></li>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</ol>
	</div>

	<div class="span4 widget">
    	<?php
			add_filter('posts_where', 'filter_when_24_hrs');
			$trending = new WP_Query(array(
				'orderby' => 'meta_value_num',
				'ignore_sticky_posts' => true,
				'posts_per_page' => 5,
				'meta_key' => 'pageviews',
				'meta_query' => array(
					array(
						'key' => 'pageviews'
					)
				)
			));
			remove_filter('posts_where', 'filter_when_24_hrs');
		?>
		<h2>Trending</h2>
		<p><em>In the last 24hrs</em></p>
		<ol>
			<?php if ($trending->have_posts()) : while ($trending->have_posts()) : $trending->the_post(); ?>
				<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a> <em><?php echo get_post_meta(get_the_ID(), 'pageviews', true) ?></em></li>
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</ol>
	</div>

	<div class="span4 widget">
    	<?php
			$active_users = wp_list_authors(array(
				'orderby' => 'post_count',
				'order' => 'DESC',
				'number' => 5,
				'optioncount' => true,
				'echo' => false
			));
		?>
		<h2>Active users</h2>
		<ol>
			<?php echo $active_users; ?>
		</ol>
	</div>
</div>

<div class="row">
	<div class="span12 widget">
		<h2>Map</h2>
		<div id="post-map"></div>
	</div>
</div>

<?php get_footer(); ?>