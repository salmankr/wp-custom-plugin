<?php
/**
 * @package  customPlugin
 */

namespace Inc\actions;

class activate{

	/**
	 * service for plugin activation
	 * @return ...
	 */
	public function service(){
		flush_rewrite_rules();
	}

    /**
     * Register activation service
     * @return ...
     */
	public function register(){
		register_activation_hook( PLUGIN_FILE_PATH, array($this, 'service') );
	}
}