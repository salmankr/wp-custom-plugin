<?php
/**
 * @package  customPlugin
 */

namespace Inc\actions;

class settings{

	/**
	 * include additional support links to plugin
	 * @param  [Array] array of already present links
	 * @return [Array] final array of links
	 */
	public function links($links){
        $settings_links = '<a href = "admin.php?page=main_page">Settings</a>';
        array_push($links, $settings_links);
        return $links;
	}

	/**
	 * register hook for additional links
	 * @return ...
	 */
	public function register(){
		add_filter('plugin_action_links_' . PLUGIN_BASENAME, array($this, 'links'));
	}
}