<?php get_header(); ?>

<?php  
/* 
Template Name: Gallery Page 
*/  
?> 

<section id='content' class='content'>
    <div class="main-content-wrap row-fluid fx-type--padding-default">

<?php  
  
$images = array('http://localhost/brandphoto/wp-content/uploads/2013/01/LON124744.jpg','http://localhost/brandphoto/wp-content/uploads/2013/01/IMAG1555.jpg');  



if($images){ ?>  
<div id="slider">  
    <?php foreach($images as $image){ ?>  
    <img src="<?php echo $image; ?>" alt="<?php echo $image->post_title; ?>" title="<?php echo $image->post_title; ?>" />  
    <?php    } ?>  
</div>  
    <?php } ?>  
    
    
<script>  
    window._flux = new flux.slider('#slider',{pagination: true});  
</script>  
  </div>
</section>
<?php wp_footer(); ?>  