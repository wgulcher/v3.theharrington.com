<?php
	// Get EXIF from WP and set in title
	$metadata = wp_get_attachment_metadata($id);
	//print_r ($metadata);
	$image_sizes = $metadata[sizes];
	$thumbnail = $image_sizes[thumbnail];
	$medium = $image_sizes[medium];
	$large = $image_sizes[large];
	$image_meta = $metadata[image_meta];
	// sort format for googlemap link
	$lat = geo_single_fracs2dec($metadata['image_meta']['latitude']);
	$lng = geo_single_fracs2dec($metadata['image_meta']['longitude']);
	if ($metadata['image_meta']['latitude_ref'] == 'S') { $neg_lat = '-'; } else { $neg_lat = ''; }
	if ($metadata['image_meta']['longitude_ref'] == 'W') { $neg_lng = '-'; } else { $neg_lng = ''; }
?>

<p>
	<a title="<?php echo esc_attr( strip_tags( get_the_title( $post->post_parent ) ) )?>" href="<?php echo esc_url( get_permalink( $post->post_parent ) )?>" class="btn back-to-parent"><i class="icon-circle-arrow-right visit-post-link"></i> Back to <?php echo get_the_title( $post->post_parent ) ?></a>
</p>

<ul>
	<li>time: <?php echo esc_attr( get_the_time() )?></li>
	<li>date: <?php echo esc_attr( get_the_date() )?></li>
	<li>width: <?php echo $metadata[width] ?></li>
	<li>height: <?php echo $metadata[height] ?></li>
	<li>mime-type: <?php echo get_post_mime_type($post_id)?></li>
	<li>full url: <?php echo esc_url( wp_get_attachment_url() )?></li>
</ul>
<ul>	
	<!-- geo tags - new - in functions.php - until wp add it!!!! -->
	<li>latitude: <?php echo geo_pretty_fracs2dec($metadata['image_meta']['latitude']). $metadata['image_meta']['latitude_ref'] ?></li>
	<li>longitude: <?php echo geo_pretty_fracs2dec($metadata['image_meta']['longitude']). $metadata['image_meta']['longitude_ref'] ?></li>
	<li>link: http://maps.google.com/maps?q=<?php echo $neg_lat . number_format($lat, 6) . '+' . $neg_lng . number_format($lng, 6) . '&z=11' ?></li>
</ul>
<ul>
	<li>title: <?php echo $image_meta[title] ?></li>
    <li>caption: <?php echo $image_meta[caption] ?></li>
	<li>credit: <?php echo $image_meta[credit] ?></li>
    <li>created_timestamp: <?php echo $image_meta[created_timestamp] ?></li>
	<li>copyright: <?php echo $image_meta[copyright] ?></li>
</ul>	
<ul>
	<li>camera: <?php echo $image_meta[camera] ?></li>
	<li>aperture: <?php echo $image_meta[aperture] ?></li>
	<li>focal_length: <?php echo $image_meta[focal_length] ?></li>
	<li>iso: <?php echo $image_meta[iso] ?></li>
	<li>shutter_speed: <?php echo $image_meta[shutter_speed] ?></li>
</ul>
<ul>
    <li>file:  <?php echo $metadata[file] ?></li>
    <li>thumbnail file:  <?php echo $thumbnail[file] ?></li>
	<li>thumbnail width: <?php echo $thumbnail[width] ?></li>
	<li>thumbnail height: <?php echo $thumbnail[height] ?></li>
	<li>medium file:  <?php echo $medium[file] ?></li>
	<li>medium width: <?php echo $medium[width] ?></li>
	<li>medium height: <?php echo $medium[height] ?></li>
	<li>large file:  <?php echo $large[file] ?></li>
	<li>large width: <?php echo $large[width] ?></li>
	<li>large height: <?php echo $large[height] ?></li>
</ul>