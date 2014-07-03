<?php /** Template Name: Reveal JS */ ?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>reveal.js - The HTML Presentation Framework</title>
		<meta name="description" content="A framework for easily creating beautiful presentations using HTML">
		<meta name="author" content="Hakim El Hattab">
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
        
      <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css">
    
      <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/colour.css">
      
         <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/skins/default/skin.css">
          <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/skins/default/colour.css">
        
        
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/reveal/css/reveal.min.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/reveal/css/theme/default.css" id="theme">
		<!-- For syntax highlighting -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/reveal/lib/css/zenburn.css">
		<!-- If the query includes 'print-pdf', use the PDF print sheet -->
		
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/reveal.css">
		
		
		<script>
			document.write( '<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/reveal/css/print/' + ( window.location.search.match( /print-pdf/gi ) ? 'pdf' : 'paper' ) + '.css" type="text/css" media="print">' );
		</script>
        
    
       
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri() ?>/reveal/lib/js/html5shiv.js"></script>
		<![endif]-->
	</head>
	
    
    <body <?php body_class('layout-size--large layout-type--fluid') ?>>

     
                          
         
    
		<?php get_template_part('template_parts/reveal'); ?>
        
        
     
        <script src="<?php echo get_template_directory_uri() ?>/reveal/lib/js/head.min.js"></script>
    	<script src="<?php echo get_template_directory_uri() ?>/reveal/js/reveal.min.js"></script>
        
    
    
    
    	<script>
							
			// Full list of configuration options available from https://github.com/hakimel/reveal.js#configuration
			Reveal.initialize({
			
				// The "normal" size of the presentation, aspect ratio will be preserved
				// when the presentation is scaled to fit different resolutions. Can be
				// specified using percentage units.
				
			width: '100%',
		
			
				// Factor of the display size that should remain empty around the content
				margin: 0.03,
			
				// Bounds for smallest/largest possible scale to apply to content
				minScale: 0.3,
				maxScale: 1.0,
			
			
				
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
			

				theme: Reveal.getQueryHash().theme, // available themes are in /css/theme
				transition: Reveal.getQueryHash().transition || 'default', // default/cube/page/concave/zoom/linear/fade/none

				// Optional libraries used to extend on reveal.js
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
        
           

		   
	</body>
</html>