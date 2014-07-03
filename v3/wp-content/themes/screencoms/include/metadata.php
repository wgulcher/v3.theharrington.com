<?php

//@richard max - todo - make this meta-box based

// Field Array
$prefix = 'geo_';
$vsip_post_meta_box = array(
    'id' => 'geo-post-meta-box',
    'title' => __('Custom Meta', 'screencoms'),
    'page' => __('post','attachment'),
    'context' => 'side',
    'priority' => 'low',
    'fields' => array(
        array(
            'name' => __('pageviews: ', 'screencoms'),
            'id' => 'pageviews',
            'type' => 'text'
        ),
        array(
            'name' => __('longitude: ', 'screencoms'),
            'desc' => __('Enter your longitude', 'screencoms'),
            'id' => $prefix.'longitude',
            'type' => 'text'
        ),
        array(
            'name' => __('longitude: ', 'screencoms'),
            'desc' => __('Enter your longitude', 'screencoms'),
            'id' => $prefix.'longitude',
            'type' => 'text'
        )
    )
);

// Custom Meta Box
add_action( 'add_meta_boxes', 'vsip_project_add_meta');
function vsip_project_add_meta() {
    global $vsip_post_meta_box;
    add_meta_box($vsip_post_meta_box['id'], $vsip_post_meta_box['title'], 'vsip_display_post_meta', $vsip_post_meta_box['page'], $vsip_post_meta_box['context'], $vsip_post_meta_box['priority']);
} // END OF Function: vsip_project_add_meta


function vsip_display_post_meta() {
    global $vsip_post_meta_box, $post;
    // Use nonce for verification
    echo '<input type="hidden" name="vsip_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
    echo '<table class="form-table">';
    foreach ($vsip_post_meta_box['fields'] as $field) {
        // get current post meta data
        $meta = get_post_meta($post->ID, $field['id'], true);
        switch($field['type']) {
            // If Text
            case 'text':
                echo '<tr style="border-top:1px solid #eeeeee;">',
                    '<th style="width:25%"><label for="', $field['id'], '"><strong>', $field['name'], '</strong><span style=" display:block; color:#999; line-height: 20px; margin:5px 0 0 0;">'. $field['desc'].'</span></label></th>',
                    '<td>';
                echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : stripslashes(htmlspecialchars(( $field['std']), ENT_QUOTES)), '" size="30" style="width:75%; margin-right: 20px; float:left;" />';
                break;
        }
    }
    echo '</table>';
} // END Of Function: vsip_display_post_meta


// Save Meta Data
add_action('save_post', 'vsip_post_save_data');
function vsip_post_save_data($post_id) {
    global $vsip_post_meta_box;
    // verify nonce
    if (!isset($_POST['vsip_meta_box_nonce']) || !wp_verify_nonce($_POST['vsip_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        }
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    foreach ($vsip_post_meta_box['fields'] as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    }
} // END Of Function: vsip_post_save_data



/**
 * Return geo post data
 */
add_action('wp_ajax_get_geo_posts', 'get_geo_posts');
add_action('wp_ajax_nopriv_get_geo_posts', 'get_geo_posts');
function get_geo_posts() {

	$data = new WP_Query(array(
		'meta_key' => 'geo_latitude'
	));

	$geo_posts = array(
		'center_lat' => 51.504714,
		'center_lon' => -0.120825,
		'map_options' => array(
			'zoom' => 10
		)
	);

	if ($data->have_posts()) : while ($data->have_posts()) : $data->the_post();

		$id = get_the_ID();
		$lat = get_post_meta($id, 'geo_latitude', true);
		$lon = get_post_meta($id, 'geo_longitude', true);

		$geo_post = array(
			'id' => $id,
			'title' => get_the_title(),
			'excerpt' => get_the_excerpt(),
			'lat' => $lat,
			'lon' => $lon
		);

		$geo_posts['locations'][] = $geo_post;

	endwhile; else :

		$geo_posts['error'] = 'No posts found';

	endif;

	echo json_encode($geo_posts);
	wp_reset_postdata();
	exit;
}



// add meta data for attachments --------------------------------------------------------------------------------------------------------
 
function be_post_field( $form_fields, $post ) {


		
	
	
	$form_fields['be-pageviews'] = array(
		'label' => 'pageviews',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'pageviews', true ),
		'helps' => 'Number of times viewed',
	);
	
	
		return $form_fields;
	
}


add_filter( 'attachment_fields_to_edit', 'be_post_field', 10, 2 );







 
/**
 * Add Photographer Name and URL fields to media uploader
 *
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 */
 
function be_attachment_field_credit( $form_fields, $post ) {


		
	
	
	$form_fields['be-pageviews'] = array(
		'label' => 'pageviews',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'pageviews', true ),
		'helps' => 'Number of times viewed',
	);
	

	$metadata = wp_get_attachment_metadata($post->ID);
	$latitude = geo_pretty_fracs2dec($metadata['image_meta']['latitude']) . $metadata['image_meta']['latitude_ref'];
	$longitude = geo_pretty_fracs2dec($metadata['image_meta']['longitude']) . $metadata['image_meta']['longitude_ref'];
	
	$form_fields['be-latitude'] = array(
		'label' => 'latitude',
		'input' => 'text',
		'value' => $latitude ,
		'helps' => 'If provided, latitude will be displayed',
	);
	
	$form_fields['be-longitude'] = array(
		'label' => 'longitude',
		'input' => 'text',
		'value' => $longitude,
		'helps' => 'If provided, photographer name will link here',
	);
	
	$form_fields['be-photographer-name'] = array(
		'label' => 'Photographer Name',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'be_photographer_name', true ),
		'helps' => 'If provided, photo credit will be displayed',
	);
	
	$form_fields['be-photographer-url'] = array(
		'label' => 'Photographer URL',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'be_photographer_url', true ),
		'helps' => 'If provided, photographer name will link here',
	);
	
	
	
	return $form_fields;
}
 
add_filter( 'attachment_fields_to_edit', 'be_attachment_field_credit', 10, 2 );
 
/**
 * Save values of Photographer Name and URL in media uploader
 *
 * @param $post array, the post data for database
 * @param $attachment array, attachment fields from $_POST form
 * @return $post array, modified post data
 */
 
function be_attachment_field_credit_save( $post, $attachment ) {
	if( isset( $attachment['be-photographer-name'] ) )
		update_post_meta( $post['ID'], 'be_photographer_name', $attachment['be-photographer-name'] );
		
	if( isset( $attachment['be-photographer-url'] ) )
		update_post_meta( $post['ID'], 'be_photographer_url', $attachment['be-photographer-url'] );
	
	return $post;
}
 
add_filter( 'attachment_fields_to_save', 'be_attachment_field_credit_save', 10, 2 );







// geo code for attachments --------------------------------------------------------------------------------------------------------
function add_geo_exif($meta,$file,$sourceImageType) {
		$exif = @exif_read_data( $file );
			if (!empty($exif['GPSLatitude']))
				$meta['latitude'] = $exif['GPSLatitude'] ;
			if (!empty($exif['GPSLatitudeRef']))
				$meta['latitude_ref'] = trim( $exif['GPSLatitudeRef'] );
			if (!empty($exif['GPSLongitude']))
				$meta['longitude'] = $exif['GPSLongitude'] ;
			if (!empty($exif['GPSLongitudeRef']))
				$meta['longitude_ref'] = trim( $exif['GPSLongitudeRef'] );
	return $meta;
}
add_filter('wp_read_image_metadata', 'add_geo_exif','',3);

// geo format
function geo_frac2dec($str) {
	@list( $n, $d ) = explode( '/', $str );
	if ( !empty($d) )
		return $n / $d;
	return $str;
}
function geo_pretty_fracs2dec($fracs) {
	return	geo_frac2dec($fracs[0]) . '&deg; ' .
		geo_frac2dec($fracs[1]) . '&prime; ' .
		geo_frac2dec($fracs[2]) . '&Prime; ';
}

// make geo data google format
function geo_single_fracs2dec($fracs) {
	return	geo_frac2dec($fracs[0]) +
		geo_frac2dec($fracs[1]) / 60 +
		geo_frac2dec($fracs[2]) / 3600;
}
?>