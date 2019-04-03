<?php
/**
 * @package customPlugin
 */

namespace Inc\API;

class settingsAPI{

	public $pages = array();

	public $sub_pages = array();

	public $AdminCFs = array();

	public function pagesArr(array $pages){
		$this->pages = $pages;
		return $this;
	}

	public function subpagesArr(array $subpages){
		$this->sub_pages = $subpages;
		return $this;
	}

	public function settingsArr(array $AdminCFs){
		$this->AdminCFs = $AdminCFs;
		return $this;
	}

	public function sectionsArr(array $sections){
		$this->sections = $sections;
		return $this;
	}

	public function fieldsArr(array $fields){
		$this->fields = $fields;
		return $this;
	}

	public function pageReg(){
		if (empty($this->pages)) {
		    return;
		}else{
			foreach ($this->pages as $page) {
				add_menu_page( $page['title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url']);
			}
		}

		if (empty($this->sub_pages)) {
		    return;
		}else{
			foreach ($this->sub_pages as $sub_page) {
				add_submenu_page( $sub_page['parent_slug'], $sub_page['title'], $sub_page['menu_title'], $sub_page['capability'], $sub_page['menu_slug'], $sub_page['callback'] );
			}
		}
	}

	public function CFReg(){
		if (empty($this->AdminCFs)) {
		    return;
		}else{
			foreach ($this->AdminCFs as $AdminCF) {
				register_setting( $AdminCF['option_group'], $AdminCF['option_name'] );
			}
		}
	}

	public function register(){
		add_action( 'admin_menu', array($this, 'pageReg'));
		add_action( 'admin_init', array($this, 'CFReg') );
	}
}