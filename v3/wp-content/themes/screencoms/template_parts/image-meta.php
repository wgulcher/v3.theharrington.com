<div class="entry-meta"><?php




	// Get EXIF from WP and set in title
	$metadata = wp_get_attachment_metadata($id);
	//print_r ($metadata);
	$image_sizes = $metadata[sizes];
	$thumbnail = $image_sizes[thumbnail];
	$medium = $image_sizes[medium];
	$large = $image_sizes[large];
	$image_meta = $metadata[image_meta];
	// sort format for googlemap link
	//$lat = geo_single_fracs2dec($metadata['image_meta']['latitude']);
	//$lng = geo_single_fracs2dec($metadata['image_meta']['longitude']);
	//if ($metadata['image_meta']['latitude_ref'] == 'S') { $neg_lat = '-'; } else { $neg_lat = ''; }
	//if ($metadata['image_meta']['longitude_ref'] == 'W') { $neg_lng = '-'; } else { $neg_lng = ''; }
?>
<!-- h3>Photographer:</h3>
<p><?php the_author_posts_link(); ?></p -->

<?php if ($image_meta[copyright] != ""){ ?>
	
	<h3>Copyright:</h3>
<p><?php echo $image_meta[copyright] ?></p> 

<?php }?>


<?php 


$post_title = get_the_title( $post->post_parent );
$parent_title = get_the_title( $post );




if($post_title != $parent_title){ ?>
	
<h3>Post / Gallery:</h3>
<p><?php echo get_the_title( $post->post_parent ) ?> <br></p>
<?php }?>

<?php if(the_category(', ') != ""){ ?>

<h3>Categories:</h3>
<p><?php echo the_category(', '); ?><br></p>

<?php } ?>

<?php

 
$posttags = get_the_tags();
$count=0;
if ($posttags) {
echo "<h3>Tags:</h3><p>";
  foreach($posttags as $tag) {
    
      echo "<a href='?tag=" . $tag->slug ."' >" . $tag->name . "</a>, ";
    
  }
echo "</p>";
}
?>

<!-- p><a title="<?php echo esc_attr( strip_tags( get_the_title( $post->post_parent ) ) )?>" href="<?php echo esc_url( get_permalink( $post->post_parent ) )?>" class="back-to-parent">Back to Gallery</a><br / -->
<!--a title="<?php echo esc_attr( strip_tags( get_the_title( $post->post_parent ) ) )?>" href="http://174.132.165.162/~tandem/multistory/galleries/" class="back-to-parent">Gallery Overview<br / -->
  </a>
  
</p>

</div>