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

	// Generate a new 404 post to record this instance.
	$post_data = array(
		'post_type'   => '404_reporter_404',
		'post_title'  => $url,
		'post_status' => 'publish',
		'meta_input'  => array_merge(
			array( '_404_reporter_instance_count' => 1 ),
			$prefixed_parsed_url
		),
	);

	$post_id = wp_insert_post( $post_data );

}
