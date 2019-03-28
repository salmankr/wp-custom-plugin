<?php
/**
 * @package customPlugin
 */

namespace Inc\components\html;
use Inc\components\html\dashboard;
class handler{
	public function add(){
        add_menu_page( 'Admin Dashboard', 'Main Page', 'manage_options', 'main_page', array($this, 'render'), 'dashicons-testimonial');
	}

	public function render(){
	    $html = new dashboard;
	    $html->html();
	}

	public function register(){
		add_action( 'admin_menu', array($this, 'add'));
	}
}