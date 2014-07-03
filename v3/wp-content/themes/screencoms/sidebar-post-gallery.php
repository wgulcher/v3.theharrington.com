<section id="primary" class="post-sidebar"  class="widget-area" role="complementary" >

       <div class="sidebar-wrap span4">
  
  <?php get_template_part('template_parts/meta-info'); ?>
    
    <div class="more-posts">
    
     <h2>sidebar post gallery</h2>
   
   
        <h3>Gallery Categories</h3>
        <ul class="recent-posts-list">
            <?php the_category(', '); ?>
        </ul>
    </div>
    
    <div class="more-posts">
        <h3>Gallery Tags</h3>
        <ul class="recent-posts-list">
            <?php the_tags('', ', ', ''); ?>
        </ul>
    </div>
    
    <div class="more-posts">
        <h3>Image Tags</h3>
        <ul class="recent-posts-list">
                                    </ul>
    </div>
    
    <div class="more-posts">
    
        <h3>Recent Posts by Author</h3>
        <ul class="recent-posts-list">
            <?php
            $post_args = array(
                'numberofposts' => 10,
                'author' => get_the_author_meta('ID')
            );
            $recent_posts = wp_get_recent_posts($post_args);
            
            foreach( $recent_posts as $recent ){ ?>
                <li>
                    <a href="<?php echo get_permalink($recent['ID']); ?>" title="View <?php echo esc_attr($recent['post_title']); ?>">
                        <span class="post-title"><?php echo $recent['post_title']; ?></span>
                    </a>
                </li>
            <?php }; ?>
        </ul>
    </div>
</div>
</section>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <section id="secondary" class="article-sidebar" class="widget-area" role="complementary" >
           <div class="sidebar-wrap span4">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
    </section><!-- #secondary -->
<?php endif; ?>