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


        <?php 
		

	if(function_exists('get_field')){
		$presentation_skin_source = get_field('acf_presentation_skin_source'); 
	}
	

            if ($presentation_skin_source == "custom"){ ?>


         <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css">
    
      <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/colour.css">
      
         <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/skins/default/skin.css">
          <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/skins/default/colour.css">

          <?php  }










        ?>
        
      <!--  
      
        
       --> 
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/reveal/css/reveal.min.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/reveal/css/theme/default.css" id="theme">

    

        <!-- For syntax highlighting -->
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/reveal/lib/css/zenburn.css">
        <!-- If the query includes 'print-pdf', use the PDF print sheet -->
        

<?php 

         if ($presentation_skin_source == "custom"){ ?>


         <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/reveal.css">
        

          <?php  }


        ?>
        


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
           		<?php 
				
					
				if(function_exists('get_field')){
		
                    $presentation_skin_preset = get_field('acf_presentation_skin_preset'); 
					$presentation_transition = get_field('acf_presentation_transition'); 
                    if(get_field('acf_presentation_width_type') == 'Percent'){
                        $presentation_width = get_field('acf_presentation_width_percent') . '%'; 
                    }else{
                        $presentation_width = get_field('acf_presentation_width_pixels');
                    }
                    if(get_field('acf_presentation_height_type') == 'Percent'){
                        $presentation_height = get_field('acf_presentation_height_percent') . '%'; 
                    }else{
                        $presentation_height = get_field('acf_presentation_height_pixels');
                    }
					$presentation_margin = get_field('acf_presentation_margin'); 
					$presentation_minScale = get_field('acf_presentation_minScale'); 
					$presentation_maxScale = get_field('acf_presentation_maxScale'); 
					$presentation_controls = get_field('acf_presentation_controls'); 
					$presentation_progress = get_field('acf_presentation_progress'); 
					$presentation_history = get_field('acf_presentation_history'); 
					$presentation_keyboard = get_field('acf_presentation_keyboard'); 
					
				}else{
					// defaults					
				}
				
				
                ?>

                <?php if($presentation_width){ ?>
                        width: '<?php echo $presentation_width; ?>',
                <?php } ?>

                <?php if($presentation_height){ ?>
                        height: '<?php echo $presentation_height; ?>',
                <?php } ?>

                <?php if($presentation_margin){ ?>
                        margin: '<?php echo $presentation_margin; ?>',
                <?php } ?>

                <?php if($presentation_minScale){ ?>
                        minScale: '<?php echo $presentation_minScale; ?>',
                <?php } ?>

                <?php if($presentation_maxScale){ ?>
                        maxScale: '<?php echo $presentation_maxScale; ?>',
                <?php } ?>
			
			/*
			
			
			
			// The "normal" size of the presentation, aspect ratio will be preserved
    // when the presentation is scaled to fit different resolutions. Can be
    // specified using percentage units.
    width: 960,
    height: 700,

    // Factor of the display size that should remain empty around the content
    margin: 0.1,

    // Bounds for smallest/largest possible scale to apply to content
    minScale: 0.2,
    maxScale: 1.0
			
			
			
			
			
			*/
            
			
	/*		
			
			// Display controls in the bottom right corner
    controls: true,

    // Display a presentation progress bar
    progress: true,

    // Push each slide change to the browser history
    history: false,

    // Enable keyboard shortcuts for navigation
    keyboard: true,

    // Enable touch events for navigation
    touch: true,

    // Enable the slide overview mode
    overview: true,

    // Vertical centering of slides
    center: true,

    // Loop the presentation
    loop: false,

    // Change the presentation direction to be RTL
    rtl: false,

    // Number of milliseconds between automatically proceeding to the
    // next slide, disabled when set to 0, this value can be overwritten
    // by using a data-autoslide attribute on your slides
    autoSlide: 0,

    // Enable slide navigation via mouse wheel
    mouseWheel: false,

    // Transition style
    transition: 'default', // default/cube/page/concave/zoom/linear/fade/none

    // Transition speed
    transitionSpeed: 'default', // default/fast/slow

    // Transition style for full page backgrounds
    backgroundTransition: 'default' // default/linear/none
	
	*/
                
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
            

                

                theme: Reveal.getQueryHash().theme || '<?php echo $presentation_skin_preset; ?>',  // available themes are in /css/theme
                transition: Reveal.getQueryHash().transition || '<?php echo $presentation_transition; ?>', // default/cube/page/concave/zoom/linear/fade/none

                // other options...

                    leap: {
                        naturalSwipe   : false,    // Invert swipe gestures
                        pointerOpacity : 0.2,      // Set pointer opacity to 0.5
                        pointerColor   : '#d80000' // Red pointer
                    },

                // Optional libraries used to extend on reveal.js
                dependencies: [
                   
                    // leap
                    { src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/leap/leap.js', async: true },

                    // multiplex
                    //{ src: '//cdnjs.cloudflare.com/ajax/libs/socket.io/0.9.10/socket.io.min.js', async: true },
                    //{ src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/multiplex/client.js', async: true },
                   
                    // other
                    { src: '<?php echo get_template_directory_uri() ?>/reveal/lib/js/classList.js', condition: function() { return !document.body.classList; } },
                    { src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
                    { src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
                    { src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
                    { src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } },
                    { src: '<?php echo get_template_directory_uri() ?>/reveal/plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }
                    
                ]
            });
			
					// must come after init			
				Reveal.configure({
					
					
  keyboard: {
    13: 'next', // go to the next slide when the ENTER key is pressed
    27: function() {}, // do something custom when ESC is pressed
    32: null // don't do anything when SPACE is pressed (i.e. disable a reveal.js default binding)
  }
});			
			
			
        </script>
        
           

           
    </body>
</html>