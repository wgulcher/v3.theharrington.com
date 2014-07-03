<?php get_header(); ?>


    <div class="page-content container">
    
   

			<div id="content" class="row clearfix">
            
            
            
            

						<div id="main" class="col-md-12  clearfix" role="main">
                        
                        
                        
                        
                        
                        
                        
                        
                        <h2>Tweets near here</h2>
                        <h2>Pictures near here</h2>
                        <h2>Searches near here</h2>
                        
                        
                        

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            
                            
                            
                           <?php get_template_part('post-formats/post',get_post_format()); ?>
                           
                            
                            

							<?php endwhile; ?>


                  <?php if (function_exists("emm_paginate")) { ?>
                      <?php emm_paginate(); ?>
									<?php } else { ?>
											<nav class="wp-prev-next">
													<ul class="clearfix">
														<li class="prev-link"><?php next_posts_link( __( '&laquo; Older Entries', 'bonestheme' )) ?></li>
														<li class="next-link"><?php previous_posts_link( __( 'Newer Entries &raquo;', 'bonestheme' )) ?></li>
													</ul>
											</nav>
									<?php } ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>


							<?php endif; ?>

						</div> <?php // end #main ?>


						<?php get_sidebar(); ?>


			</div> <?php // end #content ?>

    </div> <!-- end ./container -->

<?php get_footer(); ?>
