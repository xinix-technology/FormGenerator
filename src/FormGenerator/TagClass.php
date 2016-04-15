<?php

namespace FormGenerator;

use FormGenerator\HtmlTemplate\Tag;
use \stdClass;

class TagClass extends Component{
	public function render($data,$default){
		$templateObj = new Tag();
		$template = $templateObj->template();
		$dataDefault = null;
		if(isset($default->li_tag)){
			$dataDefault = $default->li_tag;
		}
		$result = $this->renderBasic($data,$dataDefault,$template);
		return $result;
	}
}
