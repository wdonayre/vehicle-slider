<?php
echo header("Access-Control-Allow-Origin: *");
echo header('Content-Type: application/json');

add_action( 'wp_ajax_nopriv_gltv_request_ajax', 'gltv_request_ajax' );
add_action( 'wp_ajax_gltv_request_ajax', 'gltv_request_ajax' );
function gltv_request_ajax() {
	
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		
		$carID = '';
		if( isset($_GET['carid'] ) ) {
			$carID = $_GET['carid'];
		}
		
		$args = array(
			'post_type' => 'gltv',
			'post_status' => 'publish',
			'p' => $carID
		);

		$posts = get_posts( $args );

		foreach( $posts as $post ) {
			$post_id = $post->ID;
			$custom_link = get_post_meta( $post_id, 'custom_link', true );
			$featured_image = get_the_post_thumbnail_url( $post_id );
			if( $featured_image ) {
				$featured_image;
			} else {
				$featured_image = GLTV_PLUGIN_ADMIN_GET_IMAGE_DEF.'default-car.png';
			}
			$carousel_type = get_post_meta( $post_id, 'carousel_type', true );
			$post_data = get_post_meta( $post_id, 'gltv_meta_fields', true );
			$arr[] = array(
				"car_name" => get_the_title( $post_id ),
				"custom_link" => $custom_link,
				"car_default_image" => $featured_image,
				"carousel_type" => $carousel_type,
				"car_color_variations" => $post_data
			);
		}

		$json = json_encode( array( 'cars' => $arr, 'carid' => $args['p'] ),  JSON_PRETTY_PRINT );

		echo $json;

	}
	
	die();
}

