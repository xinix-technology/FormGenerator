<?php

namespace FormGenerator;

use FormGenerator\HtmlTemplate\Input;
use \stdClass;

class InputClass extends Component{
		
	public function render($data,$default){
		$data->type = 'type="'.$data->type.'"';
			
		$templateObj = new Input();
		$template = $templateObj->template();
		$this->_data->name = null;
		$this->_data->value = null;
		$this->_data->placeholder = null;
		
		$dataDefault = null;
		if(isset($default->content)){
			$dataDefault = $default->content;
		}
		$result = $this->renderBasic($data,$dataDefault,$template);
		$result = $this->renderInput($result);
		return $result;
	}
}