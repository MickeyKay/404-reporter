<?php
/**
 * Logging functionality.
 */

add_action( 'wp', 'fof_reporter_maybe_log_404' );
/**
 * Maybe log 404 instance.
 *
 * Hook up on "wp" as this is the earliest available action in which conditional
 * tags are available.
 */
function fof_reporter_maybe_log_404() {

	if ( ! is_404() ) {
		return;
	}

	// Use server array to compile URL.
	$protocol = $_SERVER[HTTPS] ? 'https' : 'http';
	$host     = $_SERVER[HTTP_HOST];
	$path     = $_SERVER[REQUEST_URI];
	$url      = $protocol . '://' . $host . $path;

	// Parse the URL into more granular parts for easier re-use.
	$parsed_url = parse_url( $url );

	$query_args = array(
		'post_type'      => '404_reporter_404',
		'posts_per_page' => 1,
		'meta_query'     => array(
			'relation' => 'AND',
			array(
				'key'   => '_404_reporter_path',
				'value' => $parsed_url['path'],
			)
		)
	);

	$existing_404_post = get_posts( $query_args );

	$parent_post_id = '';

	if ( ! empty( $existing_404_post ) ) {

		$parent_post_id = $existing_404_post[0]->ID;
		//$current_404_count = get_post_meta( $post_id, '_404_reporter_instance_count', true );
		//update_post_meta( $post_id, '_404_reporter_instance_count', $current_404_count + 1 );

	}

	// Prefix parsed url for passing to post data.
	$prefixed_parsed_url = array();
	foreach ( $parsed_url as $key => $value ) {
		$prefixed_parsed_url[ "_404_reporter_{$key}" ] = $value;
	}

	// Generate a new 404 post to record this instance.
	$post_data = array(
		'post_type'   => '404_reporter_404',
		'post_title'  => $url,
		'post_status' => 'publish',
		'post_parent' => $parent_post_id,
		'meta_input'  => array_merge(
			array( '_404_reporter_instance_count' => 1 ),
			$prefixed_parsed_url
		),
	);

	$post_id = wp_insert_post( $post_data );


	error_log( print_r($post_id, true) );
	error_log( print_r(get_post_custom( $post_id ), true) );

}
