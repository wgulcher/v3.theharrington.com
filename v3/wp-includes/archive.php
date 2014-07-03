<?php get_header(); 
$property_name = get_query_var('property_name');
$apartment_name = get_query_var('apartment_name');

?>
			
	<section class="body-content clearfix row-fluid">
		<nav class="secondaryNav span2">
			<ul class="nav nav-list">
			<li class=""><a href="/v3/properties">All Buildings</a></li>
			<?php /*
				global $post;
				 function get_id_by_post_name($post_name) {
					global $wpdb;
						$id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$post_name."'");
						$taxonomy_id = $wpdb->get_var("SELECT TERM_TAXONOMY_ID FROM $wpdb->term_relationships WHERE object_id = '".$id."'");
						$description = $wpdb->get_var("SELECT DESCRIPTION FROM $wpdb->term_taxonomy WHERE term_id = '".$taxonomy_id."'");
					return $description;
				}
				$property_category = get_id_by_post_name($property_name);
				foreach((get_categories()) as $category) {
    if ($category->cat_name != 'Uncategorized') {
    ?><li class="<?php if (strtolower(str_replace('-',' ',$property_name)) == strtolower($category->name)) {echo "active";} else echo "$property_name".":"."$category->name";?>"><?php echo '<a href="/v3/properties/' . str_replace(' ','-',$category->slug) ."/#".strtolower(str_replace(' ','-',$category->slug)) . '-overview/" title="' . sprintf( __( "View all posts in %s" ), $category->slug ) . '" ' . '>' . $category->name.'</a></li> ';
}
}
			*/?>
				
			</ul>
			<?php wp_nav_menu2(array('menu' => 'sidemenu','walker' => new Residency_Walker));?>
		</nav>
		
		<nav class="propertyNav span4">
		<h1><?php 
			$property = explode('/',$_SERVER['REQUEST_URI']);
			
			echo 
			str_replace('-',' ',$property[3]);
		?></h1>
		<?php 
		
		function echo_image( $postID ) {
		
					$res = get_post_meta($postID,'imgs');
					$final_array = Array();

					$splitted = preg_split('"([A-za-z1-9\s]+\[/caption\])"',$res[0],NULL,PREG_SPLIT_DELIM_CAPTURE);
					while(preg_match('"([A-za-z1-9\s]+\[/caption\])"',$splitted[count($splitted)-1] ) === 0 && count($splitted)%2==1) 
					 {
						array_pop($splitted);
					}
		
					for ($j = 0; $j < count($splitted); $j=$j+2) {
							preg_match('"src=\"(.+?)\""',$splitted[$j],$matches);
							$j_derived = ($j == 0 ? $j_derived = 0 : $j_derived = $j/2);
							$final_array[$j_derived][] = $matches[1];
						}
						for ($j = 1; $j < count($splitted); $j=$j+2) {
							$j_derived = ($j == 1 ? $j_derived = 0 : $j_derived = ($j-1)/2);
							preg_match('"([A-za-z1-9\s]+)\[/caption\]"',$splitted[$j],$matches_captions);
							$final_array[$j_derived][] = $matches_captions[1];
						}
					
		

					$thumbID = get_post_thumbnail_id($postID);
					$args = array(
						'numberposts' => -1,
						'order' => 'ASC',
						'post_mime_type' => 'image',
						'post_parent' => $postID,
						'post_status' => null,
						'post_type' => 'attachment',
						'exclude' => $thumbID
					);

					$attachments = get_children( $args );
					$counter = 2;
					$i = 0;
					if ( $attachments ) {
									foreach ( $attachments as $attachment ) {
		$image_attributes_small = wp_get_attachment_image_src( $attachment->ID, 'thumbnail' )  ? wp_get_attachment_image_src( $attachment->ID, 'thumbnail' ) : wp_get_attachment_image_src( $attachment->ID, 'thumbnail' );
		$image_attributes = wp_get_attachment_image_src( $attachment->ID, 'medium' )  ? wp_get_attachment_image_src( $attachment->ID, 'medium' ) : wp_get_attachment_image_src( $attachment->ID, 'medium' );
			/*echo gettype($final_array);
			echo '<pre>';
				var_dump($final_array);
			echo '</pre>';*/
			if (count($final_array) > 0) {
			for ( $n = 0; $n<count($final_array);$n++) {
				if (strtolower($image_attributes_small[0]) == strtolower($final_array[$n][0])) {
					echo 	"<li class=\"imgs\" data-count=\"$counter\">".
								"<a href=\"#\" data-bigger=\"$image_attributes[0]\" class=\"thumbnail noselect\">".
									"<img data-bigger=\"$image_attributes[0]\" src=\"" . wp_get_attachment_thumb_url( $attachment->ID ) . "\" >".
							"<figcaption>".$final_array[$n][1]."</figcaption>
								</a>
							</li>";
							
							break;
			
						}else{

						 if ($n+1 == count($final_array)) {
							echo 	"<li class=\"imgs\" data-count=\"$counter\">".
								"<a href=\"#\" data-bigger=\"$image_attributes[0]\" class=\"thumbnail noselect\">".
									"<img data-bigger=\"$image_attributes[0]\" src=\"" . wp_get_attachment_thumb_url( $attachment->ID ) . "\" >".
							"<figcaption></figcaption>
								</a>
							</li>";
						 }
						}
								
							
						}
						}
						else {
							echo 	"<li class=\"imgs\" data-count=\"$counter\">".
								"<a href=\"#\" data-bigger=\"$image_attributes[0]\" class=\"thumbnail noselect\">".
									"<img data-bigger=\"$image_attributes[0]\" src=\"" . wp_get_attachment_thumb_url( $attachment->ID ) . "\" >".
							"<figcaption></figcaption>
								</a>
							</li>";
						}
						$i++;
						$counter++;
					}
					 
				}
				}
			function bigger_image( $postID ) {
			
					$big_image = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'medium' );
					echo $big_image[0];
				}
			global $post;

			
			$property_name_slugged = strtolower(str_replace('+','-',$property_name));
			$apartment_name_slugged = strtolower(str_replace('+','-',$apartment_name));

			$query = new WP_Query(array("post_type"=>"apartments","category_name"=>$property_name_slugged,"order"=>"DESC","orderby"=>"meta_value","meta_key" =>"overview"));
			//$query = new WP_Query(array("post_type"=>"apartments","category_name"=>$a));
			$postcounter = 1;
			?><ul id="gal" class="thumbnails nav"><?php
			if ($query->have_posts())  while($query->have_posts()) : $query->the_post();
			$description_meta_flat = get_post_meta( $post->ID,'description');
			$specs_meta_flat = get_post_meta( $post->ID,'specs');

		?>
			
							<li class="<?php /*
						$apartment_name_slugged_nows = str_replace( '-', '', $apartment_name_slugged );
						$apartment_name_slugged_nows = str_replace( '#', '', $apartment_name_slugged );

						$posttitle = preg_replace( '/\s+/', '', $post->post_title );
						if ( ! $apartment_name == '') {
							if ( $apartment_name_slugged_nows == strtolower($posttitle) ) {
							echo ' '."active";
							} 
					} else {
						if ($postcounter == 1) echo ' '."active";
						
					}*/
					?>">
					<a href="#<?php echo $post->post_name;?>" class="thumbnail<?php /*

						if ( ! $apartment_name == '') {
							if ( $apartment_name_slugged_nows == strtolower($posttitle) ) {
								if ($postcounter < 2) {
									echo ' '."autofill gotmap";
								} else {
									echo ' '."autofill";
								}
							} else {
								if ($postcounter == 1) echo ' '."gotmap";
							}
									
						} else {
							if ($postcounter == 1) echo ' '."autofill gotmap";
						
						}
					$postcounter++;*/
					?>">
						<?php the_post_thumbnail('thumbnail');//echo_first_image($post->ID); ?>
						<figcaption><?php echo $post->post_title;?></figcaption>
					</a>
				
			

	<div class="content-content" style="display:none">
		<article class="span6 prop">
			<section class="clearfix propImages row-fluid imagesToClone">
			<h1 class="clearfix"> <?php echo $post->post_title;?></h1>
			<ul class="thumbnails nav smallcarousel">
			<div class="carousel" style="position:absolute;display:none;">
				<img  src="" style="" />
				<a  class="slideshow-left leftarrow" src="#" />
				<a  class="slideshow-right rightarrow" src="#" />
				<a  class="slideshow-close closecross" src="#" />
			</div>
				<li class="imgs" data-count="1">
					<a href="#" data-bigger="<?php bigger_image($post->ID); ?>" class="thumbnail noselect">
						<?php the_post_thumbnail('thumbnail');// ?>
						<figcaption> <?php echo $post->post_title;?></figcaption>
					</a>
				</li>
				<?php 
				$postimages = get_post_meta($post->ID,'imgs',true);
				 //echo $postimages;
				//echo do_shortcode($postimages);
				echo_image($post->ID); ?>
			</ul>
			</section>
			<section class="clearfix propContent">

			
							
						<article class="description">
							<h3>About</h3>
							<p><?php echo $description_meta_flat[0]; ?></p>
						</article>        
					
					
						<article class="specifications">
							<h3>Specifications</h3>
								<?php echo $specs_meta_flat[0]; ?>
							
						</article>        
					<article class="map">
							<h3>Map</h3>
							<?php $map = preg_replace('/\s+/','+',$map_meta_flat[0])?>
								<img src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $map; ?>&zoom=15&size=450x150&markers=color:blue%7Clabel:S%7C1+Harrington+Gardens,London&sensor=false"/>
							
						</article> 
					
			</section>
		</article>
			</div> 
			</li>
			<?php endwhile; ?>
			</ul>
		</nav>
		<article class="span6 prop contentarea">

			<section class="clearfix propContent noRemove">
				<nav class="propContentNav">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#desc" data-toggle="tab">Description</a></li>
						<li class=""><a href="#spec" data-toggle="tab">Specifications</a></li>
						<li class="" id="mapbutton"><a href="#map" data-toggle="tab">Map</a></li>
					</ul>
				</nav>
				<div class="tab-content">
					<div class="tab-pane active" id="desc">				
						      
					</div>
					<div class="tab-pane" id="spec">
	     
					</div>
					<div class="tab-pane" id="map">
				
					</div>
				</div>
		
				
			</section>
		</article>
				<script type="text/javascript" src="http://www.theharrington.com/v3/wp-content/themes/bootstrap/library/js/bootstrap.min.js?ver=1.2"></script>

				<script>
				  jQuery(document).ready(function ($) {
				  var url = window.location.href;
				  url = url.match(/#.+/);
				  url = url[0];
				  var figcaptions= $('#gal>li>a').children('figcaption');
				  var l = 0;
				  $.each(figcaptions, function(){
				  if (l == 0) {
					$(this).parent().addClass('gotmap');
				  }
				  element = $(this).html();
				  console.log(element);
					fixed = element.replace(/ /g,'-');
					console.log(fixed);
					if (url.toLowerCase().search(fixed.toLowerCase()) > -1) { 
						$(this).parent().addClass('autofill');
						$(this).parents('li').addClass('active');
					} 
					else {
						console.log('url:'+url.toLowerCase()+' fixed:'+fixed.toLowerCase());
					}
					l++;
				  })
				  var autocontent= $('.autofill').next().find(".imagesToClone").first().clone().prependTo('.contentarea');
					var description = $('.autofill').next().find(".description").clone().appendTo('.contentarea #desc');
					var specifications = $('.autofill').next().find(".specifications").clone().appendTo('.contentarea #spec');
					var map = $('.autofill').next().find(".map").clone().appendTo('.contentarea #map');

					
					var activeimage = $('ul #gal').find('li .active');
					if ( ! activeimage.find('a.thumbnail').hasClass('gotmap')) {
					
					if ($('#mapbutton').length > 0) {
						if ( ! $('#gal').find('li').first().hasClass('active') )
							$('#mapbutton').remove();
							console.log('d');
							$('#myTab a:last').tab('show');
						}
					
					}
					else {
						console.log('e');
					}

					$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
								if( $(e.relatedTarget).html() == 'Description') {
									tab_switch = 'Description';
									console.log('tab_switchdesc:'+tab_switch);
								}
								if( $(e.relatedTarget).html() == 'Specification')  {
									tab_switch = 'Specification';
									console.log('tab_switchspec:'+tab_switch);
								}
								if( $(e.relatedTarget).html() == 'Map')  {
									tab_switch = 'Map';
									console.log('tab_switchmap:'+tab_switch);
								}
								if( typeof($(e.relatedTarget).html()) == 'undefined')  {
									tab_switch = 'Specification';
									console.log('tab_switchundef:'+tab_switch+':relatedtargethtml:'+$(e.relatedTarget).html());
								}
								
							
								//switch_tabs();
							});
				  $('a.thumbnail').not('.noselect').on("click",function(){
				  
				  $('a.thumbnail').parent().removeClass("active");
				  $(this).parent().addClass("active");
				  $('.contentarea').children().not(".noRemove, .noRemove *").remove();
				  $('.contentarea #desc').children().remove();
				  $('.contentarea #spec').children().remove();
				  $('.contentarea #map').children().remove();
					var mycontent = $(this).next().find(".imagesToClone").first().clone().prependTo('.contentarea');
					var description = $(this).next().find(".description").clone().appendTo('.contentarea #desc');
					var specifications = $(this).next().find(".specifications").clone().appendTo('.contentarea #spec');
					var map = $(this).next().find(".map").clone().appendTo('.contentarea #map');
					
					if ( $(this).hasClass('gotmap') ) {
						if ( $('#mapbutton').length > 0) {
						console.log('a');
						
						}
						else {
							$('#myTab').append('<li id=\"mapbutton"><a href="#map" data-toggle="tab">Map</a></li>');
							console.log('b');
						}
					} else {
						if ($('#mapbutton').length > 0) {
							$('#mapbutton').remove();
							console.log('c');
							
							$('#myTab a:first').trigger('show.bs.tab');
							
							if (tab_switch == 'Undefined' ) {
								$('#myTab a:last').tab('show');
							}
							if (tab_switch == 'Map' ) {
								$('#myTab a:last').tab('show');
							}
							if (tab_switch == 'Specification' ) {
								$('#myTab a:last').tab('show');
							}
							if (tab_switch == 'Description' ) {
								$('#myTab a:first').tab('show');
								console.log('desc');
							}
							
							console.log('end');

						}
					}

				  })
					$('#myTab a').eq(1).tab('show');
					var img_data;
					$('.contentarea').on('click','.imgs', function (e) {
					
					var  my_image_container = $(this).parents('.contentarea').find('.carousel');
					var  my_image = $(this).parents('.contentarea').find('.carousel').children().first();
					img_data = $(this).attr('data-count');
					imgattr = $(this).find('img').parent().attr('data-bigger');
					var image_array = [];
					var l = 0;
					var this_image = $(this).parents('.contentarea').find('.imgs img');
					//console.log(this_image.attr('src'));
					$.each(this_image, function () {
						//console.log($(this).attr('src'));
						image_array[l] = $(this).parent().attr('data-bigger');//********************************************************
					l++;
					});

					var leftarrow = $(this).parents('.contentarea').find('.leftarrow').on('click',function(e){
					e.stopPropagation();
					if (img_data <= 1) {
						img_data = image_array.length+1;
						}
					my_image.attr('src',image_array[img_data-2]);
					img_data--;
					});

					var rightarrow = $(this).parents('.contentarea').find('.rightarrow').on('click',function(e){
					e.stopPropagation();
					console.log('mover2');
					if (img_data == image_array.length) {
						img_data = 0;
						}
					my_image.attr('src',image_array[img_data]);
					img_data++;
					});

						my_image_container.hide();
						my_image_container.css({
							"width": "463",
							"height" : "225",
							"z-index" : "2"
						});
						/*my_image.css({
							"width": "463",
							"height" : "225"
						});*/
						console.log(imgattr);
						my_image.attr('src',imgattr);
						my_image_container.show('slow');
						my_image_container.on('click',function() {
						$(this).hide('slow');
						})

					});
				  });	
				</script>
	</section>


<?php get_footer(); ?>