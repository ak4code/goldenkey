<?php
/**
 * @package realtor
 * created by akweb
 */

add_action( 'rest_api_init', 'my_register_route' );
function my_register_route() {
	register_rest_route( 'wp/v2', 'realty-search', array(
			'methods'  => 'GET',
			'callback' => 'custom_phrase',
		)
	);
}

function custom_phrase( WP_REST_Request $request ) {
	$query = $request->get_query_params();
	$wpGet = new WP_Query();
	$page  = array_key_exists( 'page', $query ) ? $query['page'] : 1;
	if ( ! empty( $query ) ) {
		$mq = array(
			'relation' => 'AND',
		);
		if ( array_key_exists( 'code_object', $query ) ) {
			array_push( $mq, array(
				'key'     => 'code_object',
				'value'   => $query['code_object'],
				'compare' => 'LIKE'
			) );
		}
		if ( array_key_exists( 'address', $query ) ) {
			array_push( $mq, array(
				'key'     => 'address',
				'value'   => $query['address'],
				'compare' => 'LIKE'
			) );
		}
		if ( array_key_exists( 'square', $query ) ) {
			array_push( $mq, array(
				'key'     => 'square',
				'value'   => array(
					$query['square'][0] ? $query['square'][0] : 0,
					$query['square'][1] ? $query['square'][1] : 999999999999
				),
				'type'    => 'DECIMAL',
				'compare' => 'BETWEEN'
			) );
		}
		if ( array_key_exists( 'price', $query ) && ! array_key_exists( 'code_object', $query ) ) {
			array_push( $mq, array(
				'key'     => 'price',
				'value'   => array(
					$query['price'][0] ? $query['price'][0] : 0,
					$query['price'][1] ? $query['price'][1] : 999999999999
				),
				'type'    => 'DECIMAL',
				'compare' => 'BETWEEN'
			) );
		}
		$properties = $wpGet->query( array(
			'post_type'  => 'realty',
			'tax_query'  => $query['realty_type'] ? array(
				array(
					'taxonomy' => 'realty_type',
					'field'    => 'id',
					'terms'    => $query['realty_type']
				)
			) : '',
			'meta_query' => $mq,
			'paged'      => $page
		) );
	} else {
		$properties = $wpGet->query( array(
			'post_type' => 'realty',
			'paged'     => $page
		) );
	}


	$properties = array_map( function ( $property ) {
		$pod                             = pods( 'realty', $property->ID );
		$property_data['title']          = esc_html( $property->post_title );
		$property_data['url']            = esc_url( get_the_permalink( $property ) );
		$property_data['city']           = $pod->display( 'city' );
		$property_data['address']        = $pod->display( 'address' );
		$property_data['price']          = $pod->display( 'price' );
		$property_data['code_object']    = $pod->display( 'code_object' );
		$property_data['rooms']          = $pod->display( 'rooms' );
		$property_data['square']         = $pod->display( 'square' );
		$property_data['square_plot']    = $pod->display( 'square_plot' );
		$property_data['square_kitchen'] = $pod->display( 'square_kitchen' );
		$property_data['square_live']    = $pod->display( 'square_live' );
		$property_data['facade_plot']    = $pod->display( 'facade_plot' );
		$property_data['floor']          = $pod->display( 'floor' );
		$property_data['floors']         = $pod->display( 'floors' );
		$property_data['content']        = $property->post_content;
		$property_data['image']          = get_the_post_thumbnail_url( $property, 'full' );;

		return $property_data;
	}, $properties );

	$response = rest_ensure_response( $properties );
	$response->header( 'X-WP-Total', $wpGet->found_posts );
	$response->header( 'X-WP-TotalPages', $wpGet->max_num_pages );

	wp_reset_postdata();


	return $response;
}