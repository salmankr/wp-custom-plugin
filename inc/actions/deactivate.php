<?php
/**
 * @package  customPlugin
 */

namespace Inc\actions;

class deactivate{

	/**
	 * deactivate service for plugin
	 * @return ...
	 */
	public function service(){
		flush_rewrite_rules();
	}

	/**
	 * Register deactivation service
	 * @return ...
	 */
	public function register(){
		register_deactivation_hook( PLUGIN_FILE_PATH, array($this, 'service') );
	}
}