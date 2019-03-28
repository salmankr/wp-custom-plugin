<?php
/**
 * @package customPLugin
 */

namespace Inc\actions;

class scripts{
	public function enqueue(){
		wp_enqueue_style( 'plugin-custom-css', plugins_url( '/assets/css/plugin-css.css', PLUGIN_FILE_PATH ));
		wp_enqueue_script( 'plugin-custom-js', plugins_url( '/assets/js/plugin-js.js', PLUGIN_FILE_PATH ));
    }
	public function register(){
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
	}
}