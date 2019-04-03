<?php
/**
 * @package customPlugin
 */

namespace Inc\API;
use Inc\components\html\subpage;
use Inc\components\html\dashboard;
use Inc\components\html\customField;

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
     * subpage HTML callback
     * @return HTML
     */
	public function subpage(){
		$html = new subpage;
		$html->html();
	}

	public function CFsection(){
		$html = new customField;
		$html->htmlSection();
	}

	public function CFfield(){
		$html = new customField;
		$html->htmlField();
	}

	public function OptionGrp($input){
		return $input;
	}
}