 <article id="post-<?php the_ID(); ?>" <?php post_class( 'block clearfix' ); ?> role="article">
                            
                            
                           
                            <div class="widget">
                                <div class="widget-simple themed-background-dark=standard">
                                    <a href="javascript:void(0)" class="widget-icon pull-right themed-background-standard">
                                        <i class="gi gi-film animation-floating"></i>
                                    </a>
                                   
                                   
                                   <h4 class="post-title entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"> post
                            <?php the_title(); ?></a></h4>
										<p class="byline vcard">
											by <span class="author"><em><?php echo bones_get_the_author_posts_link() ?></em></span> - 
											
											<span class="sticky-ind pull-right"><i class="fa fa-star"></i></span>
										</p>
                                   
                                   
                                </div>
                                <div class="widget-extra themed-background-standard">
                                    <div class="row text-center">
                                        <div class="col-xs-4">
                                            <h3 class="widget-content-light">
                                                <strong>135</strong><br>
                                                <small>meters</small>
                                            </h3>
                                        </div>
                                        <div class="col-xs-4">
                                            <h3 class="widget-content-light">
                                                <i class="fa fa-heart"></i><br>
                                                <small>503 Likes</small>
                                            </h3>
                                        </div>
                                        <div class="col-xs-4">
                                            <h3 class="widget-content-light">
                                               
                                                <small><time class="updated" datetime="<?php get_the_time('Y-m-j') ?>"><?php echo get_the_time(get_option('date_format')) ?></time></small>
                                            </h3>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                
                                
                                
                                
                                
                                
                                <?php global $brew_options; ?>
    								<?php if( $brew_options['featured'] == '2' || ( $brew_options['featured'] == '4' && is_single() ) || ( $brew_options['featured'] == '3' && is_home() ) ) { ?>
										<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-featured' ); ?>
										<?php if ( $image[1] < '750' && has_post_thumbnail() ) { ?>
											<section class="featured-content featured-img featured-img-bg" style="background: url('<?php echo $image[0]; ?>')">
										<?php } // end if 
										else { ?>
											<section class="featured-content featured-img">
												<?php if ( has_post_thumbnail() ) { ?>
				                                    <a class="featured-img" href="<?php the_permalink(); ?>">
				                                    	<?php the_post_thumbnail( 'post-featured' ); ?>
				                                    </a>
					                            <?php } // end if 
												else { ?>
					                            	<hr>
					                            <?php } //end else?>
						                <?php } // end else ?>
									<?php } // end if 
									else { ?>
										<section class="featured-content featured-img">
									<?php } // end else ?>

								</section>
                                
                                
                                
                                
                                
                                
                                <div class="widget-extra">
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                <div class="block-title">
                                    <div class="block-options pull-right">
                                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Post on Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
                                        <div class="btn-group btn-group-sm">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default dropdown-toggle enable-tooltip" data-toggle="dropdown" title="" data-original-title="Options"><span class="caret"></span></a>
                                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                                <li>
                                                    <a href="javascript:void(0)"><i class="gi gi-cloud pull-right"></i>Simple Action</a>
                                                    <a href="javascript:void(0)"><i class="gi gi-airplane pull-right"></i>Another Action</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="javascript:void(0)"><i class="fa fa-wrench fa-fw pull-right"></i>Separated Action</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <h2><strong>Example</strong> Title</h2>
                                </div>
                                
                                
                                
                                

								
                                
                                
                                    
                                    <?php the_content('dddd'); ?>
									<?php wp_link_pages(
                                		array(
                                		
	                                        'before' => '<div class="page-link"><span>' . __( 'Pages:', 'brew' ) . '</span>',
	                                        'after' => '</div>'
                                		) 
                                	); ?>
                                </div>
                           
                            
                            
                            
                            
                            
                            
                            
                            

							

							

							

								<footer class="article-footer clearfix">
									<span class="tags pull-left"><?php printf( '<span class="">' . __( 'in %1$s&nbsp;&nbsp;', 'bonestheme' ) . '</span>', get_the_category_list(', ') ); ?> <?php the_tags( '<span class="tags-title">' . __( '<i class="fa fa-tags"></i>', 'bonestheme' ) . '</span> ', ', ', '' ); ?></span>
              						<span class="commentnum pull-right"><a href="<?php comments_link(); ?>"><?php comments_number( '<i class="fa fa-comment"></i> 0', '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %' ); ?></a></span>
            					</footer> <?php // end article footer ?>

								<?php // comments_template(); // uncomment if you want to use them ?>

							
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                             </div>
                            
                            
                            
                            </article> <?php // end article ?>
                            
                            