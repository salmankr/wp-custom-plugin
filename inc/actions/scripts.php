<?php
/**
 * @package customPLugin
 */

namespace Inc\actions;

class scripts{

	/**
	 * include required scripts & stylesheets to plugin
	 * @return Script
	 */
	public function enqueue(){
		wp_enqueue_style( 'plugin-custom-css', plugins_url( '/assets/css/plugin-css.css', PLUGIN_FILE_PATH ));
		wp_enqueue_script( 'plugin-custom-js', plugins_url( '/assets/js/plugin-js.js', PLUGIN_FILE_PATH ));
    }

    /**
     * register hook for enqueue() function
     * @return ...
     */
	public function register(){
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
	}
}