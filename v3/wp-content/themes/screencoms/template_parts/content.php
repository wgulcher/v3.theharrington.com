<?php 

// global vars
global $global_post_shape;
global $global_post_shape_various;





?>




<script>

//alert('<?php echo $global_post_shape; ?>');

</script>
<section id='content' class='content row'>
   
  
        
        
          <section class="reveal-feed fx-type--hide" style="margin-top:10px" >
                <div class="reveal-feed-wrap fx-type--toggle">
                    <?php get_template_part('template_parts/reveal'); ?>
                    <script>
					
					 //$revealWidth = $('.article').width();
					
						Reveal.initialize({
							//width: 940,
							width: '100%',
							height: '100%',
							margin: 0,
							minScale: 1.0,
							maxScale: 1.0,
							controls: false,
							progress: false,
							history: true,
							keyboard: true,
							overview: false,
							loop: false,
							autoSlide: 0,
							mouseWheel: false,
							rtl: false,
							rollingLinks: false,
							center: false,
							theme: Reveal.getQueryHash().theme,
							transition: Reveal.getQueryHash().transition || 'default',
							dependencies: [
								{ src: '<?php echo get_template_directory_uri() ?>/reveal/lib/js/classList.js', condition: function() { return !document.body.classList; } },
								{ src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/markdown/showdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
								{ src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
								{ src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
								{ src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } },
								{ src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }
								// { src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/remotes/remotes.js', async: true, condition: function() { return !!document.body.classList; } }
							]
						});
					</script>
            	</div>
            </section>

        


       
	
		<?php 

		/*
            $query = new WP_Query( array(
                'post_type' => array( 
                    'post',
					 'instagram',
					 'films',
                    'attachment', 
                    'presentation'
                ),
                'post_status' => 'any'
            ) );
			
			*/


			if ( have_posts() ){ ?>
            
             <div class="main-content-wrap fx-type--padding-default">
            <div class="post-feed fx-type--hide">
                <div class="post-feed-wrap fx-type--toggle">
            
            <?php
				while (have_posts() ) :  the_post();
				
					if($global_post_shape == 'various'){
						
						//$masonryPostAndLocation = 'post/masonry/post-' . $global_post_shape_various;
						$masonryPostAndLocation = 'post/masonry/post-variedheight';
						
						get_template_part($masonryPostAndLocation,get_post_format());
					}
					else{
						
						get_template_part('post/format/post',get_post_format());
						
					}
					
					
					
					
					
					
				endwhile;
		?>
        
        <!-- ?php previous_posts_link(); ?-->

 <!-- ?php next_posts_link(); ?-->
 
 <!-- ?php posts_nav_link(); ?-->
 

        
        <div class="article-popup-container">
        
       
        </div>
        
        
       

	</div>
    
     <div id="pagination-nav" class="row" style="text-align:center; margin-bottom:15px; width:100%; display:inline-block; margin-left:20px;">
 <div class="btn-group ui-colour">
<?php
global $wp_query;

$big = 999999999; // need an unlikely integer

echo paginate_links( array(
'prev_text'    => __('« Prev','screencoms'),
	'next_text'    => __('Next »','screencoms'),
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
) );
?>



</div></div>
</div>
</div>



			<?php }else{ ?>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <section id="content" class="content">
<div class="main-content-wrap row fx-type--padding-default">
<article id="article-8495" class="post-8495 page type-page article span8">
    <div class="article-wrap fx-type--toggle clearfix">
        <div class="article-content">
                        
                        
                         <div class="article-text-wrap">
            
    
    
            	         
                <h2 class="entry-title">No search results returned</h2>
           
         
            
         
                	<p>We are sorry, this search returned no results. Please search again or use the drop downs above to view content.</p>
            
       

     
	</div>
                        
                        
                        
        </div>   
    </div></article>
         

         
            
            
            
           
            
            
            
            
            
            
                 
            
            
			<?php };
        ?>
		 
            
            
            

</section>


    
            

