<?php
/**
 * @package  customPlugin
 */

namespace Inc\actions;

class activate{
	public function service(){
		flush_rewrite_rules();
	}
	public function register(){
		register_activation_hook( PLUGIN_FILE_PATH, array($this, 'service') );
	}
}