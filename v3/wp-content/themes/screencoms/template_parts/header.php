
  <section id="logo" class="align-left fx-type--border-default">
    <?php
				if ( ! display_header_text() ){
					$style = ' style="display:none;"';
					$header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
    <img src="<?php echo esc_url( $header_image ); ?>" class="header-image" alt="" />
    <?php endif;	
				}else{
					$style = ' style="color:#' . get_header_textcolor() . ';"';
				}
			?>
    <h1 class="site-title" id="site_name"  <?php echo $style; ?>><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" <?php echo $style; ?>>
      <?php bloginfo( 'name' ); ?>
      </a></h1>
    <h2 class="site-description"  id="site_description" <?php echo $style; ?>>
      <?php bloginfo( 'description' ); ?>
    </h2>
  </section>
 
  
            <?php get_template_part('widgets/widgetareas','header'); ?>
            
               

 
 
  <nav class="menu-menu align-right fx-type--hide" style="width:0px;">
    <?php get_template_part('template_parts/menu-header') ?>
  </nav>