<?php

namespace FormGenerator;

use FormGenerator\HtmlTemplate\Row;
use \stdClass;

class RowClass extends Component{
		
	public function render($data,$default){
	//	$this->_data->text = $label;
		$templateObj = new Row();
		$template = $templateObj->template();
		
		$dataDefault = null;
		if(isset($default->row_wrapper)){
			$dataDefault = $default->row_wrapper;
		}
		$result = $this->renderBasic($data,$dataDefault,$template);
		return $result;
	}
}