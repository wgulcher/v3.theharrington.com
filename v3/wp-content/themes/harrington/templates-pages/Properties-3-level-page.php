<?php
/**
 * Template Name: Properties 3 level
 */
get_header(); 
?>

		<nav class="span2 secondaryNav">
			<ul class="nav nav-list all-buildings">
				<li class=""><a href="/v3/properties">All Buildings</a></li>				
			</ul>		
			<?php wp_nav_menu2(array('menu' => 'maimmenu','walker' => new Residency_Walker_Prop));?>
		</nav>
		
		<nav class="span4">
		<h1 class="title"><?php  
		$uri = explode('/',$_SERVER["REQUEST_URI"]);
		echo ucfirst(str_replace('-',' ',$uri[1]));
		?></h1>
			<ul id="gal" class="thumbnails nav">
						<?php wp_nav_menu3(array('menu' => 'maimmenu','walker' => new Residency_Walker_Middle_Deep));?>
			</ul>
				
		</nav>
		<article class="span6 contentarea">
		<h2><?php 
			while (have_posts()) : the_post();
				the_title();
				endwhile;
			?></h2>
		
		<?php/* echo $fixc; */?>
		<?php 
			while (have_posts()) : the_post();
				the_content();
				endwhile;
			?>
		</article>
				<script>
				jQuery(document).ready(function ($) {
				
					$('.active,.anchor').parent().addClass('active');
					$('.title').html($('.active .anchor').html());
					//console.log($('.active .anchor').html());
					var hasclass = false;
					$.each($('.menu-main-menu-container>.nav.nav-list li'),function () {
						// console.log('a');
						if ( $(this).hasClass('active') ) {
							hasclass = true;
						}
					});
					if (hasclass === false) {
						$('.nav.nav-list li:first').addClass('active');
					}
				});
				</script>


<?php get_footer(); ?>