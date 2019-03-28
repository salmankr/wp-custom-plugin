<?php
/**
 * @package  customPlugin
 */

namespace Inc\actions;

class deactivate{
	public function service(){
		flush_rewrite_rules();
	}
	public function register(){
		register_deactivation_hook( PLUGIN_FILE_PATH, array($this, 'service') );
	}
}