<?php
/**
 * Admin functionality.
 */

add_action( 'admin_menu', 'fof_reporter_add_admin_page' );
/**
 * Maybe log 404 instance.
 *
 * Hook up on "wp" as this is the earliest available action in which conditional
 * tags are available.
 */
function fof_reporter_add_admin_page() {

	$admin_page_capability = apply_filters( 'fof_reporter_admin_page_capability', 'manage_options' );

	add_submenu_page(
		'tools.php',
		__( '404\'s', '404-reporter' ),
		__( '404 Reporter', '404-reporter' ),
		$admin_page_capability,
		'404-reporter',
		'fof_reporter_render_admin_page' );
}

function fof_reporter_render_admin_page() {
?>
	<div class="wrap">
		<?php screen_icon(); ?>

		<h2><?php _e( '404 Reporter', '404-reporter' ); ?></h2>
	</div>

<?php
}
