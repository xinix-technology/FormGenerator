<?php

namespace FormGenerator;

use FormGenerator\HtmlTemplate\Range;
use \stdClass;

class RangeClass extends Component{
		
	public function render($data,$default){
		$data->type = 'type="'.$data->type.'"';
			
		$templateObj = new Range();
		$template = $templateObj->template();
		$this->_data->name = null;
		$this->_data->value = null;
		$this->_data->placeholder = null;
		
		$dataDefault = null;
		if(isset($default->row_wrapper)){
			$dataDefault = $default->row_wrapper;
		}
		$result = $this->renderBasic($data,$dataDefault,$template);
		$result = $this->renderInput($result);
		return $result;
	}
}