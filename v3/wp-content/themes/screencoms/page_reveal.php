<?php /** Template Name: Page + Reveal */ ?>
<?php get_header(); ?>

<!-- make images responsive -->
<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function($){
    $('img').each(function(){ 
        $(this).removeAttr('width')
        $(this).removeAttr('height');
    });
	
	
	$(window).resize(function(){
	
	$revealWidth = $('.main-article').width();
	
	if($revealWidth == '300'){
		$revealHeight = '60';
	}
	else if($revealWidth == '620'){
		$revealHeight = '140';
	}
	else if($revealWidth == '940'){
		$revealHeight = '220';
	}
	else if($revealWidth == '1260'){
		$revealHeight = '300';
	}
	else if($revealWidth >= '1580'){
		$revealHeight = '380';
	}
	else if($revealWidth >= '1900'){
		$revealHeight = '460';
	}
	//alert($revealWidth)
	
	Reveal.configure({
							//width: 940,
						height: $revealHeight,
							width: $revealWidth
						
						});
	});
	
});
</script>

<section id='content' class='content'>
<div class="main-content-wrap row fx-type--padding-default">
<article id="article-<?php the_ID(); ?>" <?php post_class( 'article main-article span8 fx-type--hide' ); ?>>
    <div class="article-wrap fx-type--toggle clearfix">
        <div class="article-content">
        
        

        
        
        
          <section class="reveal-feed fx-type--hide">
                <div class="reveal-feed-wrap fx-type--toggle">
                    <?php get_template_part('template_parts/reveal'); ?>
                    <script>
					
					 //$revealWidth = $('.article').width();
					
						Reveal.initialize({
							//width: 940,
							width: '100%',
							height: 380,
							margin: 0,
							minScale: 1.0,
							maxScale: 1.0,
							controls: true,
							progress: true,
							history: true,
							controls: true,
							progress: true,
							history: true,
							keyboard: true,
							overview: true,
							loop: false,
							autoSlide: 0,
							mouseWheel: true,
							rtl: false,
							rollingLinks: true,
							center: false,
							theme: Reveal.getQueryHash().theme,
							transition: Reveal.getQueryHash().transition || 'zoom',
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

        

            <div class="article-text-wrap page-text-wrap">
                <header class="entry-header">
                
                    <?php get_template_part('template_parts/meta-info'); ?>
                    
                    <h2 class="entry-title"><?php the_title() ?></h2>
                    
                </header>
          
                <div class="entry-description">
                    <?php the_content(); ?>
                </div><!-- .entry-description -->
            
            </div>
        </div>   
    </article>
         

          <?php get_sidebar('page'); ?>
          
    </div>
</section>

<?php get_footer(); ?>