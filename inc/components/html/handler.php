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
        $args = array(
            array(
                'parent_slug' => 'main_page',
                'title' => 'Sub Page',
                'menu_title' => 'Sub Page Menu',
                'capability' => 'manage_options',
                'menu_slug' => 'sub_menu',
                'callback' => array($this->callbacks, 'subpage'),
            ),
        );
        $this->register->subpagesArr($args);
    } 
    


    public function AdminCF(){
        $args = array(
            array(
                'option_group' => 'first_name',
                'option_name' => 'first_name',
            ),

            array(
                'option_group' => 'last_name',
                'option_name' => 'last_name',
            ),

            array(
                'option_group' => 'sub_option_grp',
                'option_name' => 'sub_test_field',
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