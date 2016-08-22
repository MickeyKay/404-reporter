<?php
/**
 * Plugin Name: 404 Reporter
 * Description: Log and parse all 404's on your site.
 * Version: 1.0.0
 * Author: Mickey Kay
 * Author URI: https://www.mickeykay.me
 */

define( 'FOF_REPORTER_VERSION', '1.0.0' );
define( 'FOF_REPORTER_PATH', plugin_dir_path( __FILE__ ) );
define( 'FOF_REPORTER_URL', plugin_dir_url( __FILE__ ) );

// Post types functionality.
require FOF_REPORTER_PATH . 'inc/post-types.php';

// Admin functionality
require FOF_REPORTER_PATH . 'inc/admin.php';

// Logging functionality
require FOF_REPORTER_PATH . 'inc/logger.php';
