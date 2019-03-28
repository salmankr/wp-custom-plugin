<?php
/**
 * @package  customPlugin
 */

namespace Inc\actions;

class settings{
	public function links($links){
        $settings_links = '<a href = "admin.php?page=main_page">Settings</a>';
        array_push($links, $settings_links);
        return $links;
	}
	public function register(){
		add_filter('plugin_action_links_' . PLUGIN_BASENAME, array($this, 'links'));
	}
}