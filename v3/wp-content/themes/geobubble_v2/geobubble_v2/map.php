<?php get_header(); 

/**
 * Template Name: Map
 */

?>
   

<script type="text/javascript">
    var objects = new Array();
	var gmapobjects = new Array();
</script>

    
    <?php get_template_part('menu-filter-view') ?>
 
 <?php //get_template_part('menu-filter-query') ?>
   
<div class="span10">




<?php

$args = array(
	'post_type' => 'location',
	
	/*
	'tax_query' => array(
		'relation' => 'OR',
		array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => array( 'quotes' )
		),
		array(
			'taxonomy' => 'post_format',
			'field' => 'slug',
			'terms' => array( 'post-format-quote' )
		)
	)
	
	*/
);
                   
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

  <!-- pagination here -->

  <!-- the loop -->
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    
    
    <?php
	
	
		$acf_longitude = get_field( "longitude" );
		$acf_latitude = get_field( "latitude" );
		
			//echo "1: " . $acf_longitude;
	//	echo "2:" . $acf_latitude;
	
	?>


 <script type="text/javascript">
        var item = new Object();
        item.longitude = '<?php echo $acf_longitude; ?>';
		item.latitude = '<?php echo $acf_latitude; ?>';
        objects.push(item);
    </script>


    
  <?php endwhile; ?>
  <!-- end of the loop -->

  <!-- pagination here -->

  <?php wp_reset_postdata(); ?>

<?php else:  ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
                           
                            
                            











    <ul class="thumbnails nav">    
        <?php	$args = array(
					//'authors'      => '',
					//'child_of'     => 0,
					//'date_format'  => get_option('date_format'),
					'depth'        => 0,
					'echo'         => 1,
					//'exclude'      => '',
					//'include'      => '',
					//'link_after'   => '',
					//'link_before'  => '',
					'post_type'    => 'properties',
					'post_status'  => 'publish',
					//'show_date'    => '',
					'sort_column'  => 'menu_order',
					//'sort_order'   => '',
					'title_li'     => __(''), 
					'walker'       => new Thumbnail_walker(),
				);
				wp_list_pages($args); ?>
     </ul>

    </div>
    

    
    <div class="content-header ">
    
    
        <div class="header-section">
            <h1>
                <i class="gi gi-pin"></i>Maps<br><small>Easy Google Maps Integration!</small>
            </h1>
        </div>
        <!-- Header Map -->
        <div id="map-canvas"></div>
 </div>







    
    
    
    </div>
    
  
    
    <?php get_footer(); ?>




    <script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.


for(var i = 0; i < objects.length; i ++)
    {
        
		//alert(objects[i].longitude);
		var pos = new google.maps.LatLng(objects[i].latitude, objects[i].longitude);

		gmapobjects.push(pos);
		
    }

var london = new google.maps.LatLng(51.5612, -0.1889);
//var pos1 = new google.maps.LatLng(<?php echo $acf_latitude; ?>, <?php echo $acf_longitude; ?>);
//var pos2 = new google.maps.LatLng(54.327383, 19.06747);
var marker;
//var marker2;
//var marker3;
//var marker1;
var map;

function initialize() {
  var mapOptions = {
    zoom: 12,
    center: london
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
 /*	  
  marker = new google.maps.Marker({
    map:map,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: pos1
  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
 */
 
 for(var i = 0; i < gmapobjects.length; i ++)
    {
		marker = new google.maps.Marker({
			map:map,
			draggable:true,
			animation: google.maps.Animation.DROP,
			position: gmapobjects[i]
	  	});
	  	google.maps.event.addListener(marker, 'click', toggleBounce);
    }
 

  
  
  

  // Try HTML5 geolocation
 
 
 	
	/*
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'Location found using HTML5.'
      });

      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
  
  */
  
}

function toggleBounce() {

  if (marker.getAnimation() != null) {
    marker.setAnimation(null);
  } else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
  }
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

google.maps.event.addDomListener(window, 'load', initialize);



</script>