<?php
/**
 * @package customPlugin
 */

/*
Plugin Name: Custom-plugin
Description: Custom Plugin Development
Author: Salman Akram
Version: 1.0.1
Licence: GPLv2 or later
Author URI: fb.com/b.b3nch3r
*/

define('PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ));
define('PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ));
define('PLUGIN_FILE_PATH', __FILE__);
define('PLUGIN_BASENAME', plugin_basename( __FILE__ ));

defined( 'ABSPATH' ) or die( 'Access Denied' );
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

if (class_exists('Inc\\init')) {
	Inc\init::register_components();
}


/**
 * Notes:
 * wp_enqueue_scripts: to enqueue scripts in frontend
 * admin_enqueue_scripts: to enqueue scripts to backend admin panel
*/