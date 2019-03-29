<?php
/**
 * @package customPlugin
 */

namespace Inc\components\html;
use Inc\components\html\dashboard;
class handler{

	/**
	 * Handler function for plugin's dashboard rendering
	 */
	public function add(){
        add_menu_page( 'Admin Dashboard', 'Main Page', 'manage_options', 'main_page', array($this, 'render'), 'dashicons-testimonial');
	}

    /**
     * Function to include html classes to handler function
     * @return [html] [dashboard html]
     */
	public function render(){
	    $html = new dashboard;
	    $html->html();
	}
    /**
     * Register hook for admin dashboard rendering
     * @return ...
     */
	public function register(){
		add_action( 'admin_menu', array($this, 'add'));
	}
}