<?php

namespace FormGenerator;

use FormGenerator\HtmlTemplate\Tag;
use \stdClass;

class LabelClass extends Component{
		
	public function render($data,$label,$default){
		$this->_data->text = $label;
		$templateObj = new Tag();
		$template = $templateObj->template();
		
		$dataDefault = null;
		if(isset($default->label_wrapper)){
			$dataDefault = $default->label_wrapper;
		}
		$result = $this->renderBasic($data,$dataDefault,$template);
		return $result;
	}
}