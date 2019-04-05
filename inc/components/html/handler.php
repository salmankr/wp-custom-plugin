<?php
/**
 * @package customPlugin
 */

namespace Inc\components\html;
use Inc\API\settingsAPI;
use Inc\API\HTMLcallbacks;

class handler{


    /**
     * variable to instantiate HTMLcallbacks class
     * @var calss instance
     */
    public $callbacks;

    
    /**
     * variable to instantiate settingsAPI class
     * @var class instance
     */
    public $register;
    
    

    /**
     * construct function
     */
    public function __construct(){
    	$this->callbacks = new HTMLcallbacks;
        $this->register = new settingsAPI;
        $this->pages();
        $this->subpages();
        $this->AdminCF();
    }
    

    
    /**
     * Function to define arrays for new admin pages
     * @return Array
     */
    public function pages(){
        $args = array(
            array(
                'title' => 'Admin Dashboard',
                'menu_title' => 'Main Page',
                'capability' => 'manage_options',
                'menu_slug' => 'main_page',
                'callback' => array($this->callbacks, 'dashboard'),
                'icon_url' => 'dashicons-testimonial',
            ),
        );
         $this->register->pagesArr($args);
    }
    


    /**
     * Function to define arrays for new admin subpages
     * @return Array
     */
    public function subpages(){
        if (get_option('CPT_checkbox') == 'checked') {
            $CPT = array(
                'parent_slug' => 'main_page',
                'title' => 'CPT Manager',
                'menu_title' => 'CPT Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'cpt_menu',
                'callback' => array($this->callbacks, 'cpt'),
            );
        }else{
            $CPT = null;
        }

        if (get_option('metabox_checkbox') == 'checked') {
            $metabox = array(
                'parent_slug' => 'main_page',
                'title' => 'MetaBox Manager',
                'menu_title' => 'MetaBox Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'metabox_menu',
                'callback' => array($this->callbacks, 'metabox'),
            );
        }else{
            $metabox = null;
        }

        $args = array(
            $CPT, $metabox,
        );
        $this->register->subpagesArr($args);
    } 
    


    public function AdminCF(){
        $args = array(
            array(
                'option_group' => 'admin_settings_group',
                'option_name' => 'CPT_checkbox',
                'args' => array($this->callbacks, 'CFcallbacks'),
            ),

            array(
                'option_group' => 'admin_settings_group',
                'option_name' => 'metabox_checkbox',
                'args' => array($this->callbacks, 'CFcallbacks'),
            ),

            array(
                'option_group' => 'admin_settings_group',
                'option_name' => 'last_name',
                'args' => array(),
            ),
        );
        $this->register->settingsArr($args);
    }

    /**
     * Register hook for admin dashboard rendering
     * @return ...
     */
	public function register(){
        $this->register->register();
	}
}