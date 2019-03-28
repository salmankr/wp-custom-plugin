<?php
/**
 * @package customPlugin
 */

namespace Inc\components\html;

class handler{
	public function add(){
        add_menu_page( 'Admin Dashboard', 'Main Page', 'manage_options', 'main_page', array($this, 'render'), 'dashicons-testimonial');
	}

	public function render(){
	    require_once PLUGIN_DIR_PATH . 'inc/components/html/admin-dashboard.php';
	}

	public function register(){
		add_action( 'admin_menu', array($this, 'add'));
	}
}