<?php
/**
 * @package  customPlugin
 */

namespace Inc\actions;

class links{

	/**
	 * include additional support links to plugin
	 * @param  [Array] array of already present links
	 * @return [Array] final array of links
	 */
	public function links($links){
        $settings_link = '<a href = "admin.php?page=main_page">Settings</a>';
        $edit_link = '<a href = "plugin-editor.php?plugin=custom-plugin%2Fcustom-plugin.php&Submit=Select">Edit</a>';
        array_push($links, $settings_link);
        array_push($links, $edit_link);
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