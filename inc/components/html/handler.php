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
    
    public $CFreg = array();

    /**
     * construct function
     */
    public function __construct(){

        $this->CFreg = array(
            'cpt_checkbox' => 'CPT Switch',
            'metabox_checkbox' => 'Metabox Switch',
        );

    	$this->callbacks = new HTMLcallbacks;
        $this->register = new settingsAPI;
        $this->pages();
        $this->subpages();
        $this->AdminCF();
        $this->adminCFfields();
        $this->adminCFsections();
        
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
        $args = array();
        foreach ($this->CFreg as $id => $title) {
            $args[] = array(
                'option_group' => 'admin_settings_group',
                'option_name' => $id,
                'args' => array($this->callbacks, 'CFcallbacks'),
            );
        }
        $this->register->settingsArr($args);
    }


    public function adminCFfields(){
        $args = array();
        foreach ($this->CFreg as $id => $title) {
            $args[] =  array(
                'id' => $id,
                'title' => $title,
                'callback' => array($this->callbacks, 'CFfieldsCallbacks'),
                'page' => 'main_page',
                'section' => 'mainpage_section',
                'args' => array(
                    'label_for' => $id,
                ),
            );
        }
        $this->register->fieldsArr($args);
    }


    public function adminCFsections(){
        $args = array(
            array(
                'id' => 'mainpage_section',
                'title' => 'Admin Section',
                'callback' => array($this->callbacks, 'CFsectionsCallbacks'),
                'page' => 'main_page',
            ),
        );
        $this->register->sectionArr($args);
    }


    /**
     * Register hook for admin dashboard rendering
     * @return ...
     */
	public function register(){
        $this->register->register();
	}
}