<?php /* Template Name: Profile */ ?>
<?php get_header(); ?>

<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$user_name = $curauth->display_name;
$userID = $curauth->ID;
?>
		<div class="content-profile user-profile">
			<header class="row meta user-info clearfix">
				<div class="span2"><?php echo get_avatar(null, $size = 140); ?></div>
				<p class="display-name span9"><?php echo $user_name; ?></p>
			</header>
						
			<div class="row-fluid">
				<?php get_template_part('template_parts/filter-search'); ?>
			</div>
			
			<div class="recent-posts-list-wrap row">
				<ul class="recent-posts-list row">
					<?php
					$rp_args = array(
						'numberofposts' => 10,
						'author' => $userID
					);
					$recent_posts = wp_get_recent_posts($rp_args);
					foreach( $recent_posts as $recent ){ ?>
						<li class="clearfix">
							<a href="<?php echo get_permalink($recent['ID']); ?>" title="View <?php echo esc_attr($recent['post_title']); ?>">
								<span class="post-title"><?php echo $recent['post_title']; ?></span>
								<span class="post-date">
									<?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
								</span>
							</a>
						</li>
					<?php }; ?>
				</ul>
			</div>
		</div>
        
        
<?php get_footer(); ?>