<?php
/**
 * @package customPlugin
 */

namespace Inc\API;
use Inc\components\html\dashboard;
use Inc\components\html\CPT;
use Inc\components\html\Metabox;

class HTMLcallbacks {

	/**
	 * dashboard HTML callback
	 * @return HTML
	 */
	public function dashboard(){
		$html = new dashboard;
		$html->html();
	}
    
    /**
     * cpt html dashboard
     * @return html
     */
	public function cpt(){
        $html = new CPT;
        $html->html();
	}

    /**
     * metabox html dashboard
     * @return html
     */
	public function metabox(){
        $html = new Metabox;
        $html->html();
	}

    /**
     * callback function for dashboard checkbox validation
     * @param [array] $input [array for input fields]
     */
	public function CFcallbacks($input){
		if (isset($input)) {
			return 'checked';
		}else{
			return 'unchecked';
		}
	}
}